<?php

namespace App\Http\Controllers\Web;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class Laporan extends Controller
{
    public function prabayar()
    {
        return view('web.laporan.prabayar');
    }
    public function pascabayar()
    {
        return view('web.laporan.pascabayar');
    }

    public function proses_prabayar(Request $request)
    {
        $request->validate([
            'dari_tanggal' => 'required|date',
            'sampai_tanggal' => 'required|date',
        ]);

        $dariTanggal = $request->input('dari_tanggal');
        $sampaiTanggal = $request->input('sampai_tanggal');


        $transaksi = Transaksi::whereBetween('created_at', [$dariTanggal, $sampaiTanggal])->latest()->get();

        $pdf = Pdf::loadView('web.laporan.cetak_prabayar', compact('transaksi'));
        return $pdf->download('laporan_prabayar.pdf');
    }
    public function proses_pascabayar(Request $request)
    {
        $request->validate([
            'dari_tanggal' => 'required|date',
            'sampai_tanggal' => 'required|date',
        ]);

        $dariTanggal = $request->input('dari_tanggal');
        $sampaiTanggal = $request->input('sampai_tanggal');


        $transaksi = Transaksi::whereBetween('created_at', [$dariTanggal, $sampaiTanggal])->latest()->get();

        $pdf = Pdf::loadView('web.laporan.cetak_pascabayar', compact('transaksi'));
        return $pdf->download('laporan_pascabayar.pdf');
    }
}
