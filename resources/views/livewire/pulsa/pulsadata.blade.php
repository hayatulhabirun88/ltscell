<div>
    <form wire:submit.prevent="store()">
        <div class="tf-form mt-7">
            <div class="group-input">
                <label>Nomor Handphone</label>
                <input type="text" wire:model="no_hp">
                @error('no_hp')
                    <span class="text-danger" style="margin-left:15px;">{{ $message }}</span>
                @enderror
            </div>


        </div>
        <div class="bottom-navigation-bar bottom-btn-fixed st2 ">
            <button type="submit" class="tf-btn accent large">Next</button>
        </div>
    </form>
</div>
