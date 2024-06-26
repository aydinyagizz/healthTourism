<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use App\Models\AdminBlog;
use App\Models\DiseaseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminFrontendController extends Controller
{
    public function adminFrontendIndex()
    {
        $data = [

            'city' => DB::table('cities')
                ->where('featured', 1)
                ->get(),

            'diseases' => DB::table('diseases')
                ->where('featured', 1)
                ->get(),

            'cityList' => DB::table('cities')->get(),

            'categories' => DiseaseCategory::where('status', 1)->get(),

            'totalCity' => DB::table('cities')->count(),
            'totalUser' => DB::table('users')->where('user_role', '=' ,1)->where('status', '=' ,1)->count(),
            'totalDiseases' => DB::table('diseases')->where('status', '=' ,1)->count(),

            'blog' => AdminBlog::where('admin_blogs.status', 1)
                ->leftJoin('admin_blog_categories', 'admin_blogs.category_id', '=', 'admin_blog_categories.id')
                ->select('admin_blogs.*', 'admin_blog_categories.name as category_name', 'admin_blog_categories.slug as category_slug')
                ->orderBy('created_at', 'DESC')->take(3)->get(),
        ];


        return view('adminFrontend.pages.adminFrontendIndex', $data);
    }


    public function adminFrontendPrivacyPolicy()
    {
        return view('adminFrontend.pages.adminFrontendPrivacyPolicy');
    }
}
