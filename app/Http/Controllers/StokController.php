<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Support\Facades\DB;
use App\Models\Stok;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\StokExport;
use Maatwebsite\Excel\Facades\Excel;

class StokController extends Controller
{
    // aturan stok sesuai kategori
    protected $stokRules = [
        'makanan ringan' => [
            'normal' => 20,
            'menipis' => 12,
        ],
        'makanan berat' => [
            'normal' => 15,
            'menipis' => 8,
        ],
        'minuman' => [
            'normal' => 25,
            'menipis' => 12,
        ],
        'buah buahan' => [
            'normal' => 30,
            'menipis' => 15,
        ],
        'sayuran' => [
            'normal' => 20,
            'menipis' => 10,
        ],
        'lain lain' => [
            'normal' => 10,
            'menipis' => 5,
        ],
    ];


    public function cekLevelStok($kategori, $jumlah)
    {
        $kategori = strtolower($kategori);

        // kategori tidak ada? pakai default aman
        $rules = $this->stokRules[$kategori] ?? [
            'normal' => 20,
            'menipis' => 10,
        ];

        if ($jumlah >= $rules['normal']) {
            return 'normal';
        } elseif ($jumlah >= $rules['menipis']) {
            return 'menipis';
        } else {
            return 'hampir_habis';
        }
    }

    // halaman stok barang
    public function index(Request $request)
    {
        $query = BarangMasuk::where('user_id', auth()->id())
            ->with('barangKeluar');

        // fitur search
        if ($request->search) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();

        // hitung stok + level
        foreach ($data as $d) {
            $d->total_keluar = $d->barangKeluar->sum('jumlah_keluar');
            $d->sisa_stok = $d->jumlah - $d->total_keluar;
            $d->level = $this->cekLevelStok($d->kategori, $d->sisa_stok);
        }

        // card summary
        $totalItem = $data->count();
        $stokNormal = $data->where('level', 'normal')->count();
        $stokMenipis = $data->where('level', 'menipis')->count();
        $stokHampirHabis = $data->where('level', 'hampir_habis')->count();

        return view('stok_barang.index', compact(
            'data',
            'totalItem',
            'stokNormal',
            'stokMenipis',
            'stokHampirHabis'
        ));
    }

    public function exportPdf()
    {
        // Ambil data stok sama seperti index
        $data = BarangMasuk::where('user_id', auth()->id())
            ->with('barangKeluar')
            ->get();

        foreach ($data as $d) {
            $d->total_keluar = $d->barangKeluar->sum('jumlah_keluar');
            $d->sisa_stok = $d->jumlah - $d->total_keluar;
            $d->level = $this->cekLevelStok($d->kategori, $d->sisa_stok);
        }

        // load ke pdf
        $pdf = Pdf::loadView('stok_barang.pdf', compact('data'));

        return $pdf->download('stok_barang.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new StokExport, 'stok_barang.xlsx');
    }


    public function destroy($id)
    {
        $barang = BarangMasuk::where('user_id', auth()->id())->findOrFail($id);
        $barang->delete(); // soft delete

        return redirect()->route('stok.index')->with('success', 'Data berhasil dipindahkan ke sampah.');
    }

    public function trash()
    {
        $sampah = BarangMasuk::onlyTrashed()
            ->where('user_id', auth()->id())
            ->get();

        return view('stok_barang.trash', compact('sampah'));
    }

    public function restore($id)
    {
        $barang = BarangMasuk::onlyTrashed()
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $barang->restore();

        return redirect()->route('stok.index')->with('success', 'Data berhasil dikembalikan.');
    }

    public function forceDelete($id)
    {
        $barang = BarangMasuk::onlyTrashed()
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        // hapus permanen
        $barang->forceDelete();

        return redirect()->route('stok.trash')->with('success', 'Data dihapus permanen.');
    }
}
