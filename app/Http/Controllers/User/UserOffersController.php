<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DiseaseCategory;
use App\Models\FrontendOffer;
use App\Models\User;
use App\Models\UserOfferStatus;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserOffersController extends Controller
{
    public function offersList()
    {


        $user = User::where('id', Session::get('userId'))->first();

//        TODO: $data['userOfferStatuses'] bu yöntem yerine bu yöntem de kullanılabilir
        $offersAndStatus = FrontendOffer::with('userOfferStatuses')->where('service_city', $user->city)->get();
         // dd($offersAndStatus);


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
            'category' => DiseaseCategory::where('status', 1)->get(),

        ];

        // Şimdi, kullanıcı teklif durumunu alıyoruz (eğer varsa)
        $userOfferStatuses = UserOfferStatus::where('user_id', $user->id)
            ->whereIn('frontend_offer_id', $data['offers']->pluck('id'))
            ->get();

        // Şimdi, her teklif için ayrı bir teklif durumu oluşturuyoruz
        $offerStatuses = [];
        foreach ($data['offers'] as $offer) {
            $status = $userOfferStatuses->where('frontend_offer_id', $offer->id)->first();
            $offerStatuses[$offer->id] = $status ? $status->status : 'unprocessed';
        }

        $data['userOfferStatuses'] = $offerStatuses;



        return view('user.pages.userOffers', $data);
    }





    public function updateStatus($id, Request $request, FlasherInterface $flasher)
    {
//        $this->validate($request, [
//            'status' => 'required|in:unprocessed,under_review,approved,rejected'
//        ]);

        $offerStatus = UserOfferStatus::where('frontend_offer_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$offerStatus) {
            // Eğer teklif için durum yoksa, yeni bir durum oluştur ve ilişkilendir
            $offerStatus = new UserOfferStatus([
                'frontend_offer_id' => $id,
                'user_id' => auth()->id(),
                'status' => $request->status,
            ]);

            $offerStatus->save();
        } else {
            // Eğer teklif için durum zaten varsa, güncelle
            $offerStatus->status = $request->status;
            $offerStatus->save();
        }


        $flasher->addSuccess('güncelleme başarılı');
        return Redirect::route('user.offers.list');

       // return response()->json(['message' => 'Teklif durumu güncellendi.']);
    }
}
