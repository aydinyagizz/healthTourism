<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiseaseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OffersController extends Controller
{
    public function offerList()
    {
        $data = [
            'admin' => User::where('id', Session::get('adminId'))->first(),
//            'blog' => DB::table('admin_blogs')
//                ->leftJoin('admin_blog_categories', 'admin_blogs.category_id', '=', 'admin_blog_categories.id')
//                ->select('admin_blogs.*', 'admin_blog_categories.name as category_name')
//                ->get(),
//            'blog_category' => AdminBlogCategory::where('status',1)->get(),
            'offers' => DB::table('frontend_offers')
                ->join('countries', 'frontend_offers.country', '=', 'countries.id')
                ->join('diseases', 'frontend_offers.disease_id', '=', 'diseases.id')
                ->join('disease_categories', 'frontend_offers.diseases_category_id', '=', 'disease_categories.id')
                ->join('cities', 'frontend_offers.service_city', '=', 'cities.id')
                ->select('frontend_offers.*', 'countries.name as country_name', 'diseases.title as disease_title', 'disease_categories.name as disease_category_name', 'cities.name as city_name')
                ->get(),
            'category' => DiseaseCategory::where('status', 1)->get(),
        ];


        return view('admin.pages.adminOffers', $data);
    }
}
