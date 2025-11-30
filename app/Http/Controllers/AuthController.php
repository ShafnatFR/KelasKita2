<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // FORM REGISTER
    public function registerForm()
    {
        return view('auth.register');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tb_users',
            'email' => 'required|email|unique:tb_users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'murid',
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
    }

    // FORM LOGIN
    public function loginForm()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if(Auth::user()->role === 'admin'){
                return redirect()->route('dashboardAdmin');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // DASHBOARD MURID
    public function dashboard()
    {
        return view('dashboard');
    }

    public function dashboardAdmin()
    {
        return view('admin.dashboardAdmin');
    }
}
