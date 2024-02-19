<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    function index()
    {
        $company_info = CompanyInfo::get()->first();
        $contact = Contactus::get()->first();
        return view('pages.contact', compact('company_info', 'contact'));
    }

    public function edit()
    {
        $contact = Contactus::get()->first();
        return view('pages.admin.content-settings.contact-settings', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "string|required",
            "content" => "string|required",
            "receive_email" => "email|required",
            "location_embed_link" => "string|required"
        ]);

        $contactus = Contactus::find($id);
        $contactus->title = $request->input('title');
        $contactus->content = $request->input('content');
        $contactus->receive_email = $request->input('receive_email');
        $contactus->location_embed_link = $request->input('location_embed_link');
        $contactus->save();

        return redirect(route('contact-settings'))->with('success', 'Content Updated');
    }
}
