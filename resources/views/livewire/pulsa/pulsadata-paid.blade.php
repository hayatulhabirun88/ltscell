<div class="tf-container">
    <form wire:submit.prevent="paid('{{ Request::segment(2) }}')">
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
