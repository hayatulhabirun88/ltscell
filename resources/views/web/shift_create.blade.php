@extends('web.template.content')
@section('title', 'Tambah Data Shift')

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
                    Tambah Shift
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->flash('success') }}</div>
                    @endif
                    <form action="{{ route('shift.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_shift" class="form-label"> Shift</label>
                            <input type="text" class="form-control" name="nama_shift" id="nama_shift"
                                value="{{ old('nama_shift') }}" placeholder="Masukan Nama Shift" />
                            @error('nama_shift')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jam_masuk" class="form-label">Jam Masuk</label>
                            <input type="time" class="form-control" name="jam_masuk" id="jam_masuk"
                                value="{{ old('jam_masuk') }}" placeholder="Masukan Nomor Handphone" />
                            @error('jam_masuk')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jam_pulang" class="form-label">Jam Pulang</label>
                            <input type="time" class="form-control" name="jam_pulang" id="jam_pulang"
                                value="{{ old('jam_pulang') }}" placeholder="Masukan Nomor Handphone" />
                            @error('jam_pulang')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                    </form>
                </div>
            </div>

        </div>
    </main>
@endsection
