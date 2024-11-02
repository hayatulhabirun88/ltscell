<?php

namespace App\Livewire\PUlsa;

use App\Models\Prepaid;
use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PulsadataPaid extends Component
{
    public function paid($id)
    {

        $prepaid = Prepaid::find($id);
        $ref_id = 'LTS-ORD' . time() . rand(1000000000, 9999999999);

        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $ref_id);

        // Data JSON yang akan dikirim
        $jsonData = [
            'customer_id' => Session::get('no_hp'),
            'product_code' => $prepaid->product_code,
            'ref_id' => $ref_id,
            'username' => env('IAK_USERNAME'),
            'sign' => $sign
        ];


        // Melakukan permintaan POST dengan raw JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withBody(json_encode($jsonData), 'application/json')
            ->post(env('IAK_URL_PREPAID') . '/top-up');



        try {
            if ($response->successful()) {
                // Mendapatkan data balance dari response JSON
                $data = $response->json();
                // Periksa apakah 'data' ada dalam respons
                if ($data['data']['response_code'] == 00) {

                    Session::put('pulsadata_finish', $data);

                    return redirect()->route('pulsadata.paid-success');
                } else {
                    // Jika data tidak ditemukan di dalam respons
                    session()->flash('error', 'Cek kembali inputan anda');
                }
            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            $balance = '-';
        }
    }
    public function render()
    {
        return view('livewire.pulsa.pulsadata-paid');
    }
}
