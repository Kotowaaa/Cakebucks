<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class C_Login extends Controller
{
    public function halamanlogin()
    {
        return view('auth.pagelogin');
    }

    public function proseslogin(LoginRequest $request)
    {

        // Proses Login
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('succes','Login Sukses!');
        }

        return redirect('login')->with('alert', 'Login Failed!');

    }

    public function logout(Request $request)
    {
                // Proses Logout
                Auth::logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
        
                return redirect('/');
    }
}
