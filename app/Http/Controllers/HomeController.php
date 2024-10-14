<?php

namespace App\Http\Controllers;

use App\Models\Prepaid;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . 'bl');

        // Data JSON yang akan dikirim
        $jsonData = [
            'username' => env('IAK_USERNAME'),
            'sign' => $sign
        ];

        // Melakukan permintaan POST dengan raw JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withBody(json_encode($jsonData), 'application/json')
            ->post(env('IAK_URL_PREPAID') . '/check-balance');

        try {
            if ($response->successful()) {
                // Mendapatkan data balance dari response JSON
                $data = $response->json();
                $balance = $data['data']['balance'] ?? null;
            } else {
                $balance = '-';
            }
        } catch (\Throwable $th) {
            $balance = '-';
        }

        // Kembalikan view dengan data balance
        return view('home.dashboard', compact('balance'));
    }

    public function riwayat()
    {
        $transaksi = Transaksi::latest()->paginate(10);
        return view('riwayat.riwayat', compact(['transaksi']));
    }

    public function riwayat_show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('riwayat.detail', compact(['transaksi']));
    }
    public function profile()
    {
        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . 'bl');

        // Data JSON yang akan dikirim
        $jsonData = [
            'username' => env('IAK_USERNAME'),
            'sign' => $sign
        ];

        // Melakukan permintaan POST dengan raw JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withBody(json_encode($jsonData), 'application/json')
            ->post(env('IAK_URL_PREPAID') . '/check-balance');

        try {
            if ($response->successful()) {
                // Mendapatkan data balance dari response JSON
                $data = $response->json();
                $balance = $data['data']['balance'] ?? null;
            } else {
                $balance = '-';
            }
        } catch (\Throwable $th) {
            $balance = '-';
        }
        return view('profile.profile', compact(['balance']));
    }

}
