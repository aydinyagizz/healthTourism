<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminPricing;
use App\Models\AdminServices;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PricingController extends Controller
{
    public function pricingList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            //'about_us' => AdminAboutUs::first(),
            'pricing' => DB::table('admin_pricings')->get(),
        ];

        return view('admin.pages.pricing', $data);
    }

    public function pricingAdd(Request $request, FlasherInterface $flasher)
    {
//        $data = [
//            'admin' => User::where('id', Session::get('adminId'))->first(),
//            //'about_us' => AdminAboutUs::first(),
//            'services' => DB::table('admin_services')->get(),
//        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'pricing_content' => 'required',
            'status' => 'required',
            'home_status' => 'required',
            'price' => 'required',
            'price_suffix' => 'required',
        ], [
            'title.required' => 'Title is required',
            'pricing_content.required' => 'Content is required',
            'status.required' => 'Status is required',
            'home_status.required' => 'Home status is required',
            'price.required' => 'Price is required',
            'price_suffix.required' => 'Price suffix is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.pricing.list');
        }

        $pricing = new AdminPricing();
        $pricing->title = $request->title;
        $pricing->content = $request->pricing_content;
        $pricing->status = $request->status;
        $pricing->home_status = $request->home_status;
        $pricing->price = $request->price;
        $pricing->price_suffix = $request->price_suffix;
        $pricing->save();
        $flasher->addSuccess('Pricing Added Success');

        return Redirect::route('admin.pricing.list');
    }

    public function pricingDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            AdminPricing::whereIn('id', $IDs)->delete();
        }
        if ($request->input('pricingId')){
            $pricingId = $request->input('pricingId');
            AdminPricing::find($pricingId)->delete();
        }

        return response()->json(['success'=>'Selected pricing have been deleted.']);
    }

    public function pricingUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'pricing_content' => 'required',
            'home_status' => 'required',
            'status' => 'required',
            'price' => 'required',
            'price_suffix' => 'required',
        ], [
            'title.required' => 'Title is required',
            'pricing_content.required' => 'Content is required',
            'home_status.required' => 'Category is required',
            'status.required' => 'Status is required',
            'price.required' => 'Price is required',
            'price_suffix.required' => 'Price suffix is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.pricing.list');
        }

        $id = $request->id;

        $services = AdminPricing::findOrFail($id);
        $services->title = $request->title;
        $services->content = $request->pricing_content;
        $services->price = $request->price;
        $services->price_suffix = $request->price_suffix;
        $services->home_status = $request->home_status;
        $services->status = $request->status;
        $services->save();
        $flasher->addSuccess('Pricing Updated Success');
        return Redirect::route('admin.pricing.list');
    }
}
