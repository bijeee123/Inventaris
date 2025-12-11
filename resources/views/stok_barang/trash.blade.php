@extends('layouts.app')
@section('content')
    <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-600">Data Sampah Barang</h3>

            <a href="{{ route('stok.index') }}"
                class="flex items-center gap-2 bg-yellow-400 hover:bg-yellow-500
                            text-white px-5 py-2.5 rounded-full shadow-md hover:shadow-lg transition-all duration-200 hover:scale-105">
                <i class="fas fa-arrow-left"></i> Kembali
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
                    @forelse ($sampah as $item)
                        <tr class="border-b">
                            <td class="px-6 py-3">{{ $item->kode_barang }}</td>
                            <td class="px-6 py-3">{{ $item->nama_barang }}</td>
                            <td class="px-6 py-3">{{ $item->distributor }}</td>
                            <td class="px-6 py-3">{{ $item->tanggal_masuk }}</td>
                            <td class="px-6 py-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-3">{{ $item->stok }}</td>

                            <td class="px-6 py-3 flex gap-2">
                                {{-- Tombol Restore --}}
                                <form action="{{ route('stok.restore', $item->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full shadow hover:scale-105 transition-all">
                                        <i class="fas fa-undo"></i> Restore
                                    </button>
                                </form>

                                {{-- Tombol Hapus Permanen --}}
                                <form action="{{ route('stok.forceDelete', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus permanen? Data tidak bisa dikembalikan!');">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full shadow hover:scale-105 transition-all">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">
                                Tidak ada data sampah.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection