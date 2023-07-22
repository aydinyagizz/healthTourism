<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBlogCategory;
use App\Models\DiseaseCategory;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DiseasesCategoryController extends Controller
{
    public function diseaseCategoryList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            'diseases_category' => DiseaseCategory::all(),
        ];

        return view('admin.pages.diseaseCategory', $data);
    }

    public function diseaseCategoryAdd(Request $request, FlasherInterface $flasher)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.disease.category.list');
        }



        $diseaseCategory = new DiseaseCategory();
        $diseaseCategory->name = $request->name;
        $diseaseCategory->save();

        $flasher->addSuccess('Category added');


        return Redirect::route('admin.disease.category.list');
    }

    public function diseaseCategoryDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            DiseaseCategory::whereIn('id', $IDs)->delete();
        }
        if ($request->input('diseasesCategoryId')){
            $diseasesCategoryId = $request->input('diseasesCategoryId');
            DiseaseCategory::find($diseasesCategoryId)->delete();
        }


        return response()->json(['success'=>'Selected disease category have been deleted.']);
        // dd($request->all());
//        $data = [
//            'users' => User::where('user_role', 1)->with('roles')->get(),
//            'admin' => User::where('id', Session::get('adminId'))->first(),
//            // 'user' => User::where('id', Session::get('adminId'))->first(),
//        ];
//
//
//        return view('admin.company.adminCompanyList', $data);
    }

    public function diseaseCategoryUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Category name is required',
            'status.required' => 'Status is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.disease.category.list');
        }

        $id = $request->id;

        //$blogCategory = DB::table('blog_categories')->where('id', $id)->first();
        $diseaseCategory = DiseaseCategory::where('id', $id)->first();
        $diseaseCategory->name = $request->name;
        $diseaseCategory->status = $request->status;
        $diseaseCategory->slug = null;
        $diseaseCategory->save();
//        DB::table('blog_categories')->where('id', $id)->update([
//            'slug' => null,
//            'name' => $request->name,
//            'status' => $request->status
//
//        ]);

        $flasher->addSuccess('Category Update Success');

        return Redirect::route('admin.disease.category.list');

    }
}
