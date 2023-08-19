<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use App\Models\AdminBlog;
use App\Models\AdminBlogCategory;
use App\Models\Disease;
use Illuminate\Http\Request;

class AdminFrontendBlogController extends Controller
{
    public function adminFrontendBlog()
    {
        $data = [
            //'blog' => AdminBlog::orderBy('created_at', 'DESC')->paginate(5),
            'blog' => AdminBlog::where('admin_blogs.status', 1)->leftJoin('admin_blog_categories', 'admin_blogs.category_id', '=', 'admin_blog_categories.id')
                ->select('admin_blogs.*', 'admin_blog_categories.name as category_name', 'admin_blog_categories.slug as category_slug')
                ->orderBy('created_at', 'DESC')->paginate(10),

            'category' => AdminBlogCategory::where('status', 1)->get(),
            'recent_blog' => AdminBlog::orderBy('created_at', 'desc')->where('status', 1)->take(5)->get(),
        ];

        return view('adminFrontend.pages.adminFrontendBlog', $data);
    }

    public function adminFrontendBlogDetail(Request $request, $slug)
    {

        $data = [
            'blog_detail' => AdminBlog::where('slug', $slug)->firstOrFail(),
            'category' => AdminBlogCategory::where('status', 1)->get(),
            'recent_blog' => AdminBlog::orderBy('created_at', 'desc')->where('status', 1)->take(5)->get(),
        ];


        return view('adminFrontend.pages.adminFrontendBlogDetail', $data);
    }


    public function adminFrontendCategoryBlog($slug)
    {
        $category = AdminBlogCategory::where('slug', $slug)->first();

        $data = [

            'blog' => AdminBlog::where('category_id', $category->id)->where('admin_blogs.status', 1)->leftJoin('admin_blog_categories', 'admin_blogs.category_id', '=', 'admin_blog_categories.id')
                ->select('admin_blogs.*', 'admin_blog_categories.name as category_name', 'admin_blog_categories.slug as category_slug')
                ->paginate(10),

          //  'blog' => AdminBlog::where('category_id', $category->id)->paginate(5),
            'category' => AdminBlogCategory::where('status', 1)->get(),
            'category_get' => AdminBlogCategory::where('slug', $slug)->first(),
            'recent_blog' => AdminBlog::orderBy('created_at', 'desc')->where('status', 1)->take(5)->get(),
        ];

        return view('adminFrontend.pages.adminFrontendCategoryBlog', $data);
    }
}
