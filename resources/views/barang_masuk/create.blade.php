@extends('layouts.app')

@section('title', 'Tambah Barang Masuk')

@section('content')
<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-100">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center">
                <i class="fas fa-box-archive text-blue-500 text-2xl mr-3"></i>
                <h1 class="text-2xl font-bold text-gray-700">Tambah Barang Masuk</h1>
            </div>
            <a href="{{ route('barang-masuk.index') }}" 
                class="text-sm text-gray-500 hover:text-blue-600 transition">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('barang-masuk.store') }}" class="space-y-6">
            @csrf

            <!-- Nama Barang -->
            <div>
                <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" 
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3" 
                        placeholder="Contoh: Roti Coklat" required>
            </div>
            
            <!-- Kategori -->
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select id="kategori" name="kategori" 
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Minuman">Minuman</option>
                    <option value="Buah-buahan">Buah-buahan</option>
                    <option value="Sayuran">Sayuran</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
            </div>

            <!-- Supplier -->
            <div>
                <label for="supplier" class="block text-sm font-medium text-gray-700 mb-2">Supplier</label>
                <input type="text" id="supplier" name="supplier" 
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3" 
                        placeholder="Contoh: PT Sumber Makmur" required>
            </div>

            <!-- Jumlah -->
            <div>
                <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah </label>
                <input type="number" id="jumlah" name="jumlah" 
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3" 
                        placeholder="Masukkan jumlah barang" required>
            </div>
            
            <!-- Harga -->
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                <input type="text" id="harga" name="harga"
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3"
                        placeholder="Harga satuan barang" required>
            </div>

            <!-- Tanggal Masuk -->
            <div>
                <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Masuk</label>
                <input type="datetime-local" id="tanggal_masuk" name="tanggal_masuk" 
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3" required>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('barang-masuk.index') }}" 
                    class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-100 transition font-medium">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-xl shadow transition">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
