<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PemasukanController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // ========== CARD: PEMASUKAN HARI INI ==========
        $today = BarangKeluar::whereDate('tanggal_keluar', today())
            ->where('user_id', $userId)
            ->selectRaw('SUM(jumlah_keluar * harga_keluar) as total')
            ->value('total') ?? 0;

        // ========== CARD: PEMASUKAN BULAN INI ==========
        $bulanIni = BarangKeluar::whereMonth('tanggal_keluar', now()->month)
            ->whereYear('tanggal_keluar', now()->year)
            ->where('user_id', $userId)
            ->selectRaw('SUM(jumlah_keluar * harga_keluar) as total')
            ->value('total') ?? 0;

        // ========== CARD: PEMASUKAN BULAN KEMARIN ==========
        $bulanKemarinDate = now()->subMonth();
        $bulanKemarin = BarangKeluar::whereMonth('tanggal_keluar', $bulanKemarinDate->month)
            ->whereYear('tanggal_keluar', $bulanKemarinDate->year)
            ->where('user_id', $userId)
            ->selectRaw('SUM(jumlah_keluar * harga_keluar) as total')
            ->value('total') ?? 0;

        // ========== CARD: KEUNTUNGAN BULAN INI ==========
        $keuntungan = BarangKeluar::with('barangMasuk')
            ->whereMonth('tanggal_keluar', now()->month)
            ->whereYear('tanggal_keluar', now()->year)
            ->where('user_id', $userId)
            ->get()
            ->sum(function ($item) {
                $modal = $item->jumlah_keluar * $item->barangMasuk->harga;
                $pendapatan = $item->jumlah_keluar * $item->harga_keluar;
                return $pendapatan - $modal;
            });

        // ========== GRAFIK PEMASUKAN HARIAN SELAMA BULAN INI ==========
        $hariLabels = [];
        $pendapatanHarian = [];

        $daysInMonth = now()->daysInMonth;

        for ($day = 1; $day <= $daysInMonth; $day++) {

            // Format tanggal YYYY-MM-DD
            $tanggal = now()->format("Y-m-") . str_pad($day, 2, '0', STR_PAD_LEFT);

            $totalHari = BarangKeluar::whereDate('tanggal_keluar', $tanggal)
                ->where('user_id', $userId)
                ->selectRaw('SUM(jumlah_keluar * harga_keluar) as total')
                ->value('total') ?? 0;

            $hariLabels[] = $day;
            $pendapatanHarian[] = $totalHari;
        }

        // ========== RETURN VIEW ==========
        return view('pemasukan.index', compact(
            'today',
            'bulanIni',
            'bulanKemarin',
            'keuntungan',
            'hariLabels',
            'pendapatanHarian'
        ));
    }


    // OPSIONAL
    public function totalBulanan()
    {
        $bulan = date('m');
        $tahun = date('Y');

        $total = BarangKeluar::whereMonth('tanggal_keluar', $bulan)
            ->whereYear('tanggal_keluar', $tahun)
            ->where('user_id', auth()->id())
            ->selectRaw('SUM(jumlah_keluar * harga_keluar) as total')
            ->value('total');

        return $total ?? 0;
    }
}
