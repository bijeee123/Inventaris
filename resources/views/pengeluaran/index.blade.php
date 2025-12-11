@extends('layouts.app')
@section('content')

    <div class="flex flex-col md:flex-row md:justify-between md:items-center 
                                        gap-4 bg-white/70 backdrop-blur-md p-5 rounded-2xl shadow-lg 
                                        border border-gray-200">

        <!-- KIRI -->
        <div class="flex items-center gap-3">
            <div class="p-3 bg-blue-100 text-blue-600 rounded-xl shadow-inner
                                                hover:scale-105 transition-all duration-200">
                <i class="fas fa-arrow-trend-up text-2xl"></i>
            </div>

            <h1 class="text-gray-800 font-extrabold text-2xl tracking-wide">
                Data Pengeluaran Bulan Ini
            </h1>
        </div>
    </div>

    <br>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Pengeluaran Hari Ini</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">
                    Rp {{ number_format($pengeluaranHariIni, 0, ',', '.') }}
                </p>
                <p class="text-gray-600 text-sm mt-1">Transaksi Hari Ini</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-minus text-2xl"></i>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Pengeluaran Bulan Ini </h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">
                    Rp {{ number_format($pengeluaranBulanIni, 0, ',', '.') }}
                </p>
                <p class="text-gray-600 text-sm mt-1">Pengeluaran Bulan Ini</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-chart-simple text-2xl"></i>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Pengeluaran Bulan Kemarin</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">
                    Rp {{ number_format($pengeluaranBulanKemarin, 0, ',', '.') }}
                </p>
                <p class="text-gray-600 text-sm mt-1">Pengeluaran Bulan Kemarin</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-chart-column text-2xl"></i>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Perbandingan Bulan Ini</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">
                    Rp {{ number_format($perbandingan, 0, ',', '.') }}
                </p>
                <p class="text-gray-600 text-sm mt-1">Perbandingan Bulan Ini</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-chart-line text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-xl p-6 mt-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Grafik Pengeluaran Bulan Ini</h2>
        <canvas id="pengeluaranChart" height="100"></canvas>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctxPengeluaran = document.getElementById('pengeluaranChart').getContext('2d');

            new Chart(ctxPengeluaran, {
                type: 'line',
                data: {
                    labels: @json($hariLabels),
                    datasets: [{
                        label: 'Pengeluaran Harian',
                        data: @json($pengeluaranHarian),
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true,
                        backgroundColor: "rgba(239, 68, 68, 0.15)",
                        borderColor: "rgba(239, 68, 68, 1)"
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
    @endpush

@endsection