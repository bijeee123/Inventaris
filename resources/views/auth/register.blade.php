{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.auth')

@section('title', 'Register - Investa')

@section('content')
    <div class="min-h-screen flex flex-col md:flex-row bg-gray-50">
        <!-- Left Side - Branding -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-blue-600 to-blue-800 items-center justify-center p-8">
            <div class="max-w-lg text-white text-center">
                <div class="mb-8">
                    <div
                        class="w-24 h-24 mx-auto mb-6 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <img src="{{ asset('images/Logo_inventaris-removebg-preview.png') }}" alt="Investa Logo"
                            class="w-16 h-16">
                    </div>
                    <h1 class="text-3xl font-bold mb-4">Bergabung dengan Investa</h1>
                    <p class="text-blue-100 leading-relaxed">
                        Mulai kelola inventaris dan keuangan bisnis Anda dengan sistem yang terintegrasi dan mudah
                        digunakan.
                    </p>
                </div>

                <div class="space-y-6 mt-12">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="font-medium">Data Aman</h3>
                            <p class="text-blue-100 text-sm">Keamanan data terjamin dengan enkripsi tingkat tinggi</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="font-medium">Proses Cepat</h3>
                            <p class="text-blue-100 text-sm">Registrasi cepat dan langsung dapat digunakan</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="font-medium">Tim Support</h3>
                            <p class="text-blue-100 text-sm">Dukungan tim siap membantu 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="flex-1 flex items-center justify-center p-4">
            <div class="w-full max-w-md">
                <!-- Logo for mobile -->
                <div class="md:hidden flex justify-center mb-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center">
                        <img src="{{ asset('images/Logo_inventaris-removebg-preview.png') }}" alt="Investa Logo"
                            class="w-12 h-12">
                    </div>
                </div>

                <!-- Register Card -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-8 pt-8 pb-6">
                        <div class="text-center mb-2">
                            <h2 class="text-2xl font-bold text-gray-800">Buat Akun Baru</h2>
                            <p class="text-gray-600 mt-2">Isi data diri Anda untuk mendaftar</p>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="px-8 pb-8">
                        <form method="POST" action="{{ route('register') }}" class="space-y-5" id="registerForm">
                            @csrf

                            <!-- Name Input -->
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-2">
                                    Nama Lengkap
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="name" required autofocus value="{{ old('name') }}"
                                        placeholder="Masukkan nama lengkap"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" />
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-2">
                                    Email
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <input type="email" name="email" required value="{{ old('email') }}"
                                        placeholder="nama@email.com"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" />
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-2">
                                    Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" required
                                        placeholder="Minimal 8 karakter"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" />
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password Input -->
                            <div>
                                <label class="block text-gray-700 text-sm font-medium mb-2">
                                    Konfirmasi Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                        placeholder="Ulangi password"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200" />
                                </div>
                                <div id="passwordError" class="hidden">
                                    <p class="text-red-500 text-xs mt-1">Password tidak cocok!</p>
                                </div>
                            </div>

                            <!-- Terms Agreement -->
                            <div class="flex items-start">
                                <input type="checkbox" name="terms" id="terms" required
                                    class="h-4 w-4 mt-1 text-blue-600 rounded focus:ring-blue-500 border-gray-300" />
                                <label for="terms" class="ml-2 text-gray-700 text-sm">
                                    Saya menyetujui
                                    <a href="#" class="text-blue-600 hover:text-blue-800">Syarat dan Ketentuan</a>
                                    serta
                                    <a href="#" class="text-blue-600 hover:text-blue-800">Kebijakan Privasi</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" id="submitBtn"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Daftar
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="my-6">
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-gray-500">Sudah punya akun?</span>
                                </div>
                            </div>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center justify-center w-full py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span class="font-medium">Masuk ke Akun</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="px-8 py-6 bg-gray-50 border-t border-gray-100">
                        <div class="text-center">
                            <p class="text-gray-600 text-sm">
                                Dengan mendaftar, Anda setuju dengan ketentuan yang berlaku.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-6 text-center">
                    <p class="text-gray-500 text-xs">
                        © {{ date('Y') }} Investa. Hak cipta dilindungi undang-undang.
                        <a href="#" class="text-blue-600 hover:underline">Bantuan</a> •
                        <a href="#" class="text-blue-600 hover:underline">Kontak</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Match Validation -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submitBtn');
            const passwordError = document.getElementById('passwordError');

            function checkPasswordMatch() {
                if (password.value && confirmPassword.value) {
                    if (confirmPassword.value !== password.value) {
                        passwordError.classList.remove('hidden');
                        submitBtn.disabled = true;
                        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    } else {
                        passwordError.classList.add('hidden');
                        submitBtn.disabled = false;
                        submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    }
                }
            }

            password.addEventListener('input', checkPasswordMatch);
            confirmPassword.addEventListener('input', checkPasswordMatch);
        });
    </script>
@endsection