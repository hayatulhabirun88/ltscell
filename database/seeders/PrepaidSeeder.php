<?php

namespace Database\Seeders;

use App\Models\Postpaid;
use App\Models\Prepaid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrepaidSeeder extends Seeder
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
            'status' => 'all',
            'username' => env('IAK_USERNAME'),
            'sign' => $sign
        ];

        // Melakukan permintaan POST dengan raw JSON
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->withBody(json_encode($jsonData), 'application/json')
            ->post(env('IAK_URL_PREPAID') . '/pricelist');

        try {
            foreach ($response->json()['data']['pricelist'] as $key => $value) {
                Prepaid::updateOrCreate(
                    [
                        'product_code' => $value['product_code'],
                    ],
                    [
                        'product_description' => $value['product_description'],
                        'product_nominal' => $value['product_nominal'],
                        'product_details' => $value['product_details'],
                        'product_price' => $value['product_price'],
                        'product_type' => $value['product_type'],
                        'active_period' => $value['active_period'],
                        'status' => $value['status'],
                        'icon_url' => $value['icon_url'],
                        'product_category' => $value['product_category'],
                    ]
                );
            }

        } catch (\Throwable $th) {
            print_r($th->getMessage());
        }
    }
}
