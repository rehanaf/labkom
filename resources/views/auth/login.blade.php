@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <!-- Header Form -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Selamat Datang</h1>
        <p class="text-gray-600 dark:text-gray-400">Masuk untuk mengakses dashboard LabKom.</p>
    </div>

    <!-- Flash Message Error (Login Gagal) -->
    @error('identity')
    <div class="mb-4 p-4 rounded-lg bg-red-50 text-red-600 text-sm border border-red-200 flex items-center gap-2">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ $message }}
    </div>
    @enderror

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Input Identity -->
        <div>
            <label for="identity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email / NIM / NIP</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <input type="text" name="identity" id="identity" value="{{ old('identity') }}" required 
                    class="block w-full pl-10 pr-3 py-3 bg-gray-50 dark:bg-[#1F2937] border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
            </div>
        </div>

        <!-- Input Password -->
        <div>
            <div class="flex justify-between items-center mb-2">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <input type="password" name="password" id="password" required 
                    class="block w-full pl-10 pr-3 py-3 bg-gray-50 dark:bg-[#1F2937] border border-gray-300 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
            </div>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 bg-gray-100 dark:bg-[#1F2937] border-gray-300 dark:border-gray-700 rounded text-primary focus:ring-primary focus:ring-offset-white dark:focus:ring-offset-gray-900">
            <label for="remember_me" class="ml-2 block text-sm text-gray-600 dark:text-gray-400">Ingat Saya</label>
        </div>

        <!-- Submit -->
        <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-primary hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900 focus:ring-primary transition-all transform hover:scale-[1.02]">
            Masuk Portal 
            <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
        </button>
    </form>

    <div class="mt-8 text-center">
        <p class="text-sm text-gray-600 dark:text-gray-400">Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-primary hover:text-blue-700 dark:hover:text-blue-400 transition-colors">Daftar Sekarang</a></p>
    </div>
@endsection