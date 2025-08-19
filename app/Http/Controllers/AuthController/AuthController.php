<?php

namespace App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    

    public function dashboard()
    {
        return view('dashboard.index');
    }
    
    public function bagian()
    {
        return view('bagian.index');
    }

    public function level()
    {
        return view('level.index');
    }

    public function status()
    {
        return view('status.index');
    }

     public function proyek()
    {
        return view('proyek.index');
    }

     public function mode()
    {
        return view('mode.index');
    }

     public function statusjam()
    {
        return view('statusjam.index');
    }

    public function jenispesan()
    {
        return view('jenispesan.index');
    }

    public function keterangan()
    {
        return view('keterangan.index');
    }

    public function showRegis() { 
return view ('auth.register');
    }

    public function user()
    {
        return view('user.index');
    }

     public function aktivitas()
    {
        return view('aktivitas.index');
    }

     public function userprofile()
    {
        return view('userprofile.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}