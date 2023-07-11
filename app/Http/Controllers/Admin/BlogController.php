<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBlog;
use App\Models\AdminBlogCategory;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function blogList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            //'blog' => AdminBlog::all(),
            'blog' => DB::table('admin_blogs')
                ->leftJoin('admin_blog_categories', 'admin_blogs.category_id', '=', 'admin_blog_categories.id')
                ->select('admin_blogs.*', 'admin_blog_categories.name as category_name')
                ->get(),
            'blog_category' => AdminBlogCategory::where('status',1)->get(),
        ];


        return view('admin.pages.blog', $data);
    }

    public function blogAdd(Request $request, FlasherInterface $flasher)
    {

        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            'blog' => AdminBlog::all(),
        ];

        if ($request->blog_content == '' || $request->title == ''){
            $flasher->addError('Blog content or blog title is required');
            return Redirect::route('admin.blog.list');
        }


//        $uploadedFile = $request->file('blog_image');
//        $base64Image = base64_encode(file_get_contents($uploadedFile->path()));
//dd($base64Image);



        $blog = new AdminBlog();
        $blog->category_id = $request->blog_category;
        $blog->title = $request->title;
        //$blog->image =  $request->image;
        $blog->content = $request->blog_content;
        // $blog->content_short =  $request->content_short;

        if (!empty($request->file('blog_image'))) {

            $this->validate($request, [
                'blog_image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'blog_image.mimes' => 'Blog image should be in jpg, jpeg, png format.',
                'blog_image.max' => 'Blog photo cannot be larger than 4 MB.',
            ]);





            $image = base64_encode(file_get_contents($request->file('blog_image')->path()));

//            $file = $request->file('blog_image');
//
//            $extension = $file->getClientOriginalExtension();
//
//            $fileOriginalName = $file->getClientOriginalName();
//
//            $explode = explode('.', $fileOriginalName);
//
//            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
//
//
//            $request->blog_image->move(public_path('admin/assets/blog/'), $fileOriginalName);
//
//            $blog->image = $fileOriginalName;



            $blog->image = $image;
        }

        $blog->save();
        $flasher->addSuccess('Blog Added');
        return Redirect::route('admin.blog.list');

       // return view('admin.pages.blog', $data);
    }

    public function blogDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            AdminBlog::whereIn('id', $IDs)->delete();
        }
        if ($request->input('blogId')){
            $blogCategoryId = $request->input('blogId');
            AdminBlog::find($blogCategoryId)->delete();
        }

        return response()->json(['success'=>'Selected blog have been deleted.']);
    }


    public function blogUpdate(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'blog_content' => 'required',
            'status' => 'required',
            'blog_category' => 'required',
        ], [
            'title.required' => 'Title is required',
            'blog_content.required' => 'Content is required',
            'blog_category.required' => 'Category is required',
            'status.required' => 'Status is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.blog.list');
        }

        $id = $request->id;

        //$blogCategory = AdminBlogCategory::where('id', $id)->first();
        $blog = AdminBlog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->blog_content;
        $blog->status = $request->status;
        $blog->category_id = $request->blog_category;
        $blog->slug = null;


        if (!empty($request->file('blog_image'))) {

            $this->validate($request, [
                'blog_image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'blog_image.mimes' => 'Blog image should be in jpg, jpeg, png format.',
                'blog_image.max' => 'Blog photo cannot be larger than 4 MB.',
            ]);

            $image = base64_encode(file_get_contents($request->file('blog_image')->path()));

            $blog->image = $image;
        }

        if (empty($request->file('blog_image')) && $request->avatar_remove == 1) {
            $blog->image = null;
        }



        $blog->save();


        $flasher->addSuccess('Blog Update Success');
        return Redirect::route('admin.blog.list');

    }
}
