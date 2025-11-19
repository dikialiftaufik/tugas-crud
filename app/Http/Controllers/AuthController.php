<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $a)
    {
        $data = $a->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // untuk mengecek email dan password (hashed)
        if(Auth::attempt($data, $a->boolean('remember')))
        {
            $a->session()->regenerate(); // mencegah session fixation
            return redirect()->intended('/mahasiswa');
        } else {
            return back()->withErrors([
                'email' => 'Email atau password salah.'
            ])->onlyInput('email');

        }
    }

    public function logout(Request $a)
    {
        Auth::logout();

        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('/viewLogin');
    }
}
