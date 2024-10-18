<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>successful</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('/') }}tmp_mobile/images/logo.png" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('/') }}tmp_mobile/images/logo.png" />
    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('/') }}tmp_mobile/fonts/fonts.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}tmp_mobile/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{ asset('/') }}tmp_mobile/styles/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}tmp_mobile/styles/styles.css" />
    <link rel="manifest" href="{{ asset('/') }}tmp_mobile/_manifest.json"
        data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('/') }}tmp_mobile/app/icons/icon-192x192.png">
</head>

<body>
    <!-- preloade -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->

    <div class="wrap-success">


        <div class="success_box">
            <div class="icon-1 ani3">
                <span class="circle-box lg bg-circle check-icon"></span>
            </div>
            <div class="icon-2 ani5">
                <span class="circle-box md bg-circle"></span>
            </div>
            <div class="icon-3 ani8">
                <span class="circle-box md bg-circle"></span>
            </div>
            <div class="icon-4 ani2">
                <span class="circle-box sm bg-circle"></span>
            </div>


            <div class="content">
                <div class="top">
                    <h2>Berhasil!</h2>
                    <p class="fw_4">Pulsa dengan No HP. {{ $payment['customer_id'] }}</p>
                </div>
                <div class="tf-spacing-16"></div>
                <div class="inner">
                    <p class="on_surface_color fw_6">Sejumlah</p>
                    <h1>Rp. {{ number_format($payment['price']) }}</h1>
                </div>
                <div class="tf-spacing-16"></div>
                <div class="bottom">
                    <p class="on_surface_color fw_6">Status : {{ $payment['message'] }}</p>
                </div>

            </div>
            <a href="/dashboard" class="tf-btn accent large">Kembali</a>

        </div>

        <span class="line-through through-1"></span>
        <span class="line-through through-2"></span>
        <span class="line-through through-3"></span>
        <span class="line-through through-4"></span>
        <span class="line-through through-5"></span>
        <span class="line-through through-6"></span>

    </div>


    <script type="text/javascript" src="{{ asset('/') }}tmp_mobile/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}tmp_mobile/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}tmp_mobile/javascript/main.js"></script>

</body>

</html>
