<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserServices;
use App\Models\UserSocialMedia;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserSocialMediaController extends Controller
{
    public function socialMediaList()
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            //'about_us' => AdminAboutUs::first(),
            'social_media' => DB::table('user_social_media')->where('user_id', Session::get('userId'))->get(),
        ];

        return view('user.pages.userSocialMedia', $data);
    }

    public function socialMediaAdd(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required',
            'status' => 'required',
            'selectedIcon' => 'required',
        ], [
            'link.required' => 'Link is required',
            'status.required' => 'Status is required',
            'selectedIcon.required' => 'Icon is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.social.media.list');
        }

        $social_media = new UserSocialMedia();
        $social_media->user_id = Session::get('userId');
        $social_media->link = $request->link;
        $social_media->icon = $request->selectedIcon;
        $social_media->status = $request->status;
        $social_media->save();
        $flasher->addSuccess('Social Media Added Success');

        return Redirect::route('user.social.media.list');

    }

    public function socialMediaUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required',
            'status' => 'required',
            'selectedIconUpdate' => 'required',
        ], [
            'link.required' => 'Link is required',
            'status.required' => 'Status is required',
            'selectedIconUpdate.required' => 'Icon is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.social.media.list');
        }

        $id = $request->id;

        $social_media = UserSocialMedia::findOrFail($id);
        $social_media->link = $request->link;
        $social_media->status = $request->status;
        $social_media->icon = $request->selectedIconUpdate;
        $social_media->save();
        $flasher->addSuccess('Social Media Updated Success');
        return Redirect::route('user.social.media.list');
    }

    public function socialMediaDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            UserSocialMedia::whereIn('id', $IDs)->delete();
        }
        if ($request->input('socialMediaId')){
            $socialMediaId = $request->input('socialMediaId');
            UserSocialMedia::find($socialMediaId)->delete();
        }

        return response()->json(['success'=>'Selected social media have been deleted.']);
    }
}
