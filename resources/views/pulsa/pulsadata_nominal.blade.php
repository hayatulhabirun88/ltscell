@include('template.header')

<div class="header">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="{{ asset('/') }}tmp_mobile/#" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Pilih Paket Data</h3>
        </div>
    </div>
</div>
<div class="mt-5 mb-5">
    <div class="tf-container">
        @livewire('pulsa.pulsadata-pilih-nominal')
    </div>
</div>
<div class="mb-5">
</div>

@include('template.footer_blank')
