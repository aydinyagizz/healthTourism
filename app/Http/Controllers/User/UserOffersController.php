<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserOffersController extends Controller
{
    public function offersList()
    {
        $user = User::where('id', Session::get('userId'))->first();
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            //'offers' => DB::table('frontend_offers')->where('service_city', $user->city)->get(),
            'offers' => DB::table('frontend_offers')
                ->join('countries', 'frontend_offers.country', '=', 'countries.id')
                ->join('diseases', 'frontend_offers.disease_id', '=', 'diseases.id')
                ->join('disease_categories', 'frontend_offers.diseases_category_id', '=', 'disease_categories.id')
                ->join('cities', 'frontend_offers.service_city', '=', 'cities.id')
                ->where('frontend_offers.service_city', $user->city)
                ->select('frontend_offers.*', 'countries.name as country_name', 'diseases.title as disease_title', 'disease_categories.name as disease_category_name', 'cities.name as city_name')
                ->get(),



        ];
        return view('user.pages.userOffers', $data);
    }
}
