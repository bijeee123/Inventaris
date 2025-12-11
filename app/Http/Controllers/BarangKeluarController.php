<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Ambil semua barang keluar + relasi barang masuk
        $barangKeluar = BarangKeluar::where('user_id', $userId)
            ->with('barangMasuk')
            ->orderBy('tanggal_keluar', 'desc')
            ->get();

        // Hitung total transaksi keluar hari ini
        $keluarHariIni = BarangKeluar::where('user_id', $userId)
            ->whereDate('tanggal_keluar', today())
            ->count();

        return view('barang_keluar.index', compact('barangKeluar', 'keluarHariIni'));
    }



    public function create()
    {
        // Ambil barang masuk milik user
        $barangMasuk = BarangMasuk::where('user_id', auth()->id())->get();

        return view('barang_keluar.create', compact('barangMasuk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_masuk_id' => 'required|exists:barang_masuk,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'harga_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date'
        ]);

        $barang = BarangMasuk::where('id', $request->barang_masuk_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Hitung stok tersisa
        $total_keluar = $barang->barangKeluar->sum('jumlah_keluar');
        $sisa = $barang->jumlah - $total_keluar;

        if ($sisa < $request->jumlah_keluar) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        // SIMPAN BARANG KELUAR DENGAN HARGA KELUAR DARI INPUT
        BarangKeluar::create([
            'barang_masuk_id' => $barang->id,
            'nama_barang' => $barang->nama_barang,
            'kategori' => $barang->kategori,
            'supplier' => $barang->supplier,
            'jumlah_keluar' => $request->jumlah_keluar,
            'harga_keluar' => $request->harga_keluar,        // agar harga keluar tidak sama dengan harga masuk
            'tanggal_keluar' => $request->tanggal_keluar,    // agar tanggal keluar sesuai input
            'user_id' => auth()->id(),
        ]);

        // UPDATE STOK DI BARANG MASUK
        $barang->jumlah -= $request->jumlah_keluar;          // biar di crud barang keluar juga terupdate
        $barang->save();

        return redirect()->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil dicatat');
    }


}
