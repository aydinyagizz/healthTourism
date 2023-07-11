<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $user = array();
        if (Session::has('adminId')){
            $user = User::where('id', Session::get('adminId'))->first();
        }
        $data = [
            //'user' => User::where('id', Session::get('adminId'))->first(),
            'admin' => User::where('id', Session::get('adminId'))->first(),
           // 'users' => User::where('user_role', 1)->get(),
        ];

        return view('admin.pages.adminIndex', $data, compact('user'));

    }
}
