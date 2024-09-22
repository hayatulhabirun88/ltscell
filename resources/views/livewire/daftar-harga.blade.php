<div>

    <div class="group-input">
        <select name="postprepaid" id="postprepaid" wire:model.live="postprepaid">
            <option value=""> Pilih Kategori</option>
            <option value="Prepaid">Prepaid</option>
            <option value="Postpaid">Postpaid</option>
        </select>
    </div>

    @if ($postprepaid == 'Prepaid')
        <div class="group-input">
            <select name="kategori" id="kategori" wire:model.live="kategori">
                <option value=""> Pilih Kategori</option>
                <option value="pulsa">Pulsa Reguler</option>
                <option value="data">Pulsa Data</option>
                <option value="pln">Token Listrik</option>
                <option value="bicara">Pulsa Telepon</option>
            </select>
        </div>


        @if ($kategori == 'pulsa' || $kategori == 'data' || $kategori == 'bicara')
            <div class="group-input">
                <select name="sub_kategori" id="sub_kategori" wire:model.live="subKategori">
                    <option value=""> Pilih Kategori</option>
                    <option value="Telkomsel">Telkomsel</option>
                    <option value="Indosat">Indosat</option>
                    <option value="Three">Three</option>
                    <option value="XL">XL</option>
                    <option value="by.U">by.U</option>
                    <option value="Smart">Smart</option>
                </select>
            </div>
        @endif

        <div class="tampilkan">
            @if (!empty($daftarHarga) and !empty($kategori))
                @foreach ($daftarHarga as $harga)
                    <div class="" style="padding;5px; margin-top:10px; margin-buttom:10px;">
                        <a class="tf-trading-history" href="/daftar-harga-prepaid/{{ $harga->id }}">
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
            @endif
        </div>
    @elseif ($postprepaid == 'Postpaid')
        <div class="group-input">
            <select name="kategori" id="kategori" wire:model.live="kategori">
                <option value=""> Pilih Kategori</option>
                <option value="bpjs">BPJS</option>
                <option value="internet">Internet</option>
                <option value="pln">PLN Pasca Bayar</option>
            </select>
        </div>

        <div class="tampilkan">
            @if (!empty($daftarHarga) and !empty($kategori))

                @foreach ($daftarHarga as $harga)
                    <div class="" style="padding;5px; margin-top:10px; margin-buttom:10px;">
                        <a class="tf-trading-history" href="/daftar-harga-prepaid/{{ $harga->id }}">
                            <div class="inner-left">
                                <div class="icon-box rgba_primary">
                                    <img src="{{ asset('/') }}pospaid.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4
                                        style="display: inline-block; max-width: 20ch; white-space: normal; word-wrap: break-word;">
                                        {{ $harga->name }}
                                    </h4>
                                    <p>{{ number_format($harga->fee) }}</p>
                                </div>
                            </div>
                            <span class="num-val critical_color">Rp.
                                {{ number_format($harga->komisi, 0, ',', '.') }}</span>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    @endif

</div>
