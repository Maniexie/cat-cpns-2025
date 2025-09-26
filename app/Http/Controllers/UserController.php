<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN //

    public function showLogin(Request $request)
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {

        $credentials = $request->only('name', 'email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                // $token = $user->createToken('remember_token')->plainTextToken;

                // return response()->json(['remember_token' => $token]);
            }
        }
        // dd($user);
        // $user = $request->user();
        return redirect('/dashboard')->with('success', 'Selamat anda berhasil login');

        // return response()->json($user);
    }


    // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER //
    public function showRegister(Request $request)
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password');
        $user = User::create($credentials);

        // return response()->json($user);
        return redirect('/login')->with('success', 'Selamat anda berhasil login');
    }


    // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT //

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'logout']);
    }





}
