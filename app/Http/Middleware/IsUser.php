<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('userId')){
            return Redirect::route('login');
            //return abort(404);
        }

        if (!Auth::user()->roles[0]->name == 'User'){
            return Redirect::route('login');
            //return abort(404);
        }

        if (!Auth::user()->user_role == 1){
            return Redirect::route('login');
            //return abort(404);
        }
        return $next($request);
    }
}
