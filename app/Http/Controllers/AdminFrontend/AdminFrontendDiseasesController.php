<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFrontendDiseasesController extends Controller
{
    public function adminFrontendDiseases()
    {

        $data = [

            'diseases' => Disease::with('cities')
                ->leftJoin('disease_categories', 'diseases.diseases_category_id', '=', 'disease_categories.id')
                ->select('diseases.*', 'disease_categories.name as category_name')
                ->where('diseases.status', 1)
                ->paginate(10),

            'city' => DB::table('cities')
                ->get(),

//            'diseases' => DB::table('diseases')->where('status', 1)
//                ->paginate(10),

        ];

        return view('adminFrontend.pages.adminFrontendDiseases', $data);
    }


//    public function adminFrontendFilterResults(Request $request)
//    {
//        $cityId = $request->input('city');
//        $diseaseId = $request->input('disease');
//
//        $query = Disease::with('cities')
//            ->leftJoin('disease_categories', 'diseases.diseases_category_id', '=', 'disease_categories.id')
//            ->where('diseases.status', 1);
//
//        if ($cityId) {
//            $query->whereHas('cities', function ($q) use ($cityId) {
//                $q->where('cities.id', $cityId);
//            });
//        }
//
//        if ($diseaseId) {
//            $query->where('diseases.id', $diseaseId);
//        }
//
//        $results = $query->get();
//
//        return response()->json($results);
//    }


    public function adminFrontendFilterResults(Request $request)
    {
        $cityId = $request->input('city');
        $diseaseId = $request->input('disease');



        $query = Disease::with('cities')
            ->leftJoin('disease_categories', 'diseases.diseases_category_id', '=', 'disease_categories.id')
            ->where('diseases.status', 1);

        if ($cityId) {
            $query->whereHas('cities', function ($q) use ($cityId) {
                $q->where('cities.id', $cityId);
            });
        }

        if ($diseaseId) {
            $query->where('diseases.id', $diseaseId);
        }

        $results = $query->get();

        return response()->json($results);
    }


}
