<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Penjualan Prabayar</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #4CAF50;
            margin-top: 20px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 14px;
        }

        td {
            background-color: #ffffff;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Footer Style */
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #777;
        }

        /* Print Styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            table {
                width: 100%;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            th,
            td {
                padding: 8px 10px;
                font-size: 12px;
            }

            .footer {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Laporan Transaksi Penjualan Prabayar</h1>

        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kode Produk</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Waktu Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $trans)
                    @php
                        $nama_produk = \App\Models\Prepaid::find($trans->prepaid_id)->product_description;
                    @endphp
                    <tr>
                        <td>{{ $nama_produk }}</td>
                        <td>{{ $trans->product_code }}</td>
                        <td>{{ $trans->price }}</td>
                        <td>{{ $trans->message }}</td>
                        <td>{{ $trans->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Generated on: {{ date('Y-m-d H:i:s') }}</p>
    </div>

</body>

</html>
