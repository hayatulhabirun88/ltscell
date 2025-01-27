<div>
    <div class="content">
        @php
            if (@$payment['sn']) {
                $detail = explode('/', $payment['sn']);
            }
        @endphp
        <div class="top">
            <h2>{{ $payment['message'] }}!</h2>
            <p class="fw_4">ID Pelanggan : {{ $payment['customer_id'] }}</p>
        </div>
        <div class="tf-spacing-16"></div>
        <div class="inner">
            <p class="on_surface_color fw_6">Sejumlah</p>
            <h1>Rp. {{ number_format($payment['price'] + \App\Models\Pengaturan::find(1)->mark_up, 0, ',', '.') }}</h1>
        </div>
        <div class="tf-spacing-16"></div>
        <div class="bottom">
            <p class="on_surface_color fw_6">Detail</p>
            <p>Id Transaksi : {{ $payment['tr_id'] }}</p>
            <p>Nama Pelanggan : {{ Session::get('plnprabayar')['data']['name'] }}</p>

            <p>Nomo Token : {{ $detail[0] ?? '-' }}</p>
        </div>

    </div>
    <button class="tf-btn accent large" wire:click="cek_status()"
        style="background-color:white; color:purple; margin-bottom:12px;">Cek
        Status</button>
</div>
