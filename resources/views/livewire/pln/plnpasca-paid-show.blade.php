<div>
    <form wire:submit.prevent="bayar()">
        <div class="tf-form mt-7">
            @php
                $data = Session::get('data')['data'];
            @endphp
            <div class="group-input">
                <label>Id Transaksi</label>
                <input type="text" value="{{ $data['tr_id'] }}" readonly>
            </div>
            <div class="group-input">
                <label>No Pelanggan</label>
                <input type="text" value="{{ $data['hp'] }}" readonly>
            </div>
            <div class="group-input">
                <label>Periode</label>
                <input type="text"
                    value="{{ DateTime::createFromFormat('Ym', $data['desc']['tagihan']['detail'][0]['periode'])->format('F Y') }}"
                    readonly>
            </div>
            <div class="group-input">
                <label>Nominal</label>
                <input type="text" value="{{ number_format($data['nominal']) }}" readonly>
            </div>
            <div class="group-input">
                <label>Biaya Admin</label>
                <input type="text" value="{{ number_format($data['desc']['tagihan']['detail'][0]['admin']) }}"
                    readonly>
            </div>
            <div class="group-input">
                <label>Total</label>
                <input type="text"
                    value="{{ number_format($data['price'] + \App\Models\Pengaturan::find(1)->mark_up) }}" readonly>
            </div>

        </div>
        <div class="bottom-navigation-bar bottom-btn-fixed st2 ">
            <button type="submit" class="tf-btn accent large">Bayar</button>
        </div>
    </form>
</div>
