<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StokExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BarangMasuk::where('user_id', Auth::id())
            ->select('id', 'nama_barang', 'supplier', 'tanggal_masuk', 'harga', 'jumlah')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Distributor',
            'Tanggal Masuk',
            'Harga',
            'Jumlah',
        ];
    }
}
