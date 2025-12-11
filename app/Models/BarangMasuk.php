<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangMasuk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang_masuk'; 

    protected $fillable = [
        'nama_barang',
        'kategori',
        'supplier',
        'jumlah',
        'harga',
        'tanggal_masuk',
        'user_id',
    ];
    
    protected $casts = [
        'tanggal_masuk' => 'datetime',
    ];

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'barang_masuk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
