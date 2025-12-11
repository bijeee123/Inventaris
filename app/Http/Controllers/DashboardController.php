<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // =======================
        // CARD 1: Barang Masuk Hari Ini
        // =======================
        $barangMasukHariIni = BarangMasuk::where('user_id', $userId)
            ->whereDate('tanggal_masuk', today())
            ->count();

        // =======================
        // CARD 2: Barang Keluar Hari Ini
        // =======================
        $barangKeluarHariIni = BarangKeluar::where('user_id', $userId)
            ->whereDate('tanggal_keluar', today())
            ->count();

        // =======================
        // CARD 3: Pemasukan Bulan Ini (ambil dari Barang Keluar)
        // =======================
        $pemasukanBulanIni = BarangKeluar::where('user_id', $userId)
            ->whereMonth('tanggal_keluar', now()->month)
            ->whereYear('tanggal_keluar', now()->year)
            ->selectRaw('SUM(jumlah_keluar * harga_keluar) as total')
            ->value('total') ?? 0;

        // =======================
        // CARD 4: Total Stok (Sisa Stok dari Barang Masuk - Barang Keluar)
        // =======================
        $stok = BarangMasuk::where('user_id', $userId)
            ->with('barangKeluar')
            ->get()
            ->map(function ($item) {
                $totalKeluar = $item->barangKeluar->sum('jumlah_keluar');
                return $item->jumlah - $totalKeluar;
            });

        $totalStok = $stok->sum();  // total unit stok

        // =======================
        // Aktivitas Terbaru (5 terakhir)
        // =======================
        $aktivitasMasuk = BarangMasuk::where('user_id', $userId)
            ->orderBy('tanggal_masuk', 'desc')
            ->limit(5)
            ->get();

        $aktivitasKeluar = BarangKeluar::where('user_id', $userId)
            ->orderBy('tanggal_keluar', 'desc')
            ->limit(5)
            ->get();

        // Gabungkan & urutkan berdasarkan tanggal
        $aktivitas = collect([]);

        foreach ($aktivitasMasuk as $bm) {
            $aktivitas->push([
                'jenis' => 'masuk',
                'nama_barang' => $bm->nama_barang,
                'tanggal' => $bm->tanggal_masuk,
            ]);
        }

        foreach ($aktivitasKeluar as $bk) {
            $aktivitas->push([
                'jenis' => 'keluar',
                'nama_barang' => $bk->nama_barang,
                'tanggal' => $bk->tanggal_keluar,
            ]);
        }

        // Sort terbaru
        $aktivitas = $aktivitas->sortByDesc('tanggal')->take(6);

        // =======================
        // Stok Menipis (sisa stok < 10)
        // =======================
        $stokMenipis = BarangMasuk::where('user_id', $userId)
            ->with('barangKeluar')
            ->get()
            ->filter(function ($item) {
                $keluar = $item->barangKeluar->sum('jumlah_keluar');
                $sisa = $item->jumlah - $keluar;
                return $sisa <= 10;  // threshold
            });

        return view('dashboard', compact(
            'barangMasukHariIni',
            'barangKeluarHariIni',
            'pemasukanBulanIni',
            'totalStok',
            'aktivitas',
            'stokMenipis'
        ));
    }
}
