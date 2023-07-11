<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = \App\Models\User::where('user_role', 0)->with('roles')->first();

        if (!Session::has('adminId')){
            return Redirect::route('login');
            //return abort(404);
        }
        if (!Auth::user()->roles[0]->name == 'Admin'){
            return Redirect::route('login');
            //return abort(404);
        }

        if (!$user->user_role == 0){
            return Redirect::route('login');
            //return abort(404);
        }
        return $next($request);
    }
}
