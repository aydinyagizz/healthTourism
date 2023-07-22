<?php

namespace App\Http\Controllers\AdminFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFrontendCityController extends Controller
{
    public function adminFrontendCity()
    {

        $data = [

            'city' => DB::table('cities')
                ->paginate(10),

        ];

        return view('adminFrontend.pages.adminFrontendCity', $data);
    }
}
