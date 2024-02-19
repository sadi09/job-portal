<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index()
    {
        $company_info = CompanyInfo::get()->first();
        $about = About::get()->first();
        return view('pages.contact', compact('company_info',  'about'));
    }
}
