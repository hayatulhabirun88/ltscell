<?php

namespace App\Http\Controllers\web;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Wdashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Cek level pengguna
        if (auth()->check() && auth()->user()->level != 'admin') {
            // Jika bukan admin, arahkan ke halaman login
            return redirect()->route('web.auth.login'); // Atau bisa menggunakan redirect()->route() jika diinginkan
        }
    }
    public function index()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        return view('web.dashboard', compact(['transaksi']));
    }
}
