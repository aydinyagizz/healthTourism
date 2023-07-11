<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function userIndex()
    {
        $user = array();
        if (Session::has('userId')){
            $user = User::where('id', Session::get('userId'))->first();
        }
        $data = [
            //'user' => User::where('id', Session::get('adminId'))->first(),
            'user' => User::where('id', Session::get('userId'))->first(),
            // 'users' => User::where('user_role', 1)->get(),
        ];

        return view('user.pages.userIndex', $data, compact('user'));

    }
}
