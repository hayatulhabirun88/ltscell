<div>
    <form wire:submit.prevent="cek_tagihan()">
        <div class="tf-form mt-7">
            <div class="group-input">
                <label>Masukan No BPJS anda</label>
                <input type="text" wire:model="no_bpjs">
                @error('no_bpjs')
                    <span class="text-danger" style="margin-left:15px;">{{ $message }}</span>
                @enderror
            </div>
            <div class="group-input">
                <label>Bulan</label>
                <select wire:model="bulan">
                    <option value="">--Pilih Bulan--</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                @error('bulan')
                    <span class="text-danger" style="margin-left:15px;">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="bottom-navigation-bar bottom-btn-fixed st2 ">
            <button type="submit" class="tf-btn accent large">Cek Tagihan</button>
        </div>
    </form>
</div>
