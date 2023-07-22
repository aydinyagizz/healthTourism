<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
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
        ];
        return view('adminFrontend.pages.adminFrontendIndex', $data);
    }
}
