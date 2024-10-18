<div>
    <form wire:submit.prevent="bayar()">
        <div class="tf-form mt-7">
            @php
                $data = Session::get('plnprabayar')['data'];
                $listPln = \App\Models\Prepaid::where('product_description', 'pln')->get();
            @endphp
            <div class="group-input">
                <label>No Pelanggan</label>
                <input type="text" value="{{ $data['customer_id'] }}" readonly>
            </div>
            <div class="group-input">
                <label>No Meter</label>
                <input type="text" value="{{ $data['meter_no'] }}" readonly>
            </div>

            <div class="group-input">
                <label>Nama Pelanggan</label>
                <input type="text" value="{{ $data['name'] }}" readonly>
            </div>
            <div class="group-input">
                <label>Daya</label>
                <input type="text" value="{{ $data['segment_power'] }}" readonly>
            </div>
            <div class="group-input">
                <label>Nominal</label>
                <select name="nominal" id="nominal" wire:model="nominal">
                    <option value="">-- Pilih Nominal ---</option>
                    @foreach ($listPln as $item)
                        <option value="{{ $item->product_code }}">PLN {{ $item->product_nominal }}</option>
                    @endforeach
                </select>
                @error('nominal')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="bottom-navigation-bar bottom-btn-fixed st2 ">
            <button type="submit" class="tf-btn accent large">Bayar</button>
        </div>
    </form>
</div>
