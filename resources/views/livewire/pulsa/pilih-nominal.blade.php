<div>
    @foreach ($daftarHarga as $harga)
        <div class="" style="padding;5px; margin-top:10px; margin-buttom:10px;">
            <a class="tf-trading-history" href="/pulsa-view-transaksi/{{ $harga->id }}">
                <div class="inner-left">
                    <div class="icon-box rgba_primary">
                        <img src="{{ $harga->icon_url }}" alt="">
                    </div>
                    <div class="content">
                        <h4>{{ $harga->product_description }} </h4>
                        <p>{{ Str::limit($harga->product_nominal, 20) }}</p>
                    </div>
                </div>
                <span class="num-val critical_color">Rp.
                    {{ number_format($harga->product_price, 0, ',', '.') }}</span>
            </a>
        </div>
    @endforeach
</div>
