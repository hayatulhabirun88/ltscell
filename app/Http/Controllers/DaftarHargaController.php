<?php

namespace App\Http\Controllers;

use App\Models\Prepaid;
use Illuminate\Http\Request;

class DaftarHargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('daftar_harga.daftar_harga');
    }

    public function show($id)
    {
        $prepaid = Prepaid::findOrFail($id);
        return view('daftar_harga.detail', compact(['prepaid']));
    }
}
