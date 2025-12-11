<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // ================== PEMASUKAN HARI INI ==================
        $pengeluaranHariIni = BarangMasuk::where('user_id', $userId)
            ->whereDate('tanggal_masuk', today())
            ->selectRaw('SUM(jumlah * harga) as total')
            ->value('total') ?? 0;

        // ================== PENGELUARAN BULAN INI ==================
        $pengeluaranBulanIni = BarangMasuk::where('user_id', $userId)
            ->whereMonth('tanggal_masuk', now()->month)
            ->whereYear('tanggal_masuk', now()->year)
            ->selectRaw('SUM(jumlah * harga) as total')
            ->value('total') ?? 0;

        // ================== PENGELUARAN BULAN KEMARIN ==================
        $bulanKemarin = now()->subMonth();

        $pengeluaranBulanKemarin = BarangMasuk::where('user_id', $userId)
            ->whereMonth('tanggal_masuk', $bulanKemarin->month)
            ->whereYear('tanggal_masuk', $bulanKemarin->year)
            ->selectRaw('SUM(jumlah * harga) as total')
            ->value('total') ?? 0;

        // ================== PERBANDINGAN ==================
        $perbandingan = $pengeluaranBulanIni - $pengeluaranBulanKemarin;

        // ================== CHART HARIAN ==================
        $hariLabels = [];
        $pengeluaranHarian = [];

        $daysInMonth = now()->daysInMonth;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $tanggal = now()->format("Y-m-") . str_pad($day, 2, '0', STR_PAD_LEFT);

            $totalHari = BarangMasuk::where('user_id', $userId)
                ->whereDate('tanggal_masuk', $tanggal)
                ->selectRaw('SUM(jumlah * harga) as total')
                ->value('total') ?? 0;

            $hariLabels[] = $day;
            $pengeluaranHarian[] = $totalHari;
        }

        return view('pengeluaran.index', compact(
            'pengeluaranHariIni',
            'pengeluaranBulanIni',
            'pengeluaranBulanKemarin',
            'perbandingan',
            'hariLabels',
            'pengeluaranHarian'
        ));
    }
}
