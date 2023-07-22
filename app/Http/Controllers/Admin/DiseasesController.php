<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBlog;
use App\Models\AdminBlogCategory;
use App\Models\Citiest;
use App\Models\Disease;
use App\Models\DiseaseCategory;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DiseasesController extends Controller
{
    public function diseasesList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
            //'blog' => AdminBlog::all(),
//            'diseases' => DB::table('diseases')
//                ->leftJoin('disease_categories', 'diseases.diseases_category_id', '=', 'disease_categories.id')
//                ->select('diseases.*', 'disease_categories.name as category_name')
//                ->get(),

// bu sorguda şehir isimlerini de beraberinde aldık.
            'diseases' => Disease::with('cities')
                ->leftJoin('disease_categories', 'diseases.diseases_category_id', '=', 'disease_categories.id')
                ->select('diseases.*', 'disease_categories.name as category_name')
                ->get(),


            'diseases_category' => DiseaseCategory::where('status',1)->get(),
            'cities' => Citiest::get(),
        ];



//dd($diseases);
        return view('admin.pages.diseases', $data);
    }

    public function diseasesAdd(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'diseases_category' => 'required',
            'cities' => 'required',
            'diseases_content' => 'required',
           // 'status' => 'required',
        ], [
            'title.required' => 'Title is required',
            'diseases_category.required' => 'Category is required',
            'cities.required' => 'Cities is required',
            'diseases_content.required' => 'Content is required',
           // 'status.required' => 'Status is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.diseases.list');
        }


        $diseases = new Disease();
        $diseases->diseases_category_id = $request->diseases_category;
        $diseases->title = $request->title;
        $diseases->content = $request->diseases_content;


        if (!empty($request->file('diseases_image'))) {

            $this->validate($request, [
                'diseases_image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'diseases_image.mimes' => 'Diseases image should be in jpg, jpeg, png format.',
                'diseases_image.max' => 'Diseases photo cannot be larger than 4 MB.',
            ]);



            $image = base64_encode(file_get_contents($request->file('diseases_image')->path()));

            $diseases->image = $image;
        }

        $diseases->save();

        // Oluşan hastalığın kimliğini alın
        $diseaseId = $diseases->id;
        $diseases->cities()->sync($request->cities);


        $flasher->addSuccess('Diseases Added');
        return Redirect::route('admin.diseases.list');

    }

    public function diseasesDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            Disease::whereIn('id', $IDs)->delete();
        }
        if ($request->input('diseasesId')){
            $diseaseId = $request->input('diseasesId');
            Disease::find($diseaseId)->delete();
        }

        return response()->json(['success'=>'Selected disease have been deleted.']);
    }



    public function diseasesUpdate(Request $request, FlasherInterface $flasher)
    {
        $id = $request->id;

        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),

            'diseases' => Disease::with('cities')->where('diseases.id', $id)
                ->leftJoin('disease_categories', 'diseases.diseases_category_id', '=', 'disease_categories.id')
                ->select('diseases.*', 'disease_categories.name as category_name')
                ->first(),




            'diseases_category' => DiseaseCategory::where('status',1)->get(),
            'cities' => Citiest::get(),
        ];


        return view('admin.pages.diseasesUpdate', $data);
    }



    public function diseasesUpdatePost(Request $request, FlasherInterface $flasher)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'diseases_content' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'diseases_category' => 'required',
            'cities' => 'required',
        ], [
            'title.required' => 'Title is required',
            'diseases_content.required' => 'Content is required',
            'diseases_category.required' => 'Category is required',
            'status.required' => 'Status is required',
            'featured.required' => 'Featured is required',
            'cities.required' => 'Cities is required',

        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('admin.diseases.list');
        }

        $id = $request->id;

        //$blogCategory = AdminBlogCategory::where('id', $id)->first();
        $diseases = Disease::findOrFail($id);
        $diseases->title = $request->title;
        $diseases->content = $request->diseases_content;
        $diseases->status = $request->status;
        $diseases->featured = $request->featured;
        $diseases->diseases_category_id  = $request->diseases_category ;
        $diseases->slug = null;


        if (!empty($request->file('diseases_image'))) {

            $this->validate($request, [
                'diseases_image' => 'mimes:jpeg,jpg,png', 'max:4096',
            ], [
                'diseases_image.mimes' => 'Image should be in jpg, jpeg, png format.',
                'diseases_image.max' => 'Image cannot be larger than 4 MB.',
            ]);

            $image = base64_encode(file_get_contents($request->file('diseases_image')->path()));

            $diseases->image = $image;
        }

        if (empty($request->file('diseases_image')) && $request->avatar_remove == 1) {
            $diseases->image = null;
        }



        $diseases->save();

        $diseases->cities()->sync($request->cities);


        $flasher->addSuccess('Diseases Update Success');
        return Redirect::route('admin.diseases.list');

    }
}
