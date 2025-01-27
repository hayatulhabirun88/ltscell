<?php

namespace App\Livewire\Pln;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PlnprabayarCekstatus extends Component
{
    public function cek_status()
    {
        $ref_id = Session::get('plnprabayar_paid')['data']['ref_id'];
        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $ref_id);

        // Data JSON yang akan dikirim
        $jsonData = [
            'username' => env('IAK_USERNAME'),
            "ref_id" => $ref_id,
            'sign' => $sign
        ];

        // Melakukan permintaan POST dengan raw JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withBody(json_encode($jsonData), 'application/json')
            ->post(env('IAK_URL_PREPAID') . '/check-status');

        try {
            if ($response->successful()) {
                // Mendapatkan data balance dari response JSON
                $data = $response->json();
                // Periksa apakah 'data' ada dalam respons

                Session::put('plnprabayar_paid', $data);

                return redirect()->route('plnprabayar.paid-success');

            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            $balance = '-';
        }
    }
    public function render()
    {
        $payment = Session::get('plnprabayar_paid')['data'];
        return view('livewire.pln.plnprabayar-cekstatus', compact(['payment']));
    }
}
