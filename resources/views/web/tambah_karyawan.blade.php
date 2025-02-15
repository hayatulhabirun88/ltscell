@extends('web.template.content')
@section('title', 'Tambah Data Karyawan')

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
                    Tambah Karyawan
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->flash('success') }}</div>
                    @endif
                    <form action="{{ route('karyawan.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ old('nama') }}" placeholder="Masukan nama lengkap" />
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor Handphone</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp"
                                value="{{ old('no_hp') }}" placeholder="Masukan Nomor Handphone" />
                            @error('no_hp')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option value="">-- Pilih Level --</option>
                                <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('level')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" id="password"
                                value="{{ old('password') }}" placeholder="Masukan Kata Sandi" />
                            @error('password')
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
