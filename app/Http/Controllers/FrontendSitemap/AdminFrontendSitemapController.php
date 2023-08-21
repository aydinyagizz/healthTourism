<?php

namespace App\Http\Controllers\FrontendSitemap;

use App\Http\Controllers\Controller;
use App\Models\AdminBlog;
use App\Models\AdminBlogCategory;
use App\Models\Citiest;
use App\Models\Disease;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;
use Carbon\Carbon;
class AdminFrontendSitemapController extends Controller
{
    public function sitemap(){
        $now = Carbon::now()->toAtomString();
        $data = [
            'now' => $now,
            'blogs' => AdminBlog::where('status', 1)->get(),
            'cities' => Citiest::all(),
            'treatments' => Disease::where('status', 1)->get(),
            'categories' => AdminBlogCategory::where('status', 1)->get(),
        ];
       // $posts = Post::All();
       // $now = Carbon::now()->toAtomString();
        return response ()->view('sitemap.sitemap', $data)->header('Content-Type', 'application/xml');
    }
}
