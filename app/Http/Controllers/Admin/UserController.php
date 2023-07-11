<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBlogCategory;
use App\Models\AdminPricing;
use App\Models\User;
use App\Models\UserLog;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function userList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            'users' => User::where('user_role', 1)->get(),
            //'users' => DB::table('users')->where('user_role', 1)->get(),
            // 'logs' => UserLog::with('user')->latest()->paginate(10),
            //'userLastLog' => UserLog::where('user_id', $userId)->latest()->first()
        ];
        //dd($data['logs'][0]->getLastLoginAttribute());


        return view('admin.pages.user', $data);
    }

    public function userAdd(Request $request, FlasherInterface $flasher)
    {

//        Permission::create(['name' => 'pricing view']);
//        Permission::create(['name' => 'pricing create']);
//        Permission::create(['name' => 'pricing update']);
//        Permission::create(['name' => 'pricing delete']);
//        Permission::create(['name' => 'faq view']);
//        Permission::create(['name' => 'faq create']);
//        Permission::create(['name' => 'faq update']);
//        Permission::create(['name' => 'faq delete']);


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|min:6|max:20|same:password',
            'phone' => 'required|numeric',
            'address' => 'required',
            // 'country' => 'required',
            'web_site_name' => 'required',
        ], [
            'name.required' => 'Name is required',

            'email.required' => 'Email is required',
            'email.email' => 'Email must be in email format',
            'email.unique' => 'This email is already registered',

            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be a maximum of 20 characters',

            'confirm_password.required' => 'Confirm password  is required',
            'confirm_password.min' => 'Confirm password must be at least 6 characters',
            'confirm_password.max' => 'Confirm password must be a maximum of 20 characters',
            'confirm_password.same' => 'Passwords do not match',

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
            return Redirect::route('admin.user.list');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = 1;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->phone = Str::of($request->phone)->replaceMatches('/[^A-Za-z0-9]++/', '');
        $user->address = $request->address;
        $user->web_site_name = $request->web_site_name;
        $user->syncRoles('User');

        if (!empty($request->file('user_image'))) {

            $validatorImage = Validator::make($request->all(), [
                'user_image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'user_image.mimes' => 'User image should be in jpg, jpeg, png format.',
                'user_image.max' => 'user photo cannot be larger than 4 MB.',
            ]);

            if ($validatorImage->fails()) {
                foreach ($validatorImage->errors()->all() as $error) {
                    $flasher->addError($error);
                }
                // Hata oluştuğunda yapılması gereken diğer işlemler...
                return Redirect::route('admin.user.list');
            }

            $user_image = base64_encode(file_get_contents($request->file('user_image')->path()));
            $user->user_image = $user_image;

        }

        $user->save();

        $user->givePermissionTo([
            'about us view',
            'about us update',
            'services view',
            'services create',
            'services update',
            'services delete',
            'pricing view',
            'pricing create',
            'pricing update',
            'pricing delete',
            'faq view',
            'faq create',
            'faq update',
            'faq delete'
        ]);


        $flasher->addSuccess('User Added Success');

        return Redirect::route('admin.user.list');
    }

    public function userDelete(Request $request)
    {
        if ($request->input('IDs')) {
            $IDs = $request->input('IDs');
            User::whereIn('id', $IDs)->delete();
        }
        if ($request->input('userId')) {
            $userId = $request->input('userId');
            User::find($userId)->delete();
        }

        return response()->json(['success' => 'Selected user have been deleted.']);
    }

    public function userUpdate(Request $request, FlasherInterface $flasher)
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
            return Redirect::route('admin.user.list');
        }

        $id = $request->id;

        //$blogCategory = AdminBlogCategory::where('id', $id)->first();
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = Str::of($request->phone)->replaceMatches('/[^A-Za-z0-9]++/', '');
        $user->web_site_name = $request->web_site_name;
        $user->address = $request->address;
        $user->status = $request->status;
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
        //return Redirect::route('admin.user.list');
        //return Redirect::route('admin.user.detail', [$id]);
        return Redirect::back();

    }

    public function userDetail(Request $request, FlasherInterface $flasher)
    {
        $id = $request->id;
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            'user' => User::where('id', $id)->first(),
            //'users' => DB::table('users')->where('user_role', 1)->get(),
            'logs' => UserLog::where('user_id', $id)->with('user')->latest()->paginate(10),
            'userLastLog' => UserLog::where('user_id', $id)->latest()->first(),

        ];
        $user = User::find($id);
        $userPermissions = $user->permissions()->pluck('name')->toArray();

        //dd($data['logs'][0]->getLastLoginAttribute());

        return view('admin.pages.userDetail', $data)->with(compact('userPermissions'));
    }

    public function userDetailLog(Request $request)
    {
        $id = $request->id;
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            'user' => User::where('id', $id)->first(),
            //'users' => DB::table('users')->where('user_role', 1)->get(),
            'logs' => UserLog::where('user_id', $id)->with('user')->latest()->paginate(10),
            'userLastLog' => UserLog::where('user_id', $id)->latest()->first()
        ];
        //dd($data['logs'][0]->getLastLoginAttribute());

        return view('admin.pages.userDetailLogs', $data);
    }

    public function userPermissions(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'permissions' => 'required|array',
            'permissions.*' => 'required',
        ], [
            'permissions.required' => 'Permissions field is required.',
            'permissions.array' => 'Permissions must be an array.',
            'permissions.*.required' => 'Each permission must have a value.',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::back();
        }

        $id = $request->id;
        $user = User::find($id);
        $permissions = $request->permissions;
        $permissionModels = Permission::whereIn('name', $permissions)->get();

        if ($permissionModels->isNotEmpty()) {
            $user->syncPermissions($permissionModels);
            $flasher->addSuccess('Permissions assigned successfully.');
        } else {
            $flasher->addWarning('No permissions selected.');
        }

        return redirect()->back();
    }
}
