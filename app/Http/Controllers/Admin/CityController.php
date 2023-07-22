<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBlog;
use App\Models\AdminBlogCategory;
use App\Models\Citiest;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function cityList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
//            'blog' => DB::table('admin_blogs')
//                ->leftJoin('admin_blog_categories', 'admin_blogs.category_id', '=', 'admin_blog_categories.id')
//                ->select('admin_blogs.*', 'admin_blog_categories.name as category_name')
//                ->get(),
//            'blog_category' => AdminBlogCategory::where('status',1)->get(),
        'city' => DB::table('cities')->get(),
        ];


        return view('admin.pages.city', $data);
    }

    public function cityAdd(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'districts' => 'required',
            'featured' => 'required',

        ], [
            'name.required' => 'Name is required',
            'districts.required' => 'Districts is required',
            'featured.required' => 'Featured is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.city.list')->withErrors($validator->errors()->all())->withInput();
        }



        $city = new Citiest();
        $city->name = $request->name;

        $districts = explode(',', $request->input('districts'));
        $city->districts = json_encode($districts, JSON_UNESCAPED_UNICODE);


        $city->featured = $request->featured;


        if (!empty($request->file('image'))) {

            $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'image.mimes' => 'image should be in jpg, jpeg, png format.',
                'image.max' => 'image cannot be larger than 4 MB.',
            ]);


            $image = base64_encode(file_get_contents($request->file('image')->path()));


            $city->image = $image;
        }

        $city->save();
        $flasher->addSuccess('City Added');
        return Redirect::route('admin.city.list');

        // return view('admin.pages.blog', $data);
    }

    public function cityUpdate(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'districts' => 'required',
            'featured' => 'required',

        ], [
            'name.required' => 'Name is required',
            'districts.required' => 'Districts is required',
            'featured.required' => 'Featured is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.city.list')->withErrors($validator->errors()->all())->withInput();
        }

        $id = $request->id;

        //$blogCategory = AdminBlogCategory::where('id', $id)->first();
        $city = Citiest::findOrFail($id);
        $city->name = $request->name;

        $districtsArray = explode(', ', $request->input('districts'));
        $districtsJson = json_encode($districtsArray, JSON_UNESCAPED_UNICODE);
        $city->districts = $districtsJson;

        $city->featured = $request->featured;


        if (!empty($request->file('image'))) {

            $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'image.mimes' => 'image should be in jpg, jpeg, png format.',
                'image.max' => 'image cannot be larger than 4 MB.',
            ]);

            $image = base64_encode(file_get_contents($request->file('image')->path()));

            $city->image = $image;
        }

        if (empty($request->file('image')) && $request->avatar_remove == 1) {
            $city->image = null;
        }



        $city->save();


        $flasher->addSuccess('City Update Success');
        return Redirect::route('admin.city.list');

    }



    public function cityDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            Citiest::whereIn('id', $IDs)->delete();
        }
        if ($request->input('cityId')){
            $cityId = $request->input('cityId');
            Citiest::find($cityId)->delete();
        }

        return response()->json(['success'=>'Selected blog have been deleted.']);
    }
}
