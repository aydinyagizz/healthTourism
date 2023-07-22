<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminFrontendCategoryController extends Controller
{
    public function adminFrontendCategory()
    {
        return view('adminFrontend.pages.adminFrontendCategory');
    }
}
