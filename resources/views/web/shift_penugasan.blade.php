@extends('web.template.content')
@section('title', 'Penugasan Karyawan')

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
                    Penugasan Karyawan
                </div>
                <div class="card-body">
                    <table style="margin-bottom:10px;">
                        <tr>
                            <td>Nama Karyawan</td>
                            <td>:</td>
                            <td>{{ $karyawan->name }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Handphone</td>
                            <td>:</td>
                            <td>{{ $karyawan->no_hp }}</td>
                        </tr>
                    </table>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Shift</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                $shiftHari = ['Shift 1', 'Shift 2', 'Shift 3'];
                            @endphp
                            @foreach ($hari as $hr)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" data-id="{{ $hr }}"
                                                {{ \App\Models\ShiftHari::where('user_id', $karyawan->id)->where('hari', $hr)->count() > 0 ? 'checked' : '' }} />
                                            <label class="form-check-label" for=""> {{ $hr }} </label>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($shift as $sh)
                                            @php
                                                // Check if the shift for the current day is assigned to the user
                                                $assignedShift = $assignedShifts[$hr] ?? null;
                                                $check =
                                                    $assignedShift && $assignedShift->shift_id == $sh->id
                                                        ? 'checked'
                                                        : '';
                                            @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="shift-{{ $hr }}" data-id="{{ $sh->id }}"
                                                    data-name="{{ $hr }}"
                                                    id="shift-{{ $sh->id }}-{{ $hr }}"
                                                    {{ $check }} />
                                                <label class="form-check-label"
                                                    for="shift-{{ $sh->id }}-{{ $hr }}">
                                                    {{ $sh->nama_shift }} | {{ $sh->jam_masuk }} - {{ $sh->jam_pulang }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').change(function(e) {
                e.preventDefault();
                var dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: "{{ route('shift.ajax_penugasan') }}",
                    data: {
                        hari: dataId,
                        userId: {{ $karyawan->id }},
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {}
                });
            });

            $('input[type="radio"]').change(function(e) {
                e.preventDefault();
                var dataShiftId = $(this).data('id');
                var dataName = $(this).data('name');
                var dataId = {{ $karyawan->id }};

                $.ajax({
                    type: "POST",
                    url: "{{ route('shift.ajax_jam_penugasan') }}",
                    data: {
                        id: dataId,
                        hari: dataName,
                        shiftId: dataShiftId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });

            });

        });
    </script>
@endsection
