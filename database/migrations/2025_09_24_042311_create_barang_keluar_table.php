<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
        $table->id();
        $table->foreignId('barang_masuk_id')->constrained('barang_masuk')->onDelete('cascade');
        $table->string('nama_barang');
        $table->string('kategori');
        $table->string('supplier');
        $table->integer('jumlah_keluar');
        $table->dateTime('tanggal_keluar');
        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
