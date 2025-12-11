<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';

    protected $fillable = [
        'barang_masuk_id',
        'nama_barang',
        'kategori',
        'supplier',
        'jumlah_keluar',
        'harga_keluar',
        'tanggal_keluar',
        'user_id',
    ];

    protected $casts = [
        'tanggal_keluar' => 'datetime',
    ];

    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class);
    }

    public function getTotalHargaAttribute()
    {
        return $this->jumlah_keluar * $this->harga_keluar;
    }

}
