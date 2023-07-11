<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminAboutUs;
use App\Models\AdminBlogCategory;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    public function aboutUsList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            //'about_us' => AdminAboutUs::first(),
           'about_us' => DB::table('admin_about_us')->first(),
        ];

        return view('admin.pages.aboutUs', $data);
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
            return Redirect::route('admin.about.us.list');
        }
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
           // 'about_us' => DB::table('admin_about_us')->first(),
            'about_us' => AdminAboutUs::first()
        ];

      if ($data['about_us'] == null){
          $about_us_add = new AdminAboutUs();
          $about_us_add->title = $request->title;
          $about_us_add->content = $request->about_us_content;
          $about_us_add->save();
          $flasher->addSuccess('About Us Added Success');
      }else{
         // dd($data['about_us']);
          $about_us_update = $data['about_us'];
          $about_us_update->title = $request->title;
          $about_us_update->content = $request->about_us_content;
          $about_us_update->save();
          $flasher->addSuccess('About Us Updated Success');
      }

      return Redirect::route('admin.about.us.list');
    }
}
