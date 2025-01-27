@include('template.header')
<div class="header is-fixed">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="/dashboard" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Riwayat</h3>
        </div>
    </div>
</div>

<div id="app-wrap">

    <a href="/riwayat/download" style="margin-top:3px;" class="tf-btn accent large">Download Riwayat</a>
    <div class="app-section st1 mt-1 mb-5 bg_white_color">

        <div class="tf-container">
            @php
                $lastMonth = null; // Variabel untuk menyimpan bulan terakhir yang ditampilkan
            @endphp

            @foreach ($transaksi as $trx)
                @php
                    $currentMonth = $trx->created_at->translatedFormat('F'); // Ambil bulan transaksi saat ini
                    $produk = \App\Models\Prepaid::find($trx->prepaid_id);
                @endphp

                @if ($currentMonth !== $lastMonth)
                    <div class="trading-month">
                        <h4 class="fw_5 mb-3">{{ $currentMonth }}</h4>
                    </div>
                    @php
                        $lastMonth = $currentMonth; // Update bulan terakhir dengan bulan transaksi saat ini
                    @endphp
                @endif

                <div class="group-trading-history mb-5">
                    <a class="tf-trading-history" href="/riwayat-detail/{{ $trx->id }}">
                        <div class="inner-left">
                            <div class="icon-box rgba_primary">
                                <i class="icon icon-electricity-1"></i>
                            </div>
                            <div class="content">
                                <h4>{{ $produk->product_description }} {{ $produk->product_nominal }}</h4>
                                <p>62{{ $trx->customer_id }}</p>
                                <p>{{ $trx->created_at->format('Y-m-d H:i') }} WITA</p>
                            </div>
                        </div>
                        <span class="num-val critical_color">Rp.
                            {{ number_format($produk->product_price, 0, ',', '.') }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="mb-5">
</div>
@include('template.footer')
