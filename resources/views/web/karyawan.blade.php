@extends('web.template.content')
@section('title', 'Daftar Karyawan')

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
                    Daftar Karyawan
                    <a href="/web/karyawan/create" class="btn btn-sm btn-primary float-end">Tambah</a>
                </div>
                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Level</th>
                                <th>Shift</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->no_hp }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td><a href="{{ route('shift.penugasan', $user->id) }}"
                                            class="btn btn-sm btn-success">Tugaskan</a></td>
                                    <td><a href="{{ route('karyawan.edit', $user->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('karyawan.destroy', $user->id) }}" class="d-inline-block"
                                            method="post" id="deleteForm{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                        <script>
                                            document.getElementById('deleteForm{{ $user->id }}').addEventListener('submit', function(e) {
                                                e.preventDefault(); // Mencegah form submit langsung

                                                Swal.fire({
                                                    title: 'Apakah Anda yakin?',
                                                    text: "Data ini akan dihapus permanen!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Ya, hapus!',
                                                    cancelButtonText: 'Batal'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Jika diklik 'Ya, hapus!', form akan disubmit
                                                        e.target.submit();
                                                    }
                                                });
                                            });
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>

        </div>
    </main>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500 // Timer 1.5 detik sebelum swal menghilang
            });
        </script>
    @endif

@endsection
