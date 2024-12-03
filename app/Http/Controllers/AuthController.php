<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class AuthController extends Controller
{


    public function index()
    {
        $pengaduans = Pengaduan::all(); // Mengambil semua data pengaduan dari database
        return view('laporkan', compact('pengaduans')); // Mengirim data ke view
    }
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');  // Pastikan sudah ada halaman login
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial dan login
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/dashboard');  // Redirect ke halaman dashboard setelah login
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');  // Redirect kembali ke halaman login setelah logout
    }
}
