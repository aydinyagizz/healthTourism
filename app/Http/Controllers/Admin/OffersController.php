<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiseaseCategory;
use App\Models\FrontendOffer;
use App\Models\User;
use App\Models\UserOfferStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OffersController extends Controller
{
    public function offerList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
//            'offers' => DB::table('frontend_offers')
//                ->join('countries', 'frontend_offers.country', '=', 'countries.id')
//                ->join('diseases', 'frontend_offers.disease_id', '=', 'diseases.id')
//                ->join('disease_categories', 'frontend_offers.diseases_category_id', '=', 'disease_categories.id')
//                ->join('cities', 'frontend_offers.service_city', '=', 'cities.id')
//                ->select('frontend_offers.*', 'countries.name as country_name', 'diseases.title as disease_title', 'disease_categories.name as disease_category_name', 'cities.name as city_name')
//                ->get(),

            'offers' => FrontendOffer::with('userOfferStatuses')
                ->join('countries', 'frontend_offers.country', '=', 'countries.id')
                ->join('diseases', 'frontend_offers.disease_id', '=', 'diseases.id')
                ->join('disease_categories', 'frontend_offers.diseases_category_id', '=', 'disease_categories.id')
                ->join('cities', 'frontend_offers.service_city', '=', 'cities.id')
                ->select('frontend_offers.*', 'countries.name as country_name', 'diseases.title as disease_title', 'disease_categories.name as disease_category_name', 'cities.name as city_name')
                ->get(),


            'category' => DiseaseCategory::where('status', 1)->get(),
        ];

        $userOfferStatuses = UserOfferStatus::whereIn('frontend_offer_id', $data['offers']->pluck('id'))
            ->get();

        // Şimdi, her teklif için ayrı bir teklif durumu oluşturuyoruz
        $offerStatuses = [];
        foreach ($data['offers'] as $offer) {
            $status = $userOfferStatuses->where('frontend_offer_id', $offer->id)->first();
            $offerStatuses[$offer->id] = $status ? $status->status : 'unprocessed';
        }

        $data['userOfferStatuses'] = $offerStatuses;




        return view('admin.pages.adminOffers', $data);
    }
}
