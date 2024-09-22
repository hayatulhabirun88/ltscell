@include('template.header')

<div class="header">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="{{ asset('/') }}tmp_mobile/#" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Daftar Harga</h3>
        </div>
    </div>
</div>
<div class="mt-5">
    <div class="tf-container">
        @livewire('daftar-harga')
    </div>
</div>
@include('template.footer_blank')
