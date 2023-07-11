<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AdminPricing;
use App\Models\User;
use App\Models\UserPricing;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserPricingController extends Controller
{
    public function pricingList()
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            'pricing' => DB::table('user_pricings')->where('user_id', Session::get('userId'))->get(),
        ];

        return view('user.pages.userPricing', $data);
    }

    public function pricingAdd(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'pricing_content' => 'required',
            'status' => 'required',
            'price' => 'required',
            'price_suffix' => 'required',
        ], [
            'title.required' => 'Title is required',
            'pricing_content.required' => 'Content is required',
            'status.required' => 'Status is required',
            'price.required' => 'Price is required',
            'price_suffix.required' => 'Price suffix is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.pricing.list');
        }

        $pricing = new UserPricing();
        $pricing->user_id = Session::get('userId');
        $pricing->title = $request->title;
        $pricing->content = $request->pricing_content;
        $pricing->status = $request->status;
        $pricing->price = $request->price;
        $pricing->price_suffix = $request->price_suffix;
        $pricing->save();
        $flasher->addSuccess('Pricing Added Success');

        return Redirect::route('user.pricing.list');
    }

    public function pricingUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'pricing_content' => 'required',
            'status' => 'required',
            'price' => 'required',
            'price_suffix' => 'required',
        ], [
            'title.required' => 'Title is required',
            'pricing_content.required' => 'Content is required',
            'status.required' => 'Status is required',
            'price.required' => 'Price is required',
            'price_suffix.required' => 'Price suffix is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.pricing.list');
        }

        $id = $request->id;

        $services = UserPricing::findOrFail($id);
        $services->title = $request->title;
        $services->content = $request->pricing_content;
        $services->price = $request->price;
        $services->price_suffix = $request->price_suffix;
        $services->status = $request->status;
        $services->save();
        $flasher->addSuccess('Pricing Updated Success');
        return Redirect::route('user.pricing.list');
    }

    public function pricingDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            UserPricing::whereIn('id', $IDs)->delete();
        }
        if ($request->input('pricingId')){
            $pricingId = $request->input('pricingId');
            UserPricing::find($pricingId)->delete();
        }

        return response()->json(['success'=>'Selected pricing have been deleted.']);
    }
}
