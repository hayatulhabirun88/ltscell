<?php

namespace App\Livewire\Pln;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PlnpascaPaidShow extends Component
{
    public function bayar()
    {
        $data = Session::get('data')['data'];

        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $data['tr_id']);

        // Data JSON yang akan dikirim
        $jsonData = [
            'commands' => 'pay-pasca',
            'username' => env('IAK_USERNAME'),
            'tr_id' => $data['tr_id'],
            'sign' => $sign
        ];

        // Melakukan permintaan POST dengan raw JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withBody(json_encode($jsonData), 'application/json')
            ->post(env('IAK_URL_POSTPAID'));

        try {
            if ($response->successful()) {
                // Mendapatkan data balance dari response JSON
                $data = $response->json();
                if ($data['data']['response_code'] == 00) {
                    Session::put('payment', $data);
                    return redirect()->route('plnpasca.paid-success');
                } else {
                    session()->flash('error', 'Cek Kembali Inputan Anda');
                }

            } else {
                session()->flash('error', 'Pembayaran anda gagal.');
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Pembayaran anda gagal.' . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.pln.plnpasca-paid-show');
    }
}
