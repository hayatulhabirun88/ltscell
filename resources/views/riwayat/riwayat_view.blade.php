<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Riwayat</title>
    <style>
        .transaction {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: solid 1px black;
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .details {
            flex: 1;
        }

        .amount {
            text-align: right;
        }

        h4 {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h4>Riwayat Transaksi Pulsa</h4>
    @foreach ($transaksi as $trx)
        @php
            $produk = \App\Models\Prepaid::find($trx->prepaid_id);
        @endphp
        <div class="transaction">
            <div class="details">
                {{ $produk->product_description }} {{ $produk->product_nominal }} <br>
                62{{ $trx->customer_id }} <br>
                {{ $trx->created_at->format('Y-m-d H:i') }} WITA <br>
            </div>
            <div class="amount">
                Rp. {{ number_format($produk->product_price, 0, ',', '.') }}
            </div>
        </div>
    @endforeach

</body>

</html>
