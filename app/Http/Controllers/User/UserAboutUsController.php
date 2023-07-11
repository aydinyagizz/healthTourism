<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AdminAboutUs;
use App\Models\User;
use App\Models\UserAboutUs;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserAboutUsController extends Controller
{
    public function aboutUsList()
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),

           // 'about_us' => DB::table('user_about_us')->first(),
            'about_us' => DB::table('user_about_us')->where('user_id', Session::get('userId'))
                ->first(),
        ];
        return view('user.pages.userAboutUs', $data);
    }

    public function aboutUsUpdate(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'about_us_content' => 'required',
        ], [
            'title.required' => 'Title is required',
            'about_us_content.required' => 'Content is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.about.us.list');
        }
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            'about_us' => DB::table('user_about_us')->where('user_id', Session::get('userId'))
                ->first(),
        ];


        if ($data['about_us'] == null){
            $about_us_add = new UserAboutUs();
            $about_us_add->user_id = $data['user']->id;
            $about_us_add->title = $request->title;
            $about_us_add->content = $request->about_us_content;
            $about_us_add->save();
            $flasher->addSuccess('About Us Added Success');
        }else{
            DB::table('user_about_us')->where('user_id', Session::get('userId'))->update([
                'user_id' => $data['user']->id,
                'title' =>  $request->title,
                'content' => $request->about_us_content,
            ]);

//            $about_us_update = $data['about_us'];
//            $about_us_update->user_id = $data['user']->id;
//            $about_us_update->title = $request->title;
//            $about_us_update->content = $request->about_us_content;
//            $about_us_update->save();
            $flasher->addSuccess('About Us Updated Success');
        }

        return Redirect::route('user.about.us.list');
    }
}
