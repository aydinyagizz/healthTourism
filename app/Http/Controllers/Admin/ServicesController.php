<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminServices;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function servicesList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            //'about_us' => AdminAboutUs::first(),
            'services' => DB::table('admin_services')->get(),
        ];

        return view('admin.pages.services', $data);
    }

    public function servicesAdd(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'services_content' => 'required',
            'status' => 'required',
            'home_status' => 'required',
            'selectedIcon' => 'required',
        ], [
            'title.required' => 'Title is required',
            'services_content.required' => 'Content is required',
            'status.required' => 'Status is required',
            'home_status.required' => 'home status is required',
            'selectedIcon.required' => 'Icon is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.services.list');
        }

        $services = new AdminServices();
        $services->title = $request->title;
        $services->content = $request->services_content;
        $services->status = $request->status;
        $services->home_status = $request->home_status;
        $services->icon = $request->selectedIcon;
        $services->save();
        $flasher->addSuccess('Services Added Success');

        return Redirect::route('admin.services.list');

    }

    public function servicesUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'services_content' => 'required',
            'home_status' => 'required',
            'status' => 'required',
            'selectedIconUpdate' => 'required',
        ], [
            'title.required' => 'Title is required',
            'services_content.required' => 'Content is required',
            'home_status.required' => 'Category is required',
            'status.required' => 'Status is required',
            'selectedIconUpdate.required' => 'Icon is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.services.list');
        }

        $id = $request->id;

        $services = AdminServices::findOrFail($id);
        $services->title = $request->title;
        $services->content = $request->services_content;
        $services->home_status = $request->home_status;
        $services->status = $request->status;
        $services->icon = $request->selectedIconUpdate;
        $services->save();
        $flasher->addSuccess('Services Updated Success');
        return Redirect::route('admin.services.list');
    }

    public function servicesDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            AdminServices::whereIn('id', $IDs)->delete();
        }
        if ($request->input('servicesId')){
            $servicesId = $request->input('servicesId');
            AdminServices::find($servicesId)->delete();
        }

        return response()->json(['success'=>'Selected services have been deleted.']);
    }
}
