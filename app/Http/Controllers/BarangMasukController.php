<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    // Tampilkan daftar barang masuk
    // user_id agar tiap akun datanya beda beda
    public function index()
    {
        // Ambil semua barang milik user yg login
        $barang = BarangMasuk::where('user_id', auth()->id())
            ->orderBy('tanggal_masuk', 'desc')
            ->get();

        foreach ($barang as $b) {
            $b->total_harga = $b->jumlah * $b->harga;
        }


        // Hitung barang masuk hari ini (reset otomatis tiap hari)
        $barangHariIni = BarangMasuk::where('user_id', auth()->id())
            ->whereDate('tanggal_masuk', today())
            ->count();

        return view('barang_masuk.index', [
            'barang' => $barang,
            'barangHariIni' => $barangHariIni,
        ]);
    }


    // Form tambah
    public function create()
    {
        return view('barang_masuk.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'supplier' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        $hargaBersih = str_replace(['.', ','], '', $request->harga);
        BarangMasuk::create([
            'nama_barang' => $request->nama_barang,
            'supplier' => $request->supplier,
            'jumlah' => $request->jumlah,
            'harga' => $hargaBersih,
            'kategori' => $request->kategori,
            'tanggal_masuk' => $request->tanggal_masuk,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('barang-masuk.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }
}
