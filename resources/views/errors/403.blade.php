@extends('layouts.public')

@section('title', '403 - Akses Ditolak')

@section('nav-links')
    <a href="{{ route('landing') }}#beranda" class="hover:text-primary transition-colors relative group">
        Beranda
        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
    </a>
    <a href="{{ route('landing') }}#fitur" class="hover:text-primary transition-colors">Fitur</a>
    <a href="{{ route('landing') }}#fasilitas" class="hover:text-primary transition-colors">Fasilitas</a>
    <a href="{{ route('panduan') }}" class="hover:text-primary transition-colors">Panduan</a>
@endsection

@section('mobile-links')
    <a href="{{ route('landing') }}#beranda" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Beranda</a>
    <a href="{{ route('landing') }}#fitur" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Fitur</a>
    <a href="{{ route('landing') }}#fasilitas" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Fasilitas</a>
    <a href="{{ route('panduan') }}" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Panduan</a>
@endsection

@section('content')
    <main class="flex-grow flex items-center justify-center pt-20 bg-white dark:bg-darkbg transition-colors duration-300">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 text-center">
            <div class="mx-auto w-20 h-20 rounded-2xl bg-red-100 dark:bg-red-900/40 flex items-center justify-center mb-6">
                <svg class="w-10 h-10 text-red-500 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 4h.01M18.364 18.364a9 9 0 10-12.728 0m12.728 0a9 9 0 01-12.728 0" /></svg>
            </div>
            <p class="text-7xl md:text-9xl font-extrabold text-primary/20 dark:text-primary/30">403</p>
            <h1 class="mt-4 text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white">Akses Ditolak</h1>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-400">
                Anda tidak memiliki izin untuk mengakses halaman ini. Silakan hubungi admin lab jika menurut Anda ini adalah sebuah kesalahan.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('landing') }}" class="px-8 py-3 rounded-xl bg-primary hover:bg-primary-dark text-white font-semibold shadow-lg shadow-primary/25 transition-all transform hover:scale-105">Kembali ke Beranda</a>
                <a href="{{ route('login') }}" class="px-8 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-200 dark:hover:bg-gray-700 transition">Masuk sebagai Pengguna Lain</a>
            </div>
        </div>
    </main>
@endsection
