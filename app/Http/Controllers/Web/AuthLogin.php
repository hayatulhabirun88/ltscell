<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthLogin extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('web.dashboard'); // Halaman setelah login berhasil
        }
        return view('web.auth.login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'no_hp' => 'required|numeric|regex:/^08[1-9][0-9]{6,10}$/',
            'password' => 'required',
        ], [
            'no_hp.required' => 'Nomor handphone wajib diisi.',
            'no_hp.numeric' => 'Nomor handphone harus berupa angka.',
            'no_hp.regex' => 'Nomor handphone harus dimulai dengan 08 dan terdiri dari 8 hingga 12 digit.',
            'no_hp.unique' => 'Nomor handphone sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
        ]);

        $key = 'login:' . $request->no_hp;

        // Membatasi percobaan login
        if (RateLimiter::tooManyAttempts($key, 10)) {
            return back()->withErrors(['no_hp' => 'Terlalu banyak percobaan login. Coba lagi setelah beberapa menit.']);
        }

        // Cek autentikasi
        if (Auth::attempt(['no_hp' => $request->no_hp, 'password' => $request->password])) {

            if (Auth::user()->level != 'admin') {
                // Jika level bukan 'admin', logout dan beri pesan error
                Auth::logout();
                return back()->withErrors(['no_hp' => 'Anda tidak memiliki akses admin']);
            }

            return redirect()->intended('/web/dashboard'); // Halaman setelah login berhasil
        }

        // Jika login gagal, increment percobaan
        RateLimiter::hit($key, 300); // Menambahkan percobaan login dengan durasi 60 detik

        return back()->withErrors(['no_hp' => 'Nomor HP atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('web.auth.login');
    }
}
