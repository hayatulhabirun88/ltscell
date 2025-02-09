@extends('web.template.content')
@section('title', 'Laporan Pasca Bayar')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">@yield('title')</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Laporan Harian
                </div>
                <div class="card-body">
                    <form action="{{ route('web.laporan.proses_pascabayar') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="dari_tanggal">Dari Tanggal</label>
                                    <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="sampai_tanggal">Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal"
                                        required>
                                </div>
                            </div>

                        </div><br>
                        <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                    </form>
                </div>
            </div>

        </div>
    </main>
@endsection
