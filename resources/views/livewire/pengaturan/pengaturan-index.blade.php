<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <form wire:submit.prevent="updateMarkup()">
        <div class="tf-form mt-7">
            <div class="group-input">
                <label>Masukan Mark UP</label>
                <input type="text" wire:model="mark_up">
                @error('mark_up')
                    <span class="text-danger" style="margin-left:15px;">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="bottom-navigation-bar bottom-btn-fixed st2 ">
            <button type="submit" class="tf-btn accent large">Simpan Perubahan</button>
        </div>
    </form>
</div>
