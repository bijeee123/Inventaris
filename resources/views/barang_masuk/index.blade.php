@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row md:justify-between md:items-center 
            gap-4 bg-white/70 backdrop-blur-md p-5 rounded-2xl shadow-lg 
            border border-gray-200">

    <!-- KIRI -->
    <div class="flex items-center gap-3">
        <div class="p-3 bg-blue-100 text-blue-600 rounded-xl shadow-inner
                    hover:scale-105 transition-all duration-200">
            <i class="fas fa-box-archive text-2xl"></i>
        </div>

        <h1 class="text-gray-800 font-extrabold text-2xl tracking-wide">
            Barang Masuk
        </h1>
    </div>

    <!-- KANAN -->
    <a href="{{ route('barang-masuk.create') }}"
    class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 
            text-white px-5 py-2.5 rounded-full shadow-md hover:shadow-lg 
            transition-all duration-200 hover:scale-105 font-semibold">
        <i class="fas fa-plus text-lg"></i>
        Tambah Barang
    </a>

</div>

    <br>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Barang Masuk Hari Ini</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $barangHariIni }}<p>
                <p class="text-gray-600 text-sm mt-1">Transaksi Hari Ini</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-box-archive text-2xl"></i>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Makanan Ringan</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $barang->where('kategori','Makanan Ringan')->count() }}</p>
                <p class="text-gray-600 text-sm mt-1">Transakasi Masuk</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-cookie-bite text-2xl"></i>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Makanan Berat</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $barang->where('kategori','Makanan Berat')->count() }}</p>
                <p class="text-gray-600 text-sm mt-1">Transaksi Masuk</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-utensils text-2xl"></i>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Minuman</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $barang->where('kategori','Minuman')->count() }}</p>
                <p class="text-gray-600 text-sm mt-1">Transaksi Masuk</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-mug-hot text-2xl"></i>
            </div>
        </div>
    </div>

    
{{-- Riwayat Barang Masuk --}}
<div class="mt-10" x-data="{ tab: 'Makanan Ringan' }">
    <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-200">
        <h3 class="text-2xl font-bold mb-3 text-gray-600">Riwayat Barang Masuk Per Kategori</h3>

        <!-- Tabs -->
        <div class="flex flex-wrap gap-2 bg-gray-100 p-2 rounded-xl mb-6">
            @foreach ([
                'Makanan Ringan' => 'fa-cookie-bite',
                'Makanan Berat' => 'fa-utensils',
                'Minuman' => 'fa-mug-hot',
                'Buah-buahan' => 'fa-apple-alt',
                'Sayuran' => 'fa-carrot',
                'Lain-lain' => 'fa-box'
            ] as $kategori => $icon)
                <button
                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-medium transition-all duration-200"
                    :class="{ 
                        'bg-white shadow text-blue-600': tab === '{{ $kategori }}', 
                        'text-gray-600 hover:bg-gray-200': tab !== '{{ $kategori }}' }"
                    @click="tab = '{{ $kategori }}'">
                    <i class="fas {{ $icon }}"></i>
                    {{ $kategori }}
                </button>
            @endforeach
        </div>

        <!-- Konten Tiap Tab -->
        @php
            $icons = [
                'Makanan Ringan' => 'fa-cookie-bite',
                'Makanan Berat' => 'fa-utensils',
                'Minuman' => 'fa-mug-hot',
                'Buah-buahan' => 'fa-apple-alt',
                'Sayuran' => 'fa-carrot',
                'Lain-lain' => 'fa-box'
            ];
        @endphp

        @foreach($barang->groupBy('kategori') as $kategori => $items)
            @php
                $icon = $icons[$kategori] ?? 'fa-box';
            @endphp

            <div 
                x-show="tab === '{{ $kategori }}'" 
                x-transition
                class="space-y-4">
                <!-- Header kategori -->
                <div class="flex items-center justify-between border-b pb-3">
                    <h4 class="text-lg font-semibold flex items-center gap-2 text-gray-800">
                        <i class="fas {{ $icon }} text-blue-500"></i>
                        {{ $kategori }}
                    </h4>
                    <span class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full shadow-sm">
                        {{ count($items) }} transaksi
                    </span>
                </div>

                <!-- List transaksi -->
                @forelse($items as $item)
                    <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-4 flex justify-between items-center border border-gray-200 shadow-sm transition-all duration-200">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $item->nama_barang }}</p>
                            <p class="text-sm text-gray-500">Supplier: {{ $item->supplier }}</p>
                        </div>
                <div class="text-right">
                    <p class="text-blue-600 font-bold">
                        +{{ $item->jumlah ?? 0 }} unit
                            <span class="text-gray-600 text-sm">| Rp {{ number_format($item->total_harga, 0, ',', '.') }}</span>
                    </p>
                    <p class="text-sm text-gray-500 flex items-center justify-end gap-1">
                        <i class="fa-regular fa-calendar"></i>
                            {{ $item->tanggal_masuk->format('Y-m-d H:i') }}
                    </p>
                </div>
            </div>
        @empty
                    <div class="bg-gray-50 p-5 rounded-xl text-center text-gray-500">
                        Belum ada transaksi untuk kategori ini.
                    </div>
                @endforelse
            </div>
        @endforeach
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>

@endsection
