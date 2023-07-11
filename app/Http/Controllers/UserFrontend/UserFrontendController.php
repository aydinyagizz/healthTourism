<?php

namespace App\Http\Controllers\UserFrontend;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAboutUs;
use App\Models\UserFaq;
use App\Models\UserPricing;
use App\Models\UserServices;
use App\Models\UserSocialMedia;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserFrontendController extends Controller
{
    public function userFrontendIndex (Request $request, $slug, FlasherInterface $flasher)
    {
        $user = User::where('slug', $slug)->first();

//        $page = User::where('domain', DynamicDomain::get())
//            ->firstOrFail();


//        if (!$user) {
//            //            TODO: burayı admin frontend'e yönlendireceğiz.
//            $flasher->addError('Page Not Found');
//            return view('welcome');
//        }

//        if ($user && isset($user->domain)){
//            return Redirect::away($user->domain);
//        }

        if (!$user || $user->status == 0) {
            $flasher->addError('Page Not Found');
            return view('welcome');
        }

        $data = [
            'user' => User::where('slug', $slug)->first(),
            'about_us' => UserAboutUs::where('user_id', $user->id)->first(),
            'services' => UserServices::where('user_id', $user->id)->where('status', 1)->get(),
            'pricing' => UserPricing::where('user_id', $user->id)->where('status', 1)->get(),
            'faq' => UserFaq::where('user_id', $user->id)->where('status', 1)->get(),
            'social_media' => UserSocialMedia::where('user_id', $user->id)->where('status', 1)->get(),
            'home' => DB::table('user_homes')->where('user_id', $user->id)->first(),
        ];

//        if ($data['user']->status == 0){
////            TODO: burayı admin frontend'e yönlendireceğiz.
//            $flasher->addError('Page Not Found');
//            return view('welcome');
//        }

        if ($data['user']->template == 1){
            return view('userFrontend.pages.userFrontendIndex', $data);
        }elseif ($data['user']->template == 2){
            return view('userFrontend_2.pages.userFrontend2Index', $data);
        }elseif ($data['user']->template == 3){
            return view('userFrontend_3.pages.userFrontend3Index', $data);
        }else{
            return view('userFrontend.pages.userFrontendIndex', $data);
        }



    }
}
