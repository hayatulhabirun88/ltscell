<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>home</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('/') }}tmp_mobile/images/logo.png" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('/') }}tmp_mobile/images/logo.png" />
    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('/') }}tmp_mobile/fonts/fonts.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}tmp_mobile/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{ asset('/') }}tmp_mobile/styles/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}tmp_mobile/styles/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}tmp_mobile/styles/styles.css" />
    <link rel="manifest" href="{{ asset('/') }}tmp_mobile/_manifest.json"
        data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('/') }}tmp_mobile/app/icons/icon-192x192.png">
</head>

<body>
    <!-- preloade -->
    <div class="preload preload-container">
        <div class="preload-logo"></div>
    </div>
    <!-- /preload -->
    <div class="app-header">
        <div class="tf-container">
            <div class="tf-topbar d-flex justify-content-between align-items-center"
                style="background-color:rgb(34, 130, 226)49, 138, 254)0, 158, 249) !important;">
                <a class="user-info d-flex justify-content-between align-items-center" href="69_profile.html">
                    <img src="{{ asset('/') }}user.png" alt="image">

                    <div class="content">
                        <h4 class="on_surface_color">{{ auth()->user()->name }}</h4>
                        <p class="on_surface_color fw_4" style=>{{ auth()->user()->email }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="card-secton">
        <div class="tf-container">
            <div class="tf-balance-box">
                <div class="balance">
                    <div class="row">
                        <div class="col-6 br-right">
                            <div class="inner-left">
                                <p>Saldo Anda</p>
                                <h3>Rp. {{ number_format($balance, 0, ',', '.') }}</h3>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="wallet-footer">
                    <ul class="d-flex justify-content-between align-items-center">
                        <li class="wallet-card-item"><a class="fw_6" href="29_topup.html">
                                <ul class="icon icon-topup">
                                    <li class="path1"></li>
                                    <li class="path2"></li>
                                    <li class="path3"></li>
                                    <li class="path4"></li>
                                </ul>
                                Top up
                            </a></li>
                        <li class="wallet-card-item"><a class="fw_6 btn-card-popup" href="#">
                                <ul class="icon icon-group-credit-card">
                                    <li class="path1"></li>
                                    <li class="path2"></li>
                                    <li class="path3"></li>
                                </ul>
                                Dompet
                            </a></li>
                        <li class="wallet-card-item"><a class="fw_6" href="40_qr-code.html">
                                <ul class="icon icon-my-qr">
                                    <li class="path1"></li>
                                    <li class="path2"></li>
                                    <li class="path3"></li>
                                    <li class="path4"></li>
                                    <li class="path5"></li>
                                    <li class="path6"></li>
                                    <li class="path7"></li>
                                </ul>
                                My QR
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    <div class="mt-5">
        <div class="tf-container">
            <div class="tf-title d-flex justify-content-between">
                <h3 class="fw_6">Layanan</h3>
            </div>
            <ul class="box-service mt-3">
                <li>
                    <a href="/pulsa">
                        <div class="icon-box bg_color_1">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_4355_17017)">
                                    <rect x="6.375" y="2" width="12" height="19" fill="white" />
                                    <path
                                        d="M17.7247 0H7.02484C6.13341 0 5.40381 0.728914 5.40381 1.62103V22.3783C5.40381 23.2704 6.13341 24 7.02484 24H17.7247C18.6161 24 19.3457 23.2718 19.3457 22.379V1.62103C19.3457 0.728914 18.6161 0 17.7247 0ZM10.6632 1.16846H14.0863C14.1947 1.16846 14.2824 1.25623 14.2824 1.36526C14.2824 1.4736 14.1947 1.56137 14.0863 1.56137H10.6632C10.5549 1.56137 10.4671 1.4736 10.4671 1.36526C10.4671 1.25623 10.5549 1.16846 10.6632 1.16846ZM12.3748 23.1895C11.927 23.1895 11.5643 22.8267 11.5643 22.3783C11.5643 21.9298 11.927 21.5678 12.3748 21.5678C12.8226 21.5678 13.1853 21.9298 13.1853 22.3783C13.1853 22.8267 12.8226 23.1895 12.3748 23.1895ZM18.2177 21H6.53181V2.57074H18.2177V21Z"
                                        fill="#283EB4" />
                                    <path
                                        d="M12.3749 6C13.9704 6 15.4719 6.6175 16.6019 7.7385C16.7979 7.9325 16.7994 8.2495 16.6049 8.445C16.5074 8.5435 16.3784 8.593 16.2499 8.593C16.1229 8.593 15.9954 8.5445 15.8979 8.448C14.9564 7.5145 13.7049 7 12.3749 7C11.0449 7 9.79344 7.5145 8.85194 8.4485C8.65644 8.643 8.33944 8.642 8.14494 8.4455C7.95044 8.2495 7.95194 7.9325 8.14794 7.7385C9.27794 6.6175 10.7794 6 12.3749 6Z"
                                        fill="#39A3F8" />
                                    <path
                                        d="M11.25 12.75H10C9.793 12.75 9.625 12.918 9.625 13.125C9.625 13.332 9.793 13.5 10 13.5H11.25C11.319 13.5 11.375 13.556 11.375 13.625V14.375H10C9.793 14.375 9.625 14.543 9.625 14.75C9.625 14.957 9.793 15.125 10 15.125H11.375V15.875C11.375 15.944 11.319 16 11.25 16H10C9.793 16 9.625 16.168 9.625 16.375C9.625 16.582 9.793 16.75 10 16.75H11.25C11.7325 16.75 12.125 16.3575 12.125 15.875V13.625C12.125 13.1425 11.7325 12.75 11.25 12.75Z"
                                        fill="#39A3F8" />
                                    <path
                                        d="M14.75 14.5H14C13.793 14.5 13.625 14.668 13.625 14.875C13.625 15.082 13.793 15.25 14 15.25H14.375V16H13.5C13.431 16 13.375 15.944 13.375 15.875V13.625C13.375 13.556 13.431 13.5 13.5 13.5H14.75C14.957 13.5 15.125 13.332 15.125 13.125C15.125 12.918 14.957 12.75 14.75 12.75H13.5C13.0175 12.75 12.625 13.1425 12.625 13.625V15.875C12.625 16.3575 13.0175 16.75 13.5 16.75H14.75C14.957 16.75 15.125 16.582 15.125 16.375V14.875C15.125 14.668 14.957 14.5 14.75 14.5Z"
                                        fill="#39A3F8" />
                                    <path
                                        d="M12.3751 7.89099C11.2896 7.89099 10.2671 8.31199 9.49706 9.07649C9.30106 9.27099 9.29956 9.58699 9.49406 9.78299C9.68906 9.97949 10.0051 9.98049 10.2011 9.78599C10.7831 9.20849 11.5551 8.89099 12.3751 8.89099C13.1951 8.89099 13.9671 9.20899 14.5491 9.78649C14.6466 9.88299 14.7736 9.93149 14.9011 9.93149C15.0296 9.93149 15.1586 9.88199 15.2561 9.78349C15.4506 9.58749 15.4491 9.27099 15.2531 9.07649C14.4831 8.31199 13.4606 7.89099 12.3751 7.89099Z"
                                        fill="#39A3F8" />
                                    <path
                                        d="M10.8429 10.4165C11.2489 10.0075 11.7929 9.78198 12.3749 9.78198C12.9569 9.78198 13.5009 10.0075 13.9069 10.416C14.1014 10.612 14.1004 10.9285 13.9044 11.123C13.8064 11.22 13.6794 11.2685 13.5519 11.2685C13.4234 11.2685 13.2949 11.2195 13.1974 11.121C12.7629 10.6835 11.9869 10.6835 11.5524 11.121C11.3579 11.3165 11.0414 11.318 10.8454 11.1235C10.6494 10.929 10.6484 10.6125 10.8429 10.4165Z"
                                        fill="#39A3F8" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_4355_17017">
                                        <rect width="24" height="24" fill="white"
                                            transform="translate(0.375)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        Pulsa
                    </a>
                </li>
                <li>
                    <a href="/internet">
                        <div class="icon-box bg_color_2">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_4355_17182)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.1251 3.44482C11.8537 3.44482 11.5823 3.44929 11.3754 3.45819C7.2762 3.6346 3.36945 5.25275 0.34614 8.02658C0.0409477 8.30659 0.0419856 8.78279 0.334879 9.07568L1.73847 10.4793C2.03137 10.7722 2.50495 10.7704 2.81312 10.4937C5.17879 8.36971 8.20079 7.11796 11.3755 6.94708C11.7891 6.92482 12.4612 6.92482 12.8748 6.94708C16.0495 7.11796 19.0716 8.36971 21.4372 10.4937C21.7454 10.7704 22.219 10.7722 22.5119 10.4793L23.9154 9.07568C24.2083 8.78279 24.2094 8.30659 23.9042 8.02658C20.8809 5.25275 16.9742 3.63459 12.8749 3.45819C12.668 3.44929 12.3966 3.44482 12.1251 3.44482ZM12.0831 10.4116L11.3339 10.4416C9.09872 10.6112 6.9762 11.4953 5.28166 12.9627C4.9686 13.2338 4.97027 13.7111 5.26316 14.004L6.66667 15.4076C6.95956 15.7005 7.43228 15.6967 7.75477 15.437C8.79066 14.603 10.0444 14.0826 11.3663 13.9378L12.1251 13.8964C14.1994 14.0799 15.4569 14.6008 16.4955 15.437C16.818 15.6967 17.2907 15.7005 17.5836 15.4076L18.9872 14.004C19.2801 13.7111 19.2817 13.2338 18.9686 12.9627C17.2632 11.4859 15.1247 10.6002 12.8745 10.4385C12.4614 10.4089 12.1063 10.4116 12.0831 10.4116ZM12.1251 17.3954C11.854 17.3954 11.5828 17.4175 11.3809 17.4616C10.9771 17.5499 10.5921 17.7094 10.2442 17.9325C9.89616 18.1556 9.89855 18.6394 10.1914 18.9323L11.5949 20.3357C11.7355 20.4763 11.9263 20.5553 12.1252 20.5553C12.3241 20.5553 12.5148 20.4763 12.6555 20.3357L14.0589 18.9323C14.3518 18.6394 14.3542 18.1556 14.0062 17.9325C13.6582 17.7094 13.2732 17.5499 12.8694 17.4616C12.6674 17.4175 12.3963 17.3954 12.1251 17.3954Z"
                                        fill="#1E90FF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.134 3.44482V6.93042C12.4023 6.93056 12.6702 6.93599 12.8746 6.94699C16.0493 7.11786 19.0714 8.36962 21.4371 10.4937C21.7453 10.7703 22.2189 10.7721 22.5118 10.4792L23.9153 9.07559C24.2082 8.7827 24.2093 8.3065 23.9041 8.02649C20.8808 5.25266 16.974 3.6345 12.8748 3.4581C12.6703 3.4493 12.4024 3.44492 12.134 3.44482ZM0.133981 8.39334C0.110813 8.49681 0.111064 8.60452 0.133981 8.70874V8.39334ZM12.134 10.4115V13.8971C14.2028 14.0814 15.4582 14.602 16.4954 15.437C16.8179 15.6966 17.2906 15.7004 17.5835 15.4075L18.9871 14.0039C19.28 13.711 19.2815 13.2337 18.9685 12.9626C17.2631 11.4858 15.1246 10.6001 12.8744 10.4384C12.5312 10.4138 12.2401 10.4116 12.134 10.4115ZM12.134 17.3955V20.5552C12.3298 20.5529 12.5169 20.474 12.6554 20.3356L14.0588 18.9322C14.3517 18.6393 14.3541 18.1556 14.0061 17.9324C13.6581 17.7093 13.273 17.5498 12.8692 17.4615C12.6695 17.4179 12.4021 17.396 12.134 17.3955Z"
                                        fill="#0584FF" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_4355_17182">
                                        <rect width="24" height="24" fill="white"
                                            transform="translate(0.125)" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        Internet
                    </a>
                </li>
                <li>
                    <a href="/pln">
                        <div class="icon-box bg_color_4">
                            <img src="{{ asset('/') }}logo/pln_pascabayar.jpg" alt="">
                        </div>
                        Pln Pasca Bayar
                    </a>
                </li>
                <li>
                    <a href="/pln">
                        <div class="icon-box bg_color_4">
                            <img src="{{ asset('/') }}logo/listrik-prabayar.jpg" alt="">
                        </div>
                        Pln Prabayar
                    </a>
                </li>
                <li>
                    <a href="/bpjs">
                        <div class="icon-box bg_color_1">
                            <img src="{{ asset('/') }}logo/bpjs.png" alt="">
                        </div>
                        Bpjs
                    </a>
                </li>
                <li>
                    <a href="/pulsa">
                        <div class="icon-box bg_color_1">
                            <img width="25" src="{{ asset('/') }}logo/paket_data.png" alt="">
                        </div>
                        Pulsa Data
                    </a>
                </li>
            </ul>
        </div>
    </div>


    @include('template.footer')
