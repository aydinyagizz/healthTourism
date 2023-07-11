<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBlogCategory;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{


    public function blogCategoryList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            'blog_category' => AdminBlogCategory::all(),
        ];

        return view('admin.pages.blogCategory', $data);
    }

    public function blogCategoryAdd(Request $request, FlasherInterface $flasher)
    {
        $data = [
            //'user' => User::where('id', Session::get('adminId'))->first(),
            'admin' => User::where('id', Session::get('adminId'))->first(),
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.blog.category.list');
        }



        $blogCategory = new AdminBlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->save();

        $flasher->addSuccess('Category added');


        return Redirect::route('admin.blog.category.list');
    }

    public function blogCategoryDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            AdminBlogCategory::whereIn('id', $IDs)->delete();
        }
        if ($request->input('blogCategoryId')){
            $blogCategoryId = $request->input('blogCategoryId');
            AdminBlogCategory::find($blogCategoryId)->delete();
        }


        return response()->json(['success'=>'Selected blog category have been deleted.']);
        // dd($request->all());
//        $data = [
//            'users' => User::where('user_role', 1)->with('roles')->get(),
//            'admin' => User::where('id', Session::get('adminId'))->first(),
//            // 'user' => User::where('id', Session::get('adminId'))->first(),
//        ];
//
//
//        return view('admin.company.adminCompanyList', $data);
    }

    public function blogCategoryUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Category name is required',
            'status.required' => 'Status is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.blog.category.list');
        }

        $id = $request->id;

        //$blogCategory = DB::table('blog_categories')->where('id', $id)->first();
        $blogCategory = AdminBlogCategory::where('id', $id)->first();
        $blogCategory->name = $request->name;
        $blogCategory->status = $request->status;
        $blogCategory->slug = null;
        $blogCategory->save();
//        DB::table('blog_categories')->where('id', $id)->update([
//            'slug' => null,
//            'name' => $request->name,
//            'status' => $request->status
//
//        ]);

        $flasher->addSuccess('Category Update Success');

        return Redirect::route('admin.blog.category.list');

    }

}
