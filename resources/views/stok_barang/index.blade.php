@extends('layouts.app')
@section('content')
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 
                bg-white/70 backdrop-blur-md p-5 rounded-2xl shadow-lg border border-gray-200">

        <!-- KIRI -->
        <div class="flex items-center gap-3">
            <div class="p-3 bg-blue-100 text-blue-600 rounded-xl shadow-inner 
                        hover:scale-105 transition-all duration-200">
                <i class="fas fa-warehouse text-2xl"></i>
            </div>
            <h1 class="text-gray-800 font-extrabold text-2xl tracking-wide">
                Stok Barang di Gudang
            </h1>
        </div>

        <!-- KANAN -->
        <div class="flex items-center gap-3">
            <!-- Tombol Export Excel -->
            <a href="{{ route ('stok.export.excel') }}" class="flex items-center gap-2 bg-green-500 hover:bg-green-600 
                    text-white px-5 py-2.5 rounded-full shadow-md hover:shadow-lg transition-all duration-200 hover:scale-105">
                <i class="fas fa-file-excel text-lg"></i>
                <span class="font-semibold">Export Excel</span>
            </a>

            <!-- Tombol Export PDF -->
            <a href="{{ route ('stok.export.pdf') }}" class="flex items-center gap-2 bg-red-500 hover:bg-red-600 
                    text-white px-5 py-2.5 rounded-full shadow-md 
                    hover:shadow-lg transition-all duration-200 hover:scale-105">
                <i class="fas fa-file-pdf text-lg"></i>
                <span class="font-semibold">Export PDF</span>
            </a>

            <!-- Search Bar -->
            <div class="relative">
                <form action="" method="GET">
                    <input type="text" name="search" placeholder="Cari barang..." value="{{ request('search') }}" class="pl-12 pr-4 py-2.5 w-64 border border-gray-300 rounded-full 
                                shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none
                                transition-all">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 
                            text-gray-400"></i>
                </form>
            </div>
        </div>
        </div>


        <br>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Item</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalItem }}</p>
                    <p class="text-gray-600 text-sm mt-1">Jenis Barang Berbeda</p>
                </div>
                <div class="bg-blue-600 text-white p-3 rounded-lg">
                    <i class="fas fa-box-archive text-2xl"></i>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Stok Normal</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $stokNormal }}</p>
                    <p class="text-gray-600 text-sm mt-1">Stok Barang Aman</p>
                </div>
                <div class="bg-blue-600 text-white p-3 rounded-lg">
                    <i class="fas fa-boxes-stacked text-2xl"></i>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Stok Menipis</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $stokMenipis }}</p>
                    <p class="text-gray-600 text-sm mt-1">Stok Barang Menipis</p>
                </div>
                <div class="bg-blue-600 text-white p-3 rounded-lg">
                    <i class="fas fa-truck-ramp-box text-2xl"></i>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Stok Hampir Habis</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-1">{{ $stokHampirHabis }}</p>
                    <p class="text-gray-600 text-sm mt-1">Stok Perlu Diisi Ulang</p>
                </div>
                <div class="bg-blue-600 text-white p-3 rounded-lg">
                    <i class="fas fa-box-open text-2xl"></i>
                </div>
            </div>
        </div>

        <br>

        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-600">Data Stok Barang</h3>

                        <!-- Tombol Data Sampah -->
                    <a href="{{ route('stok.trash') }}"
                        class="flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500
                    text-white px-5 py-2.5 rounded-full shadow-md hover:shadow-lg transition-all duration-200 hover:scale-105">
                        <i class="fas fa-trash"></i> Data Sampah
                    </a>   
            </div>


            <div class="overflow-x-auto">
                <table class="w-full border-collapse rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="px-6 py-3 text-left text-sm font-semibold">Kode Barang</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nama Barang</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Distributor</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Masuk</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Harga</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Stok</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                            <tr class="border-b">
                                <td class="px-6 py-3">{{ $item->id }}</td>
                                <td class="px-6 py-3">{{ $item->nama_barang }}</td>
                                <td class="px-6 py-3">{{ $item->supplier }}</td>
                                <td class="px-6 py-3">{{ $item->tanggal_masuk->format('d-m-Y') }}</td>
                                <td class="px-6 py-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-3">

                                    {{-- badge warna stok --}}
                                    @if ($item->level == 'hampir_habis')
                                        <span class="flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-500 text-white 
                                                px-3 py-1.5 rounded-xl text-sm shadow-sm">
                                            <i class="fas fa-triangle-exclamation text-white"></i>
                                            {{ $item->sisa_stok }} <small class="opacity-90">(Hampir Habis)</small>
                                        </span>

                                    @elseif ($item->level == 'menipis')
                                        <span class="flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-yellow-300 text-black 
                                                px-3 py-1.5 rounded-xl text-sm shadow-sm">
                                            <i class="fas fa-exclamation-circle"></i>
                                            {{ $item->sisa_stok }} <small class="opacity-90">(Menipis)</small>
                                        </span>

                                    @else
                                        <span class="flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-500 text-white 
                                                    px-3 py-1.5 rounded-xl text-sm shadow-sm">
                                            <i class="fas fa-circle-check text-white"></i>
                                            {{ $item->sisa_stok }} <small class="opacity-90">(Normal)</small>
                                        </span>
                                    @endif
                                    <td class="px-6 py-3">
                                        <form action="{{ route('stok.destroy', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg shadow hover:shadow-md transition-all">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



@endsection