{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.auth')

@section('title', 'Login - Investa')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
    <!-- Left Side - Branding -->
    <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-blue-600 to-blue-800 items-center justify-center p-8">
        <div class="max-w-lg text-white text-center">
            <div class="mb-8">
                <div class="w-24 h-24 mx-auto mb-6 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                    <img src="{{ asset('images/Logo_inventaris-removebg-preview.png') }}" alt="Investa Logo" class="w-16 h-16">
                </div>
                <h1 class="text-3xl font-bold mb-4">Selamat Datang di Investa</h1>
                <p class="text-blue-100 leading-relaxed">
                    Sistem manajemen inventaris dan keuangan yang membantu Anda mengelola bisnis dengan lebih efisien.
                </p>
            </div>
            
            <div class="space-y-4 mt-12">
                <div class="flex items-center justify-center space-x-3">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-sm">Stok barang real-time</span>
                </div>
                <div class="flex items-center justify-center space-x-3">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <span class="text-sm">Laporan keuangan otomatis</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="flex-1 flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Logo for mobile -->
            <div class="md:hidden flex justify-center mb-8">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center">
                    <img src="{{ asset('images/Logo_inventaris-removebg-preview.png') }}" alt="Investa Logo" class="w-12 h-12">
                </div>
            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="px-8 pt-8 pb-6">
                    <div class="text-center mb-2">
                        <h2 class="text-2xl font-bold text-gray-800">Masuk ke Akun</h2>
                        <p class="text-gray-600 mt-2">Silakan masukkan kredensial Anda</p>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">
                                Email
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input 
                                    type="email" 
                                    name="email" 
                                    required 
                                    autofocus
                                    placeholder="nama@email.com"
                                    value="{{ old('email') }}"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                />
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="block text-gray-700 text-sm font-medium">
                                    Password
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 transition">
                                    Lupa password?
                                </a>
                                @endif
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input 
                                    type="password" 
                                    name="password" 
                                    required
                                    placeholder="Masukkan password"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                />
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                id="remember"
                                class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300"
                            />
                            <label for="remember" class="ml-2 text-gray-700 text-sm">
                                Ingat saya
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            Masuk
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="my-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Atau</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Login (optional) -->
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" class="inline-flex justify-center items-center py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span class="text-sm font-medium">Google</span>
                        </button>
                        <button type="button" class="inline-flex justify-center items-center py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            <span class="text-sm font-medium">GitHub</span>
                        </button>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="px-8 py-6 bg-gray-50 border-t border-gray-100">
                    <div class="text-center">
                        <p class="text-gray-600 text-sm">
                            Belum memiliki akun?
                            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium ml-1 transition">
                                Daftar di sini
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-6 text-center">
                <p class="text-gray-500 text-xs">
                    © {{ date('Y') }} Investa. Hak cipta dilindungi undang-undang.
                    <a href="#" class="text-blue-600 hover:underline">Ketentuan Layanan</a> •
                    <a href="#" class="text-blue-600 hover:underline">Kebijakan Privasi</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection