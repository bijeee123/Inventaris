@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-1">
    Selamat Datang, {{ Auth::user()->name }}
</h1>

<p class="text-gray-500 mb-6">Ringkasan sistem manajemen gudang</p>

<!-- Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- CARD 1 -->
    <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
        <div>
            <h3 class="text-gray-500 text-sm font-medium">Barang Masuk Hari Ini</h3>
            <p class="text-3xl font-bold mt-1">{{ $barangMasukHariIni }}</p>
        </div>
        <div class="bg-blue-600 text-white p-3 rounded-lg">
            <i class="fas fa-box-archive text-2xl"></i>
        </div>
    </div>

    <!-- CARD 2 -->
    <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
        <div>
            <h3 class="text-gray-500 text-sm font-medium">Barang Keluar Hari Ini</h3>
            <p class="text-3xl font-bold mt-1">{{ $barangKeluarHariIni }}</p>
        </div>
        <div class="bg-blue-600 text-white p-3 rounded-lg">
            <i class="fas fa-box-open text-2xl"></i>
        </div>
    </div>

    <!-- CARD 3 -->
    <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
        <div>
            <h3 class="text-gray-500 text-sm font-medium">Pemasukan Bulan Ini</h3>
            <p class="text-3xl font-bold mt-1">Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</p>
        </div>
        <div class="bg-blue-600 text-white p-3 rounded-lg">
            <i class="fas fa-arrow-trend-up text-2xl"></i>
        </div>
    </div>

    <!-- CARD 4 -->
    <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between">
        <div>
            <h3 class="text-gray-500 text-sm font-medium">Total Stok</h3>
            <p class="text-3xl font-bold mt-1">{{ $totalStok }}</p>
            <p class="text-gray-500 text-sm">Unit</p>
        </div>
        <div class="bg-blue-600 text-white p-3 rounded-lg">
            <i class="fas fa-warehouse text-2xl"></i>
        </div>
    </div>

</div>

<!-- Bagian Bawah -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

    <!-- Aktivitas -->
    <div class="bg-white shadow-md rounded-xl p-5">
        <h4 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h4>

        @foreach($aktivitas as $a)
            <div class="flex items-start space-x-3 mb-3">
                <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <p class="font-medium">
                        Barang {{ $a['jenis'] }}: {{ $a['nama_barang'] }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($a['tanggal'])->diffForHumans() }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Stok Menipis -->
    <div class="bg-white shadow-md rounded-xl p-5">
        <h4 class="text-lg font-semibold mb-4">Stok Menipis</h4>

        @forelse($stokMenipis as $item)
            @php
                $keluar = $item->barangKeluar->sum('jumlah_keluar');
                $sisa = $item->jumlah - $keluar;
            @endphp

            <div class="flex items-center justify-between mb-3">
                <div>
                    <p class="font-medium">{{ $item->nama_barang }}</p>
                    <p class="text-sm text-gray-500">Sisa {{ $sisa }} unit</p>
                </div>
                <span class="text-sm font-semibold {{ $sisa <= 5 ? 'text-red-600' : 'text-yellow-500' }}">
                    {{ $sisa <= 5 ? 'Kritis' : 'Menipis' }}
                </span>
            </div>

        @empty
            <p class="text-gray-500">Tidak ada stok menipis.</p>
        @endforelse
    </div>

</div>

@endsection
