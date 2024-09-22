<?php

namespace Database\Seeders;

use App\Models\Postpaid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostpaidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat sign dengan md5 (gabungan username, API key, dan tambahan 'bl')
        $sign = md5(env('IAK_USERNAME') . env('IAK_API_KEY') . 'pl');

        // Data JSON yang akan dikirim
        $jsonData = [
            'commands' => 'pricelist-pasca',
            'status' => 'all',
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
            foreach ($response->json()['data']['pasca'] as $key => $value) {
                Postpaid::updateOrCreate(
                    [
                        'code' => $value['code'],
                    ],
                    [
                        'name' => $value['name'],
                        'status' => $value['status'],
                        'fee' => $value['fee'],
                        'komisi' => $value['komisi'],
                        'type' => $value['type'],
                        'category' => $value['category'],

                    ]
                );
            }

        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }
}
