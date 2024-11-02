<?php

namespace App\Livewire\Internet;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Indihome extends Component
{
    public $no_internet;
    public $resultInternet = [];
    public function cek_tagihan()
    {
        $this->validate([
            'no_internet' => ['required', 'numeric'],
        ], [
            'no_internet.required' => 'Akun pelanggan harus diisi.',
            'no_internet.regex' => 'Format Akun pelanggan tidak valid.',
        ]);

        $ref_id = 'LTS-ORD' . time() . rand(1000000000, 9999999999);

        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $ref_id);

        // Data JSON yang akan dikirim
        $jsonData = [
            'commands' => 'inq-pasca',
            'code' => 'TELKOMPSTN',
            'hp' => $this->no_internet,
            'ref_id' => $ref_id,
            'username' => env('IAK_USERNAME'),
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

                    return redirect()->route('internet.paid');
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
        return view('livewire.internet.indihome');
    }
}
