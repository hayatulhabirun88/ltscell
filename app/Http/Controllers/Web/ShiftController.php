<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shift = Shift::latest()->paginate(10);
        return view('web.shift', compact(['shift']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.shift_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_shift' => ['required', 'string', 'max:255'],
            'jam_masuk' => ['required', 'date_format:H:i'],
            'jam_pulang' => ['required', 'date_format:H:i'],
        ], [
            'nama_shift.required' => 'Nama shift wajib diisi.',
            'nama_shift.string' => 'Nama shift harus berupa teks.',
            'nama_shift.max' => 'Nama shift tidak boleh lebih dari 255 karakter.',
            'jam_masuk.required' => 'Jam masuk wajib diisi.',
            'jam_masuk.date_format' => 'Jam masuk harus dalam format HH:mm.',
            'jam_pulang.required' => 'Jam pulang wajib diisi.',
            'jam_pulang.date_format' => 'Jam pulang harus dalam format HH:mm.',
        ]);

        Shift::create([
            'nama_shift' => $request->nama_shift,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
        ]);

        return redirect()->route('shift.index')->with('success', 'Data shift berhasil ditambahkan.');
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
        $shift = Shift::findOrFail($id);
        return view('web.shift_edit', compact(['shift']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_shift' => ['required', 'string', 'max:255'],
            'jam_masuk' => ['required', 'date_format:H:i'],
            'jam_pulang' => ['required', 'date_format:H:i'],
        ], [
            'nama_shift.required' => 'Nama shift wajib diisi.',
            'nama_shift.string' => 'Nama shift harus berupa teks.',
            'nama_shift.max' => 'Nama shift tidak boleh lebih dari 255 karakter.',
            'jam_masuk.required' => 'Jam masuk wajib diisi.',
            'jam_masuk.date_format' => 'Jam masuk harus dalam format HH:mm.',
            'jam_pulang.required' => 'Jam pulang wajib diisi.',
            'jam_pulang.date_format' => 'Jam pulang harus dalam format HH:mm.',
        ]);

        Shift::findOrFail($id)->update([
            'nama_shift' => $request->nama_shift,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
        ]);

        return redirect()->route('shift.index')->with('success', 'Data shift berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shift::findOrFail($id)->delete();
        return redirect()->route('shift.index')->with('success', 'Data shift berhasil dihapus.');
    }
}
