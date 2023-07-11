<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserEditController extends Controller
{
    public function userEdit()
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
        ];

        return view('user.pages.userEdit', $data);

    }

    public function userEditProfileDetail(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            //  'email' => 'required|email|unique:users',
//            'password' => 'required|min:6|max:20',
//            'confirm_password' => 'required|min:6|max:20|same:password',
            'phone' => 'required|numeric',
            'address' => 'required',
            // 'country' => 'required',
            'web_site_name' => 'required',
        ], [
            'name.required' => 'Name is required',

//            'email.required' => 'Email is required',
//            'email.email' => 'Email must be in email format',
//            'email.unique' => 'This email is already registered',

//            'password.required' => 'Password is required',
//            'password.min' => 'Password must be at least 6 characters',
//            'password.max' => 'Password must be a maximum of 20 characters',
//
//            'confirm_password.required' => 'Confirm password  is required',
//            'confirm_password.min' => 'Confirm password must be at least 6 characters',
//            'confirm_password.max' => 'Confirm password must be a maximum of 20 characters',
//            'confirm_password.same' => 'Passwords do not match',

            'phone.required' => 'Phone is required',
            'phone.numeric' => 'Phone must be numeric',

            'address.required' => 'Address is required',
            // 'country.required' => 'Country is required',
            'web_site_name.required' => 'Web site name is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.edit');
        }


        //$blogCategory = AdminBlogCategory::where('id', $id)->first();
        $user = User::findOrFail(Session::get('userId'));
        $user->name = $request->name;
        $user->phone = Str::of($request->phone)->replaceMatches('/[^A-Za-z0-9]++/', '');
        $user->web_site_name = $request->web_site_name;
        $user->address = $request->address;
        //$user->slug = null;


        if (!empty($request->file('user_image'))) {

            $this->validate($request, [
                'user_image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'user_image.mimes' => 'User image should be in jpg, jpeg, png format.',
                'user_image.max' => 'User image cannot be larger than 4 MB.',
            ]);

            $image = base64_encode(file_get_contents($request->file('user_image')->path()));

            $user->user_image = $image;
        }

        if (empty($request->file('user_image')) && $request->avatar_remove == 1) {
            $user->user_image = null;
        }

        $user->save();

        $flasher->addSuccess('User Update Success');
        return Redirect::route('user.edit');
    }

    public function userEditEmail(Request $request, FlasherInterface $flasher)
    {
        $user = User::where('id', Session::get('userId'))->first();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'confirmemailpassword' => 'required|min:6|max:20',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be in email format',
            'email.unique' => 'This email is already registered',

            'confirmemailpassword.required' => 'Password is required',
            'confirmemailpassword.min' => 'Password must be at least 6 characters',
            'confirmemailpassword.max' => 'Password must be a maximum of 20 characters',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.edit');
        }

        if (!Hash::check($request->confirmemailpassword, $user->password)) {
            $flasher->addError('The password is incorrect');
            return Redirect::route('user.edit');
        } else {
            $user->email = $request->email;
            $user->save();
            $flasher->addSuccess('Email update successful');
            return Redirect::route('user.edit');
        }
    }

    public function userEditPassword(Request $request, FlasherInterface $flasher)
    {
        $user = User::where('id', Session::get('userId'))->first();
        //$request->currentpassword
        //$request->newpassword
        //$request->confirmpassword

        $validator = Validator::make($request->all(), [
            'currentpassword' => 'required|min:6|max:20',
            'newpassword' => 'required|min:6|max:20',
            'confirmpassword' => 'required|min:6|max:20|same:password',
        ], [
            'currentpassword.required' => 'Password is required',
            'currentpassword.min' => 'Password must be at least 6 characters',
            'currentpassword.max' => 'Password must be a maximum of 20 characters',

            'newpassword.required' => 'Password is required',
            'newpassword.min' => 'Password must be at least 6 characters',
            'newpassword.max' => 'Password must be a maximum of 20 characters',

            'confirmpassword.required' => 'Confirm password  is required',
            'confirmpassword.min' => 'Confirm password must be at least 6 characters',
            'confirmpassword.max' => 'Confirm password must be a maximum of 20 characters',
            'confirmpassword.same' => 'Passwords do not match',
        ]);

        if (!Hash::check($request->currentpassword, $user->password)) {
            $flasher->addError('The password is incorrect');
            return Redirect::route('user.edit');
        } else {
            $user->password = Hash::make($request->newpassword);
            $user->save();
            $flasher->addSuccess('Password update successful');
            return Redirect::route('user.edit');
        }
    }
}
