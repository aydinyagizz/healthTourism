<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserConfigController extends Controller
{
    public function userConfig()
    {

        $data = [
            //'user' => User::where('id', Session::get('adminId'))->first(),
            'user' => User::where('id', Session::get('userId'))->first(),
            // 'users' => User::where('user_role', 1)->get(),
        ];

        return view('user.pages.userConfig', $data);

    }

    public function userConfigTemplate(Request $request, FlasherInterface $flasher)
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
        ];

        $template = $request->template;

        $data['user']->template = $template;
        $data['user']->save();

        $flasher->addSuccess('Template Successfully Changed');
        return Redirect::route('user.config');

    }
}
