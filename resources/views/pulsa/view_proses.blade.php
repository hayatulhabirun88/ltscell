@include('template.header')

<div class="header">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="{{ asset('/') }}tmp_mobile/#" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Proses Transaksi</h3>
        </div>
    </div>
</div>
<div class="mt-5 mb-5">
    <div class="tf-container">
        <form action="{{ route('pulsa.proses-transaksi') }}" method="POST">
            @csrf
            <div class="tf-form mt-7">
                <input type="hidden" name="id_prepaid" value="{{ Request::segment(2) }}">
                <div class="group-input">
                    <label>Nomor Handphone</label>
                    <input type="text" name="no_hp" value="{{ Session::get('no_hp') }}" disabled>
                </div>
                <div class="group-input">
                    <label>Provider</label>
                    <input type="text" name="no_hp" value="{{ Session::get('provider') }}" disabled>
                </div>
                <div class="group-input">
                    <label>Nominal</label>
                    <input type="text" name="no_hp"
                        value="{{ \App\Models\Prepaid::find(Request::segment(2))->product_nominal }}" disabled>
                </div>
                <div class="group-input">
                    <label>Harga</label>
                    <input type="text" name="no_hp"
                        value="Rp. {{ number_format(\App\Models\Prepaid::find(Request::segment(2))->product_price, 0, ',', '.') }}"
                        disabled>
                </div>
                <div class="group-input">
                    <label>Detail Produk</label>
                    <textarea name="" id="" cols="30" rows="3" disabled>{{ \App\Models\Prepaid::find(Request::segment(2))->product_details }}</textarea>
                </div>
            </div>
            <div class="bottom-navigation-bar bottom-btn-fixed st2 ">
                <button type="submit" class="tf-btn accent large">Proses</button>
            </div>
        </form>
    </div>
</div>
<div class="mb-5">
</div>

@include('template.footer_blank')
