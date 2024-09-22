@include('template.header')
<div class="header is-fixed">
    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="/dashboard" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Riwayat</h3>
        </div>
    </div>
</div>
<div id="app-wrap">
    <div class="app-section st1 mt-1 mb-5 bg_white_color">
        <div class="tf-container">
            <div class="trading-month">
                <h4 class="fw_5 mb-3">November</h4>
                <div class="group-trading-history mb-5">
                    <a class="tf-trading-history" href="61_filter-research.html">
                        <div class="inner-left">
                            <div class="icon-box rgba_primary">
                                <i class="icon icon-electricity-1"></i>
                            </div>
                            <div class="content">
                                <h4>Telkomsel 20000</h4>
                                <p>2024-09-23 14:23 WITA</p>
                            </div>
                        </div>
                        <span class="num-val critical_color">Rp. 20.000</span>
                    </a>


                </div>
            </div>
        </div>
    </div>
</div>

@include('template.footer')
