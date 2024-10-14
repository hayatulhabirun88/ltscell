@include('template.header')
<div class="header is-fixed">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="/riwayat" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Detail Riwayat</h3>
        </div>
    </div>
</div>
<div id="app-wrap">
    <div class="bill-payment-content">
        <div class="tf-container">
            <div class="mt-3 bill-topbar">
                <i class="icon-wifi"></i>
                <h4 class="fw_6">{{ $transaksi->prepaid->product_description }}
                    {{ $transaksi->prepaid->product_nominal }}</h4>
            </div>
            <div class="wrapper-bill">
                <div class="archive-top">
                    <span class="circle-box lg bg-circle check-icon">

                    </span>
                    <h1><a href="#" class="success_color">
                            +62{{ $transaksi->customer_id }}</a></h1>
                    <h3 class="mt-2 fw_6">Sejumlah</h3>
                    <h1 class="mt-2 fw_6">Rp. {{ number_format($transaksi->prepaid->product_price, 0, ',', '.') }}</h1>
                </div>
                <div class="dashed-line"></div>
                <div class="archive-bottom">
                    <h2 class="text-center">Detail Informasi</h2>
                    <ul>
                        <li class="list-info-bill">Ref Id <span>{{ $transaksi->ref_id }}</span> </li>
                        <li class="list-info-bill">Kode Produk<span>{{ $transaksi->product_code }}</span> </li>
                        <li class="list-info-bill">Status Pengiriman <span>{{ $transaksi->message }}</span> </li>
                        <li class="list-info-bill">Serial Number <span
                                class="text-end">{{ $transaksi->sn ? $transaksi->sn : '-' }}</span>
                        </li>
                    </ul>
                </div>

            </div>


        </div>

    </div>
</div>
<div class="mb-5">
</div>
@include('template.footer')
