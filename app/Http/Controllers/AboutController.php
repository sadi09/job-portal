<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\Slider;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index()
    {
        $company_info = CompanyInfo::get()->first();
        $about = About::get()->first();
        return view('pages.about', compact('company_info', 'about'));
    }
}
