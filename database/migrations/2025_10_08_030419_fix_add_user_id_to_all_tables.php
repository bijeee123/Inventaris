<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        $tables = ['barang_masuk', 'barang_keluar']; // nanti bisa tambah 'pemasukan', 'pengeluaran', 'stok' dll

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                if (!Schema::hasColumn($table->getTable(), 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');

                }
            });
        }
    }

    public function down(): void
    {
        $tables = ['barang_masuk', 'barang_keluar'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                if (Schema::hasColumn($table->getTable(), 'user_id')) {
                    $table->dropForeign([$table->getTable() . '_user_id_foreign']);
                    $table->dropColumn('user_id');
                }
            });
        }
    }
};
