<?php

namespace App\Livewire\Pln;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PlnPasca extends Component
{
    public $id_pelanggan;
    public function cek_tagihan()
    {
        $this->validate([
            'id_pelanggan' => ['required', 'numeric'],
        ], [
            'id_pelanggan.required' => 'ID Pelanggan harus diisi.',
            'id_pelanggan.regex' => 'Format ID Pelanggan tidak valid.',
        ]);

        $ref_id = 'LTS-ORD' . time() . rand(1000000000, 9999999999);

        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $ref_id);

        // Data JSON yang akan dikirim
        $jsonData = [
            'commands' => 'inq-pasca',
            'username' => env('IAK_USERNAME'),
            'code' => 'PLNPOSTPAID',
            'hp' => $this->id_pelanggan,
            'ref_id' => $ref_id,
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
                    Session::put('data', $data);
                    return redirect()->route('plnpasca.paid');
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
        return view('livewire.pln.pln-pasca');
    }
}
