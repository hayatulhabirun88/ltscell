<?php

namespace App\Livewire\Pln;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PlnprabayarPaidShow extends Component
{
    public $nominal;

    public function bayar()
    {

        $this->validate([
            'nominal' => 'required'
        ], [
            'nominal.required' => 'Nominal harus diisi.',
        ]);

        $ref_id = 'LTS-ORD' . time() . rand(1000000000, 9999999999);

        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $ref_id);

        // Data JSON yang akan dikirim
        $jsonData = [
            'username' => env('IAK_USERNAME'),
            "ref_id" => $ref_id,
            'customer_id' => Session::get('plnprabayar')['data']['customer_id'],
            'product_code' => $this->nominal,
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
                if (isset($data['data'])) {

                    Session::put('plnprabayar_paid', $data);

                    return redirect()->route('plnprabayar.paid-success');
                } else {
                    // Jika data tidak ditemukan di dalam respons
                    return redirect()->back()->withErrors(['error' => 'Data tidak ditemukan dalam respons.']);
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
        return view('livewire.pln.plnprabayar-paid-show');
    }
}
