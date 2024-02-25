<?php

namespace App\Http\Controllers;

use App\Helper\JwtToken;
use App\Models\Employer;
use App\Models\IndustryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login()
    {
        return view('pages.employer.auth.employer-login');
    }

    public function profile(Request $request)
    {
        $id = JwtToken::VerifyToken($request->cookie('token'))->id;
        $employer = Employer::find($id);
        $industry_types = IndustryType::all();
//        return json_encode($industry_types);
//        die();
        return view('pages.employer.profile.employer-profile', compact('employer', 'industry_types'));
    }

    public function UpdateProfilePicture(Request $request)
    {
        $request->validate([
            "img" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        $id = JwtToken::VerifyToken($request->cookie('token'))->id;

        $img = $request->file('img');
        $fileName = str_replace(" ", "", $img->getClientOriginalName());
        $time = time();
        $img_name = "{$time}-{$id}-{$fileName}";
        $img_url = "uploads/{$img_name}";

        $img->move(public_path('uploads'), $img_name);
        File::delete($request->input('image_path'));

        Employer::where('id', $id)->update([
            "company_logo" => $img_url
        ]);

        return redirect(route('employer-profile'))->with('success', 'Content Updated');

    }

    public function UpdateCredential(Request $request)
    {
        $request->validate([
            "password" => "required|string|min:6"
        ]);

        $id = JwtToken::VerifyToken($request->cookie('token'))->id;

        Employer::where('id', $id)->update([
            "password" => Hash::make($request->input('password'))
        ]);

        return redirect(route('employer-profile'))->with('success', 'Content Updated');
    }

    public function UpdateProfileDetails(Request $request)
    {
        $request->validate([
            "company_name" => "string|min:2",
            "contact_number" => "string|min:11",
            "company_description" => "string|min:10|max:300",
            "company_website" => "url",
        ]);

        $id = JwtToken::VerifyToken($request->cookie('token'))->id;

        Employer::find($id)
            ->update([
                "company_name" => $request->input('company_name'),
                "contact_number" => $request->input('contact_number'),
                "company_description" => $request->input('company_description'),
                "company_website" => $request->input('company_website')
            ]);

        return redirect(route('employer-profile'))->with('success', 'Content Updated');
    }
}
