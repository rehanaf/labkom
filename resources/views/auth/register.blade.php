@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Selamat Datang</h2>
    <p class="text-gray-600 dark:text-gray-300 mb-6">Buat akun baru untuk mengakses dashboard LabKom.</p>

    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <!-- Nama Lengkap -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
            <div class="relative">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 pl-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
            <div class="relative">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 pl-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14v-2H5v2z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sebagai</label>
            <select id="role" name="role" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <option value="" disabled selected>Pilih Peran</option>
                <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
            </select>
        </div>

        <!-- NIM / NIP (Conditional) -->
        <div class="mb-4" id="nimNipField">
            <label for="nim_nip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1" id="nimNipLabel">NIM / NIP</label>
            <div class="relative">
                <input id="nim_nip" type="text" name="nim_nip" value="{{ old('nim_nip') }}"
                    class="w-full px-4 py-2 pl-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 14h.01M18 14h.01M15 11h3M12 11h.01M9 11h.01M7 21h14v-2M5 19h14V5H5v14z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Jurusan (Conditional) -->
        <div class="mb-4" id="jurusanField">
            <label for="jurusan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jurusan</label>
            <div class="relative">
                <input id="jurusan" type="text" name="jurusan" value="{{ old('jurusan') }}"
                    class="w-full px-4 py-2 pl-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m-2 13l-4-4-4 4m8-8l-4 4-4-4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
            <div class="relative">
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 pl-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v6h8z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Konfirmasi Password</label>
            <div class="relative">
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 pl-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v6h8z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex items-center mb-6">
            <input id="remember" type="checkbox" name="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Ingat Saya</label>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Daftar Sekarang →
        </button>
    </form>

    <div class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-medium">Masuk Portal</a>
    </div>

    <!-- JavaScript untuk toggle field berdasarkan role -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const nimNipField = document.getElementById('nimNipField');
            const jurusanField = document.getElementById('jurusanField');
            const nimNipLabel = document.getElementById('nimNipLabel');
            const nimNipInput = document.getElementById('nim_nip');
            const jurusanInput = document.getElementById('jurusan');

            function toggleFields() {
                const role = roleSelect.value;

                nimNipField.style.display = 'block';
                jurusanField.style.display = 'block';
                nimNipInput.setAttribute('required', 'required');
                jurusanInput.setAttribute('required', 'required');

                // Update label
                nimNipLabel.textContent = role === 'mahasiswa' ? 'NIM (Mahasiswa)' : 'NIP (Dosen)';
            }

            // Inisialisasi
            toggleFields();

            // Dengarkan perubahan
            roleSelect.addEventListener('change', toggleFields);
        });
    </script>
@endsection