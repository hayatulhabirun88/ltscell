<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form wire:submit.prevent="cek_tagihan()">
        <div class="tf-form mt-7">
            <div class="group-input">
                <label>Masukan no akun internet / indihome anda</label>
                <input type="text" wire:model="no_internet">
                @error('no_internet')
                    <span class="text-danger" style="margin-left:15px;">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="bottom-navigation-bar bottom-btn-fixed st2 ">
            <button type="submit" class="tf-btn accent large">Cek Tagihan</button>
        </div>
    </form>
</div>
