<?php

namespace App\Livewire\Bpjs;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Bpjs extends Component
{
    public $no_bpjs;
    public $bulan;
    public function cek_tagihan()
    {
        $this->validate([
            'no_bpjs' => ['required', 'numeric'],
            'bulan' => ['required', 'numeric'],  // Pastikan bulan diisi dan valid (1-12)
        ], [
            'no_bpjs.required' => 'Nomor BPJS harus diisi.',
            'no_bpjs.regex' => 'Format Nomor BPJS tidak valid.',
            'bulan.required' => 'Bulan harus diisi.',
            'bulan.numeric' => 'Cek input bulan.',
        ]);

        $ref_id = 'LTS-ORD' . time() . rand(1000000000, 9999999999);

        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . $ref_id);

        // Data JSON yang akan dikirim
        $jsonData = [
            'commands' => 'inq-pasca',
            'code' => 'BPJS',
            'hp' => $this->no_bpjs,
            'ref_id' => $ref_id,
            'username' => env('IAK_USERNAME'),
            'month' => '10',
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

                Session::put('data', $data);

                return redirect()->route('bpjs.paid');

            } else {
                session()->flash('error', 'Pembayaran anda gagal.');
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Pembayaran anda gagal.' . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.bpjs.bpjs');
    }
}
