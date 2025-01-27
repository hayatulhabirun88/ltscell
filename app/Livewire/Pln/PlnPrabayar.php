<?php

namespace App\Livewire\Pln;

use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PlnPrabayar extends Component
{
    public $id_pelanggan;
    public function cek_pelanggan()
    {
        $this->validate([
            'id_pelanggan' => 'required|numeric',
        ], [
            'id_pelanggan.required' => 'ID pelanggan harus diisi.',
            'id_pelanggan.numeric' => 'ID pelanggan harus berupa angka.',
        ]);

        $ref_id = 'LTS-ORD' . time() . rand(1000000000, 9999999999);

        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $this->id_pelanggan);

        // Data JSON yang akan dikirim
        $jsonData = [
            'customer_id' => $this->id_pelanggan,
            'username' => env('IAK_USERNAME'),
            'sign' => $sign
        ];



        // Melakukan permintaan POST dengan raw JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withBody(json_encode($jsonData), 'application/json')
            ->post(env('IAK_URL_PREPAID') . '/inquiry-pln');

        try {
            if ($response->successful()) {
                // Mendapatkan data balance dari response JSON
                $data = $response->json();
                // Periksa apakah 'data' ada dalam respons
                if ($data['data']['rc'] == 00) {

                    Session::put('plnprabayar', $data);

                    return redirect()->route('plnprabayar.paid');
                } else {
                    // Jika data tidak ditemukan di dalam respons
                    session()->flash('error', 'Cek Kembali Inputan Anda');
                }
            } else {
                session()->flash('error', 'Cek Kembali Inputan Anda');
            }
        } catch (\Throwable $th) {
            $balance = '-';
        }
    }
    public function render()
    {
        return view('livewire.pln.pln-prabayar');
    }
}
