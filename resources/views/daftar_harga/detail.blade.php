@include('template.header')

<div class="header">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="{{ asset('/') }}tmp_mobile/#" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>{{ $prepaid->product_description }}</h3>
        </div>
    </div>
</div>
<div class="mt-5">
    <div class="tf-container">
        <img src="{{ $prepaid->icon_url }}" alt="">
        <div class="" style="padding;5px; margin-top:10px; margin-buttom:10px;">
            <div class="inner-left">
                <div class="content">
                    <h4>{{ $prepaid->product_description }} </h4>
                    <p>{{ $prepaid->product_nominal }}</p>
                </div>
            </div>
            <span class="num-val critical_color">Rp.
                {{ number_format($prepaid->product_price, 0, ',', '.') }}</span>
        </div>
    </div>
</div>
@include('template.footer_blank')
