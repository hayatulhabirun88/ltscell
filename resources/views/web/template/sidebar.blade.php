<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="/web/dashboard">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Master</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#karyawan"
                aria-expanded="false" aria-controls="karyawan">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Karyawan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="karyawan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/web/karyawan">Karyawan</a>
                    <a class="nav-link" href="/web/shift">Shift</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporan"
                aria-expanded="false" aria-controls="laporan">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Laporan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="laporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/web/prabayar">Prabayar</a>
                    <a class="nav-link" href="/web/pascabayar">Pascabayar</a>
                </nav>
            </div>
        </div>
    </div>
    {{-- <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
    </div> --}}
</nav>
