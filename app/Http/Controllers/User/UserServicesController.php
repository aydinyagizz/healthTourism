<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AdminServices;
use App\Models\User;
use App\Models\UserServices;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserServicesController extends Controller
{
    public function servicesList()
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            //'about_us' => AdminAboutUs::first(),
            'services' => DB::table('user_services')->where('user_id', Session::get('userId'))->get(),
        ];

        return view('user.pages.userServices', $data);
    }

    public function servicesAdd(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'services_content' => 'required',
            'status' => 'required',
            'selectedIcon' => 'required',
        ], [
            'title.required' => 'Title is required',
            'services_content.required' => 'Content is required',
            'status.required' => 'Status is required',
            'selectedIcon.required' => 'Icon is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.services.list');
        }

        $services = new UserServices();
        $services->user_id = Session::get('userId');
        $services->title = $request->title;
        $services->content = $request->services_content;
        $services->icon = $request->selectedIcon;
        $services->status = $request->status;
        $services->save();
        $flasher->addSuccess('Services Added Success');

        return Redirect::route('user.services.list');

    }

    public function servicesUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'services_content' => 'required',
            'status' => 'required',
            'selectedIconUpdate' => 'required',
        ], [
            'title.required' => 'Title is required',
            'services_content.required' => 'Content is required',
            'status.required' => 'Status is required',
            'selectedIconUpdate.required' => 'Icon is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.services.list');
        }

        $id = $request->id;

        $services = UserServices::findOrFail($id);
        $services->title = $request->title;
        $services->content = $request->services_content;
        $services->status = $request->status;
        $services->icon = $request->selectedIconUpdate;
        $services->save();
        $flasher->addSuccess('Services Updated Success');
        return Redirect::route('user.services.list');
    }

    public function servicesDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            UserServices::whereIn('id', $IDs)->delete();
        }
        if ($request->input('servicesId')){
            $servicesId = $request->input('servicesId');
            UserServices::find($servicesId)->delete();
        }

        return response()->json(['success'=>'Selected services have been deleted.']);
    }
}
