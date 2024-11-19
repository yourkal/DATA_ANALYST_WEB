<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Periksa id user
            if ($user->id == 2) {
                return redirect('/analist');
            } else {
                return redirect()->intended('/analists/dashboard');
            }
        }
    
        return back()->withErrors([
            'loginError' => 'Username atau password salah.',
        ]);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
