<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use App\Models\Citiest;
use App\Models\Disease;
use App\Models\DiseaseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFrontendCityController extends Controller
{
    public function adminFrontendCity(Request $request)
    {

//        $data = [
////        'city' => DB::table('cities')
////            ->paginate(10),
//
//        'city' => Citiest::with('diseases')
//                ->paginate(10),
//        'categories' => DiseaseCategory::where('status', 1)->get(),
//    ];
//
//        return view('adminFrontend.pages.adminFrontendCity', $data);


        $cityId = $request->input('city');
        $categoryId = $request->input('category');

        $query = Citiest::with(['diseases' => function ($q) use ($categoryId) {
            if ($categoryId) {
                $q->where('diseases.diseases_category_id', $categoryId);
            }
        }]);

        if ($categoryId) {
            $query->whereHas('diseases', function ($q) use ($categoryId) {
                $q->where('diseases.diseases_category_id', $categoryId);
            });
        }

        if ($cityId) {
            $query->where('cities.id', $cityId);
        }
        $totalCity = $query->get();

        $results = $query->paginate(10);


        return view('adminFrontend.pages.adminFrontendCity', [
            'city' => $results,
            'cityList' => DB::table('cities')->get(),
            'totalCity' => $totalCity,
            'categories' => DiseaseCategory::where('status', 1)->get(),
        ]);

    }


    public function adminFrontendCityDetail(Request $request, $slug)
    {

        $getCity = Citiest::where('slug', $slug)->first();


        $data = [
//        'city' => DB::table('cities')
//            ->paginate(10),

            'city' => Citiest::with('diseases')->where('slug', $slug)
                ->first(),

            'recentCity' => Citiest::with('diseases')->orderBy('created_at', 'desc')
                ->take(5)
                ->get(),

            'agencyCount' => User::where('user_role', 1)->where('city', $getCity->id)->count(),

           // 'categories' => DiseaseCategory::where('status', 1)->get(),
        ];

        $prevCity = Citiest::where('id', '<', $data['city']->id)
            ->orderBy('id', 'desc')
            ->first();

        // Sonraki şehir
        $nextCity = Citiest::where('id', '>', $data['city']->id)
            ->orderBy('id', 'asc')
            ->first();


        return view('adminFrontend.pages.adminFrontendCityDetail', $data, compact('prevCity', 'nextCity'));
    }
}
