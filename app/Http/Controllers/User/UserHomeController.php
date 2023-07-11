<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAboutUs;
use App\Models\UserHome;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserHomeController extends Controller
{
    public function homeList()
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            'home' => DB::table('user_homes')->where('user_id', Session::get('userId'))->first(),
        ];

        return view('user.pages.userHome', $data);
    }

    public function homeUpdate(Request $request, FlasherInterface $flasher)
    {

//        $validator = Validator::make($request->all(), [
//            'title' => 'required',
//            'about_us_content' => 'required',
//        ], [
//            'title.required' => 'Title is required',
//            'about_us_content.required' => 'Content is required',
//        ]);
//
//        if ($validator->fails()) {
//            foreach ($validator->errors()->all() as $error) {
//                $flasher->addError($error);
//            }
//            // Hata oluştuğunda yapılması gereken diğer işlemler...
//            return Redirect::route('user.about.us.list');
//        }
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            'home' => DB::table('user_homes')->where('user_id', Session::get('userId'))
                ->first(),
        ];


        if ($data['home'] == null){
            $home = new UserHome();
            $home->user_id = $data['user']->id;
            $home->title = $request->title;
            $home->description = $request->description;
            $home->backgroundColor = $request->color;
            $home->video = $request->video;

            if (!empty($request->file('logo'))) {

                $this->validate($request, [
                    'logo' => 'mimes:jpeg,jpg,png', 'max:4096',
                ], [
                    'logo.mimes' => 'Logo should be in jpg, jpeg, png format.',
                    'logo.max' => 'Logo cannot be larger than 4 MB.',
                ]);

                $image = base64_encode(file_get_contents($request->file('logo')->path()));

                $home->logo = $image;
            }

            if (!empty($request->file('image'))) {

                $this->validate($request, [
                    'image' => 'mimes:jpeg,jpg,png', 'max:4096',
                ], [
                    'image.mimes' => 'Image should be in jpg, jpeg, png format.',
                    'image.max' => 'Image cannot be larger than 4 MB.',
                ]);

                $image = base64_encode(file_get_contents($request->file('image')->path()));

                $home->image = $image;
            }

//            if (empty($request->file('user_image')) && $request->avatar_remove == 1) {
//                $user->user_image = null;
//            }

            $home->save();
            $flasher->addSuccess('Home Added Success');
        }else{
            $homeUpdate = UserHome::findOrFail($data['home']->id);
            //$homeUpdate->user_id = $data['user']->id;
            $homeUpdate->title = $request->title;
            $homeUpdate->description = $request->description;
            $homeUpdate->backgroundColor = $request->color == '#000000' ? null : $request->color;
            $homeUpdate->video = $request->video;

            if (!empty($request->file('logo'))) {

                $this->validate($request, [
                    'logo' => 'mimes:jpeg,jpg,png', 'max:4096',
                ], [
                    'logo.mimes' => 'Logo should be in jpg, jpeg, png format.',
                    'logo.max' => 'Logo cannot be larger than 4 MB.',
                ]);

                $image = base64_encode(file_get_contents($request->file('logo')->path()));

                $homeUpdate->logo = $image;
            }

            if (empty($request->file('logo')) && $request->logo_remove == 1) {
                $homeUpdate->logo = null;
            }


            if (!empty($request->file('image'))) {

                $this->validate($request, [
                    'image' => 'mimes:jpeg,jpg,png', 'max:4096',
                ], [
                    'image.mimes' => 'Image should be in jpg, jpeg, png format.',
                    'image.max' => 'Image cannot be larger than 4 MB.',
                ]);

                $image = base64_encode(file_get_contents($request->file('image')->path()));

                $homeUpdate->image = $image;
            }

            if (empty($request->file('image')) && $request->image_remove == 1) {
                $homeUpdate->image = null;
            }


            $homeUpdate->save();
            $flasher->addSuccess('Home Updated Success');
        }

        return Redirect::route('user.home.list');
    }
}
