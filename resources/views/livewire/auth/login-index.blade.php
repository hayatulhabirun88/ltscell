<div class="mt-7 login-section">
    <div style="margin: 0 auto; text-align: center;">
        <h2>LTS CELL</h2><BR>
        <img style="width: 150px;" src="{{ asset('/') }}icon.png" alt=""><br><br>
        <h5>Silahkan masukan no hp dan password anda</h5><br><br>
    </div>
    <div class="tf-container">
        <form class="tf-form mt-5">
            <div class="group-input">
                <label>No HP</label>
                <input type="text" placeholder="081122334455" wire:model="no_hp">
                @error('no_hp')
                    <span style="color: red; margin-left:15px;">{{ $message }}</span>
                @enderror
            </div>
            <div class="group-input auth-pass-input last">
                <label>Password</label>
                <input type="password" class="password-input" placeholder="Password" wire:model="password">
                @error('password')
                    <span style="color: red; margin-left:15px;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="tf-btn accent large" wire:click.prevent="login()">Log In</button>

        </form>
    </div>
</div>
