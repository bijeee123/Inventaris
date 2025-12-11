<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investa</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- NAVBAR -->
    <nav class="flex justify-between items-center px-10 py-5 bg-white shadow">
        <div class="flex items-center gap-3 text-xl font-bold">
            <i class="fa-solid fa-cube"></i>
            Investa
        </div>

        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-black text-sm">Masuk</a>
            <a href="{{ route('register') }}"
                class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800 text-sm">Daftar</a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="text-center py-28 px-5">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
            Sistem Manajemen Inventaris Terdepan
        </h1>

        <p class="text-gray-600 max-w-2xl mx-auto text-base">
            Kelola stok barang, keuangan, dan laporan dengan mudah.
            Investa memberikan kontrol penuh atas bisnis Anda.
        </p>

        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('login') }}"
                class="bg-black text-white px-6 py-3 rounded-md font-semibold hover:bg-gray-800 transition">
                Mulai Gratis
            </a>

            <a href="#"
                class="border border-gray-300 px-6 py-3 rounded-md font-medium text-gray-700 hover:bg-gray-200 transition">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="bg-white py-20 px-6">
        <h2 class="text-center text-3xl font-bold mb-12">Fitur Unggulan</h2>

        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="fa-solid fa-box text-4xl mb-4"></i>
                <h3 class="text-lg font-semibold mb-2">Manajemen Stok</h3>
                <p class="text-gray-600 text-sm">
                    Kelola pemasukan dan pengeluaran barang dengan sistem otomatis.
                </p>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="fa-solid fa-chart-line text-4xl mb-4"></i>
                <h3 class="text-lg font-semibold mb-2">Laporan Keuangan</h3>
                <p class="text-gray-600 text-sm">
                    Pantau pemasukan dan pengeluaran uang secara real-time.
                </p>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="fa-solid fa-chart-column text-4xl mb-4"></i>
                <h3 class="text-lg font-semibold mb-2">Analisis Data</h3>
                <p class="text-gray-600 text-sm">
                    Dapatkan insight bisnis dengan laporan yang komprehensif.
                </p>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="fa-solid fa-shield-halved text-4xl mb-4"></i>
                <h3 class="text-lg font-semibold mb-2">Keamanan Terjamin</h3>
                <p class="text-gray-600 text-sm">
                    Data Anda aman dengan sistem enkripsi tingkat enterprise.
                </p>
            </div>

        </div>
    </section>

</body>

</html>
