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
                Data Pemasukan Bulan Ini
            </h1>
        </div>
    </div>

    <br>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card 1 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Pemasukan Hari Ini</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">Rp {{ number_format($today, 0, ',', '.') }}</p>
                <p class="text-gray-600 text-sm mt-1">Total pemasukan hari ini</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-plus text-2xl"></i>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Pemasukan Bulan Ini</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">Rp {{ number_format($bulanIni, 0, ',', '.') }}</p>
                <p class="text-gray-600 text-sm mt-1">Total pemasukan bulan ini</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-chart-simple text-2xl"></i>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Pemasukan Bulan Kemarin</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">Rp {{ number_format($bulanKemarin, 0, ',', '.') }}</p>
                <p class="text-gray-600 text-sm mt-1">Total pemasukan bulan kemarin</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-chart-column text-2xl"></i>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white shadow-md rounded-xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
                <h3 class="text-gray-500 text-sm font-medium">Keuntungan Bulan Ini</h3>
                <p class="text-3xl font-bold text-gray-800 mt-1">Rp {{ number_format($keuntungan, 0, ',', '.') }}</p>
                <p class="text-gray-600 text-sm mt-1">Total keuntungan bulan ini</p>
            </div>
            <div class="bg-blue-600 text-white p-3 rounded-lg">
                <i class="fas fa-chart-line text-2xl"></i>
            </div>
        </div>

    </div>

    <br>

    <!-- CHART AREA -->
    <div class="bg-white shadow-md rounded-xl p-6 mt-5">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Grafik Pemasukan Bulan Ini</h2>
        <canvas id="pemasukanChart" height="100"></canvas>
    </div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('pemasukanChart').getContext('2d');

    const pemasukanChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($hariLabels),     // 1,2,3,...30
            datasets: [{
                label: 'Pemasukan Harian',
                data: @json($pendapatanHarian),

                borderWidth: 3,
                tension: 0.3,
                fill: true,
                backgroundColor: "rgba(59, 130, 246, 0.15)",
                borderColor: "rgba(59, 130, 246, 1)"
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endpush
