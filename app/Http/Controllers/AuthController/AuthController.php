<?php

namespace App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Proyek\Proyek;
use App\Models\User;
use App\Models\Lembur\Lembur;
use App\Models\Pesan\Pesan;
use App\Models\Bagian\Bagians;
use App\Models\level\Level;
use App\Models\status\Statuses;

class AuthController
{
    /**
     * ==============================
     *  AUTHENTICATION
     * ==============================
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
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

    public function showRegis()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    /**
     * ==============================
     *  DASHBOARD
     * ==============================
     */
    public function index()
    {
        $totalProyek = Proyek::count();
        $totalUser   = User::count();
        $totalLembur = Lembur::count();
        $totalPesan  = Pesan::count();

        // Ambil 3 pesan terbaru
        $pesanTerbaru = Pesan::orderBy('tgl_pesan', 'desc')
                            ->take(3)
                            ->get();

        return view('dashboard.index', compact(
            'totalProyek',
            'totalUser',
            'totalLembur',
            'totalPesan',
            'pesanTerbaru'
        ));
    }

    public function dashboard()
    {
        return redirect()->route('dashboard'); 
    }

    /**
     * ==============================
     *  MASTER DATA
     * ==============================
     */
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

    /**
     * ==============================
     *  USER & PROFILE
     * ==============================
     */
    public function user()
    {
        return view('user.index');
    }

    public function userprofile()
    {
        return view('userprofile.index');
    }

    public function profile()
    {
        $user = Auth::user(); 
        $bagians = Bagians::all();
        $levels = Level::all();
        $statuses = Statuses::all();
        return view('profile.index', compact('user', 'bagians', 'statuses', 'levels'));
    }

    /**
     * ==============================
     *  AKTIVITAS & PROYEK
     * ==============================
     */
    public function aktivitas()
    {
        return view('aktivitas.index');
    }

    public function proyekuser()
    {
        return view('proyekuser.index');
    }

    public function lembur()
    {
        return view('lembur.index');
    }

    public function pesan()
    {
        return view('pesan.index');
    }

    public function jamkerjapertanggal()
    {
        return view('jamkerjapertanggal.index');
    }

    public function jamkerja()
    {
        return view('jamkerja.index');
    }
}
