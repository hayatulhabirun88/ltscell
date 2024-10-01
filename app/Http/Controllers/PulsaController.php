<?php

namespace App\Http\Controllers;

use App\Models\Prepaid;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PulsaController extends Controller
{
    public function index()
    {
        return view('pulsa.reguler');
    }

    public function nominal()
    {
        return view('pulsa.nominal');
    }

    public function view_proses($id)
    {
        return view('pulsa.view_proses');
    }

    public function proses_transaksi(Request $request)
    {

        $request->validate([
            'id_prepaid' => 'required|numeric',
        ]);

        $prepaid = Prepaid::find($request->id_prepaid);

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
                $transaksi = Transaksi::create([
                    'name' => NULL,
                    'meter_no' => NULL,
                    'subscriber_id' => NULL,
                    'segment_power' => NULL,
                    'ref_id' => $data['data']['ref_id'],
                    'status' => $data['data']['status'],
                    'product_code' => $data['data']['product_code'],
                    'customer_id' => $data['data']['customer_id'],
                    'price' => $data['data']['price'],
                    'message' => $data['data']['message'],
                    'balance' => $data['data']['balance'],
                    'tr_id' => $data['data']['tr_id'],
                    'rc' => $data['data']['rc'],
                    'sn' => NULL,
                ]);

                return redirect()->route('pulsa.finish-proses', ['id' => $request->id_prepaid]);
            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            $balance = '-';
        }


        return redirect()->route('pulsa.view-transaksi-finish', ['id' => $request->transaction_id]);
    }

    public function finish_proses($id)
    {

    }
}
