<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    function index()
    {
        $company_info = CompanyInfo::get()->first();
        $slider = Slider::get()->first();
        $about = About::get()->first();
        return view('pages.landing', compact('company_info', 'slider', 'about'));
    }
}
