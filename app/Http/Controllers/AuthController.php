<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN // LOGIN //

    public function showLogin(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard'); // Redirect to intended URL or dashboard
        }
        $request->session()->put('user_id', Auth::user()->id);

        session()->flash('error', 'Invalid credentials.');

        return back()->withInput($request->only('email'));
    }

    // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER // REGISTER //
    public function showRegister(Request $request)
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'], // The key part for unique email
            'password' => ['required', 'string', 'min:8'],
        ]);

        // dd($validatedData);

        // If validation passes, create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // return response()->json($user);
        return redirect('/login')->with('success', 'Selamat anda berhasil register');
    }

    // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT // LOGOUT //

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Selamat anda berhasil logout');
    }
}
