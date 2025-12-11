<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Investa</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="flex min-h-screen bg-gray-100">

    <!-- SIDEBAR -->
    <div class="fixed w-64 bg-white shadow-lg h-full p-5 transition-all duration-300">

        <!-- User Profile -->
        @php
            $user = Auth::user();
        @endphp

        <a href="{{ route('profil.index') }}" class="block mb-8">
            <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-100 transition cursor-pointer">
                <div class="flex items-center gap-3">
                    {{-- Foto Profil --}}
                    <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200">
                        @if ($user->profile_photo)
                            <img src="{{ asset('profile_photos/' . $user->profile_photo) }}"
                                class="w-full h-full object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                                class="w-full h-full object-cover">
                        @endif
                    </div>
                    {{-- Nama --}}
                    <div>
                        <h2 class="text-sm font-semibold text-gray-800">
                            {{ $user->name }}
                        </h2>
                        <p class="text-xs text-gray-500">User</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </a>


        <!-- MENU -->
        <ul class="space-y-2 mb-8">
            <li>
                <a href="{{ route('barang-masuk.index') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition
                    {{ request()->routeIs('barang-masuk*') ? 'bg-blue-600 text-white' : '' }}">
                    <i class="fa-solid fa-box-archive text-blue-500 mr-3"></i>
                    <span>Barang Masuk</span>
                </a>
            </li>

            <li>
                <a href="{{ route('barang-keluar.index') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition
                    {{ request()->routeIs('barang-keluar*') ? 'bg-blue-600 text-white' : '' }}">
                    <i class="fa-solid fa-dolly text-blue-500 mr-3"></i>
                    <span>Barang Keluar</span>
                </a>
            </li>

            <li>
                <a href="{{ route('pemasukan.index') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition
                    {{ request()->routeIs('pemasukan*') ? 'bg-blue-600 text-white' : '' }}">
                    <i class="fa-solid fa-arrow-trend-up text-blue-500 mr-3"></i>
                    <span>Pemasukan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('pengeluaran.index') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition
                    {{ request()->routeIs('pengeluaran*') ? 'bg-blue-600 text-white' : '' }}">
                    <i class="fa-solid fa-arrow-trend-down text-blue-500 mr-3"></i>
                    <span>Pengeluaran</span>
                </a>
            </li>

            <li>
                <a href="{{ route('stok.index') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition
                    {{ request()->routeIs('stok*') ? 'bg-blue-600 text-white' : '' }}">
                    <i class="fa-solid fa-warehouse text-blue-500 mr-3"></i>
                    <span>Stok Barang</span>
                </a>
            </li>
        </ul>

        <!-- LOGOUT -->
        <div class="absolute bottom-5 left-5 right-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center p-3 bg-black text-white rounded-lg hover:bg-red-600 transition">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 ml-64 p-8">
        @yield('content')
    </div>

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>