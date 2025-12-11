@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10">

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Profile Picture -->
            <div class="flex flex-col items-center mb-10">
                <div class="relative">
                    <div class="w-28 h-28 rounded-full bg-gray-200 overflow-hidden flex items-center justify-center">
                        @if ($user->profile_photo)
                            <img src="{{ asset('profile_photos/' . $user->profile_photo) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-3xl text-gray-600">#</span>
                        @endif
                    </div>

                    <!-- Camera Button -->
                    <label for="photo-upload"
                        class="absolute bottom-1 right-1 bg-gray-700 text-white p-2 rounded-full cursor-pointer hover:bg-gray-600">
                        <i class="fas fa-camera"></i>
                    </label>

                    <input type="file" id="photo-upload" name="profile_photo" class="hidden">
                </div>
            </div>

            <!-- Form Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- First Name -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Nama Depan</label>
                    <div class="flex items-center border rounded-xl p-3 bg-white">
                        <input type="text" name="first_name" value="{{ $user->first_name }}" placeholder="Nama Depan"
                            class="w-full outline-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                </div>

                <!-- Last Name -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Nama Belakang</label>
                    <div class="flex items-center border rounded-xl p-3 bg-white">
                        <input type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Nama Belakang"
                            class="w-full outline-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Email</label>
                    <div class="flex items-center border rounded-xl p-3 bg-white">
                        <input type="email" value="{{ $user->email }}" disabled class="w-full outline-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Nomor Telephone</label>
                    <div class="flex items-center border rounded-xl p-3 bg-white">
                        <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Nomor"
                            class="w-full outline-none">
                        <i class="fas fa-phone text-gray-400"></i>
                    </div>
                </div>

                <!-- DOB -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Tanggal Lahir</label>
                    <div class="flex items-center border rounded-xl p-3 bg-white">
                        <input type="date" name="birth_date" value="{{ $user->birth_date }}" class="w-full outline-none">
                    </div>
                </div>

                <!-- Country -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Negara</label>
                    <div class="relative">
                        <select name="country" class="w-full border rounded-xl p-3 bg-white appearance-none pr-10">
                            <option value="">Pilih Negara</option>

                            @php
                                $countries = [
                                    'Brunei Darussalam',
                                    'Kamboja',
                                    'Indonesia',
                                    'Laos',
                                    'Malaysia',
                                    'Myanmar',
                                    'Filipina',
                                    'Singapura',
                                    'Thailand',
                                    'Vietnam'
                                ];
                            @endphp

                            @foreach ($countries as $country)
                                <option value="{{ $country }}" {{ $user->country == $country ? 'selected' : '' }}>
                                    {{ $country }}
                                </option>
                            @endforeach

                        </select>
                        <i
                            class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none"></i>
                    </div>
                </div>

            </div>

            <!-- Save button -->
            <div class="text-right mt-10">
                <button class="bg-gray-900 text-white px-6 py-3 rounded-xl hover:bg-gray-800">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
@endsection