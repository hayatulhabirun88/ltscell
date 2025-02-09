<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Laporan Transaksi LTS Cell</title>
    <link href="{{ asset('/') }}web/css/styles.css" rel="stylesheet" />
    <script src="{{ asset('/') }}web/js/all.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Laporan Transaksi LTSCell</h3>
                                    <div class="text-center">
                                        <img src="{{ asset('/') }}icon.png" alt="" style="width: 200px;">
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form action="{{ route('web.auth.proses') }}" method="post">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="number"
                                                placeholder="08111111111" name="no_hp" value="{{ old('no_hp') }}" />
                                            <label for="inputEmail">Nomor Handphone</label>
                                            @error('no_hp')
                                                <span style="color:red; padding-left: 10px;">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" name="password" />
                                            <label for="inputPassword">Kata Sandi</label>
                                            @error('password')
                                                <span style="color:red; padding-left: 10px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <input type="submit" value="Masuk" class="btn btn-primary"
                                                style="width: 100%; padding: 10px; font-size: 16px;">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Umi Han Samal 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('/') }}web/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/') }}js/scripts.js"></script>
</body>

</html>
