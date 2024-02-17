<?php

namespace App\Http\Controllers;

use App\Helper\JwtToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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

    public function Login()
    {
        return view('pages.admin.auth.admin-login');
    }

    public function MakeLogin(Request $request)
    {
        try {

            $request->validate([
                'email' => 'string|required|email',
                'password' => 'string|required'
            ]);

            $user = User::where('email', '=', $request->input('email'))->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json(['status' => 'failed', 'message' => 'Invalid User']);
            }

            $token = JwtToken::createToken($request->input('email'), $user->id);

            return response()->json([
                'status' => 'success',
                'message' => 'Login Successful',
                'token' => $token
            ], 200)->cookie('token', $token, time() + 60 * 24 * 30);

        } catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }

    public function logout()
    {
        return redirect('/')->cookie('token','',-1);
    }

    public function Info(Request $request)
    {

    }
}
