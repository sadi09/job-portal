<?php

namespace App\Http\Controllers;

use App\Helper\JwtToken;
use App\Models\About;
use App\Models\CompanyInfo;
use App\Models\Slider;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $token = $request->cookie('token');
//        $id = JwtToken::VerifyToken($token)->id;
//        $user = User::find($id);
//
//        return ($user->getPermissionsViaRoles());
//        die();
        try {
            $users = User::get();
            $roles = Role::get();
            return view('pages.admin.user.users', compact('users', 'roles'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
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

//        try {
        $request->validate([
            'firstName' => 'string|required|max:50',
            'lastName' => 'string|required|max:50',
            'email' => 'string|required|email|unique:users,email',
            'mobile' => 'string|required|unique:users,mobile',
            'password' => 'string|required|min:4|confirmed',
            'assignedRoles' => 'required'
        ]);

        $user = User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password'))
        ]);

        $user->assignRole($request->input('assignedRoles'));

        return redirect()->route('users.index')
            ->with('success', 'User Saved Successfully');

//        } catch (Exception $e) {
//            return redirect()->route('users.index')
//                ->with('error', $e->getMessage());
//        }
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
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $assignedRoles = $user->roles->pluck('name', 'name')->all();

        return view('pages.admin.user.edit-user', compact('user', 'roles', 'assignedRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        $request->validate([
            'firstName' => 'string|required|max:50',
            'lastName' => 'string|required|max:50',
//            'email' => 'string|required|email|unique:users,email', //can not change primary key
            'mobile' => 'string|required|unique:users,mobile,' . $user->id,
            'password' => 'string|min:4|confirmed|nullable',
            'assignedRoles' => 'required'
        ]);

        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
//        $user->email = $request->input('email'); //can not change primary key
        $user->mobile = $request->input('mobile');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('assignedRoles'));

        return redirect()->route('users.index')
            ->with('success', 'User Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
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
        return redirect('/')->cookie('token', '', -1);
    }

    public function Info(Request $request)
    {

    }
}
