@extends('web.template.content')
@section('title', 'Dashboard')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">@yield('title')</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Laporan Harian
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Ref ID</th>
                                <th>Nama Produk</th>
                                <th>Kode Produk</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Waktu Transaksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($transaksi as $trans)
                                @php
                                    $nama_produk = \App\Models\Prepaid::find($trans->prepaid_id)->product_description;
                                @endphp
                                <tr>
                                    <td>{{ $trans->ref_id }}</td>
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
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Grafik Penjualan
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
