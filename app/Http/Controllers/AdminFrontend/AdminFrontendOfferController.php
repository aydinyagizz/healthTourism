<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use App\Models\Citiest;
use App\Models\Disease;
use App\Models\DiseaseCategory;
use App\Models\FrontendOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminFrontendOfferController extends Controller
{
    public function adminFrontendOffer(Request $request)
    {

        // Eğer şehir detay sayfasında teklif al'a basıldıysa, hizmet alacağı şehir otomatik gelecek
        $cityId = request('city_id') ? request('city_id') : null;

        // Eğer hastalık detay sayfasında teklif al'a basıldıysa, hastalık kategorisi otomatik gelecek
        $categoryId = request('category_id') ? request('category_id') : null;
        $diseasesId = request('diseases_id') ? request('diseases_id') : null;


        $data = [
            'categories' => DiseaseCategory::where('status', 1)->get(),
            'city' => Citiest::with('diseases')
                ->get(),
            'country' => DB::table('countries')->get(),
        ];


        // Gerekli verileri view'a gönderelim
        return view('adminFrontend.pages.adminFrontendOffer', $data, compact('cityId', 'categoryId', 'diseasesId'));
    }

    public function adminFrontendOfferGetDiseases(Request $request)
    {

        //$data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        $data['diseases'] = Disease::where("diseases_category_id", $request->idCategory)
            ->where('status', 1)
       //     ->orderBy('title', 'ASC')
            ->get();

        return response()->json($data);
    }


    public function adminFrontendOfferPost(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3|max:35',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            //  'date_range' => 'required',
            'category' => 'required',
            'diseases' => 'required',
            'service_city' => 'required',

        ], [
            'name.required' => ' The full name field is required.',
            'name.min' => ' The full name must be at least 3 characters.',
            'name.max' => ' The full name may not be greater than 35 characters.',

            'email.required' => ' The last email field is required.',
            'email.email' => ' Email formatında giriniz.',
            'phone.required' => ' The phone field is required.',
            'country.required' => ' The country field is required.',
            'city.required' => ' The city field is required.',
            //   'date_range.required' => ' The date range field is required.',
            'category.required' => ' The category field is required.',
            'diseases.required' => ' The diseases field is required.',
            'service_city.required' => 'The city you will get service field is required.',
        ]);


       // dd($request->all());
        $offer = new FrontendOffer();
        $offer->name = $request->name;
        $offer->email = $request->email;
        $offer->phone = $request->phone;
        $offer->country = $request->country;
        $offer->city = $request->city;

        $dateRange = explode(' to ', $request->input('date_range'));

        if (count($dateRange) == 2) {
            $offer->date_range_start = $dateRange[0] ? $dateRange[0] : null; // İlk tarih
            $offer->date_range_end = $dateRange[1] ? $dateRange[1] : null; // İkinci tarih
        } else{
            $offer->date_range_start = $dateRange[0] ? $dateRange[0] : null; // İlk tarih
            $offer->date_range_end = null; // İkinci tarih
        }

        $offer->disease_id = $request->diseases;
        $offer->diseases_category_id  = $request->category;
        $offer->service_city  = $request->service_city;
        $offer->save();

        $message = 'Your request for quotation has been successfully created.'; // İstediğiniz mesajı buraya yazın
        $request->session()->flash('message', $message);


        // Gerekli verileri view'a gönderelim
        return Redirect::route('admin.frontend.offer');
        //return view('adminFrontend.pages.adminFrontendOffer');
    }
}
