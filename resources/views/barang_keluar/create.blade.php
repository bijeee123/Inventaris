@extends('layouts.app')

@section('title', 'Tambah Barang Keluar')

@section('content')
<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-100">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center">
                <i class="fas fa-dolly text-blue-500 text-2xl mr-3"></i>
                <h1 class="text-2xl font-bold text-gray-700">Tambah Barang Keluar</h1>
            </div>
            <a href="{{ route('barang-keluar.index') }}" 
                class="text-sm text-gray-500 hover:text-blue-600 transition">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('barang-keluar.store') }}" method="POST" class="space-y-6">
            @csrf


            <!-- Pilih Barang -->
            <div>
                <label for="barang_masuk_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Pilih Barang
                </label>
                <select id="barang_masuk_id" name="barang_masuk_id" required
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3">
                    <option value="" disabled selected>-- Pilih Barang --</option>
                    @foreach($barangMasuk as $bm)
                        <option value="{{ $bm->id }}">
                            {{ $bm->nama_barang }} (Stok: {{ $bm->jumlah }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Jumlah Keluar -->
            <div>
                <label for="jumlah_keluar" class="block text-sm font-medium text-gray-700 mb-2">
                    Jumlah Keluar
                </label>
                <input type="number" id="jumlah_keluar" name="jumlah_keluar" required
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3"
                        placeholder="Masukkan jumlah barang keluar">
            </div>

            <!-- Harga Keluar -->
            <div>
                <label for="harga_keluar" class="block text-sm font-medium text-gray-700 mb-2">
                    Harga Keluar
                </label>
                <input type="number" id="harga_keluar" name="harga_keluar" required
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3"
                        placeholder="Masukkan harga barang keluar">
            </div>

            <!-- Tanggal Keluar -->
            <div>
                <label for="tanggal_keluar" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggal Keluar
                </label>
                <input type="datetime-local" id="tanggal_keluar" name="tanggal_keluar" required
                        class="w-full border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-xl shadow-sm p-3">
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('barang-keluar.index') }}" 
                    class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-600 hover:bg-gray-100 transition font-medium">
                    Batal
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-xl shadow transition">
                    <i class="fas fa-paper-plane mr-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
