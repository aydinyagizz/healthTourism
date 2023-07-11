<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class alreadyLoggedIn
{

    public function handle(Request $request, Closure $next): Response
    {

        if (\Illuminate\Support\Facades\Session::has('adminId') && url('admin/login') == $request->url()){
            return Redirect::route('admin.index');
        }
//        if (\Illuminate\Support\Facades\Session::has('companyId') && url('login') == $request->url()){
//            return Redirect::route('company.index');
//        }
        if (\Illuminate\Support\Facades\Session::has('userId') && url('admin/login') == $request->url()){
            return Redirect::route('user.index');
            // return Redirect::back();
        }

        return $next($request);
    }
}
