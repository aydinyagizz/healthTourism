<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use App\Models\DiseaseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminFrontendController extends Controller
{
    public function adminFrontendIndex()
    {
        $data = [

            'city' => DB::table('cities')
                ->where('featured', 1)
                ->get(),

            'diseases' => DB::table('diseases')
                ->where('featured', 1)
                ->get(),

            'cityList' => DB::table('cities')->get(),

            'categories' => DiseaseCategory::where('status', 1)->get(),

            'totalCity' => DB::table('cities')->count(),
            'totalUser' => DB::table('users')->where('user_role', '=' ,1)->where('status', '=' ,1)->count(),
            'totalDiseases' => DB::table('diseases')->where('status', '=' ,1)->count(),
        ];

        return view('adminFrontend.pages.adminFrontendIndex', $data);
    }
}
