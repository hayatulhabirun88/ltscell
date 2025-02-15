<?php

namespace App\Http\Controllers\Web;

use App\Models\Shift;
use App\Models\ShiftHari;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('web.karyawan', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.tambah_karyawan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'numeric', 'regex:/^08[1-9][0-9]{6,10}$/', 'unique:users,no_hp'],
            'level' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'nama.required' => 'Nama karyawan wajib diisi.',
            'nama.string' => 'Nama karyawan harus berupa teks.',
            'nama.max' => 'Nama karyawan tidak boleh lebih dari 255 karakter.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.numeric' => 'Nomor HP harus berupa angka.',
            'no_hp.regex' => 'Nomor HP tidak valid. Harus diawali dengan 08 dan terdiri dari 8-12 digit.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar.',
            'level.required' => 'Level wajib diisi.',
            'level.string' => 'Level harus berupa teks.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
        ]);

        User::create([
            'name' => $request->nama,
            'no_hp' => $request->no_hp,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('web.edit_karyawan', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'numeric', 'regex:/^08[1-9][0-9]{6,10}$/', 'unique:users,no_hp,' . $id],
            'level' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:8'],  // password hanya valid jika diisi
        ], [
            'nama.required' => 'Nama karyawan wajib diisi.',
            'nama.string' => 'Nama karyawan harus berupa teks.',
            'nama.max' => 'Nama karyawan tidak boleh lebih dari 255 karakter.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.numeric' => 'Nomor HP harus berupa angka.',
            'no_hp.regex' => 'Nomor HP tidak valid. Harus diawali dengan 08 dan terdiri dari 8-12 digit.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar.',
            'level.required' => 'Level wajib diisi.',
            'level.string' => 'Level harus berupa teks.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
        ]);

        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->update([
            'name' => $request->nama,
            'no_hp' => $request->no_hp,
            'level' => $request->level,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Jika password tidak diisi, tetap gunakan password lama
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }

    public function penugasan(string $id)
    {

        $shift = Shift::all();
        $karyawan = User::findOrFail($id);

        // Fetch all shifts assigned to the karyawan (user) in one go
        $assignedShifts = \App\Models\ShiftHari::where('user_id', $karyawan->id)
            ->get()
            ->keyBy('hari'); // Index by 'hari' to optimize lookup

        return view('web.shift_penugasan', compact(['shift', 'karyawan', 'assignedShifts']));
    }

    public function ajax_penugasan(Request $request)
    {

        $request->validate([
            'hari' => 'required',
            'userId' => 'required'
        ]);

        $shifthari = ShiftHari::where('hari', $request->hari)->where('user_id', $request->userId);
        if ($shifthari->exists()) {
            $shifthari->delete();
        } else {
            ShiftHari::updateOrCreate(
                [
                    'hari' => $request->hari,
                    'user_id' => $request->userId,
                ],
                [
                    'shift_id' => 0
                ]
            );
        }

        $data = [
            'hari' => $request->hari,
            'userId' => $request->userId,
        ];

        return response()->json([
            'status' => 'true',
            'message' => 'Data berhasil di proses',
            'data' => $data,
        ]);
    }

    public function ajax_jam_penugasan(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'hari' => 'required',
            'shiftId' => 'required',
        ]);

        $shifthari = ShiftHari::where('hari', $request->hari)->where('user_id', $request->id);
        if ($shifthari->count() > 0) {
            $shifthari->first()->update([
                'shift_id' => $request->shiftId
            ]);
        } else {
            return response()->json([
                'error' => $request->all()
            ]);
        }

        $data = [
            'hari' => $request->hari,
            'userId' => $request->id,
        ];

        return response()->json([
            'status' => 'true',
            'message' => 'Data berhasil di proses',
            'data' => $data,
        ]);
    }
}
