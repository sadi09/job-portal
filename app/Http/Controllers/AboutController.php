<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\Slider;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $company_info = CompanyInfo::get()->first();
        $about = About::get()->first();
        return view('pages.about', compact('company_info', 'about'));
    }

    public function edit()
    {
        $about = About::get()->first();
        return view('pages.admin.content-settings.about-settings', compact('about'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "string|required",
            "content" => "string|required"
        ]);

        $about = About::find($id);
        $about->title = $request->input('title');
        $about->content = $request->input('content');
        $about->save();

        return redirect(route('about-settings'))->with('success', 'Content Updated');
    }
}
