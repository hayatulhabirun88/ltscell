@extends('web.template.content')
@section('title', 'Daftar Shift')

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
                    Daftar Shift
                    <a href="/web/shift/create" class="btn btn-sm btn-primary float-end">Tambah</a>
                </div>
                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Shift</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shift as $sh)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sh->nama_shift }}</td>
                                    <td>{{ $sh->jam_masuk }}</td>
                                    <td>{{ $sh->jam_pulang }}</td>
                                    <td><a href="{{ route('shift.edit', $sh->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('shift.destroy', $sh->id) }}" class="d-inline-block"
                                            method="post" id="deleteForm{{ $sh->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                        <script>
                                            document.getElementById('deleteForm{{ $sh->id }}').addEventListener('submit', function(e) {
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
                    {{ $shift->links() }}
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
