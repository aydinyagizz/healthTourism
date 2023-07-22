<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminFrontendBlogController extends Controller
{
    public function adminFrontendBlog()
    {
        return view('adminFrontend.pages.adminFrontendBlog');
    }
}
