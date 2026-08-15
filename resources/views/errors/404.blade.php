@extends('layouts.public')

@section('title', '404 - Halaman Tidak Ditemukan')

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
            <p class="text-7xl md:text-9xl font-extrabold text-primary/20 dark:text-primary/30">404</p>
            <h1 class="mt-4 text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white">Halaman Tidak Ditemukan</h1>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-400">
                Halaman yang Anda cari mungkin telah dipindahkan, dihapus, atau tidak pernah ada.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('landing') }}" class="px-8 py-3 rounded-xl bg-primary hover:bg-primary-dark text-white font-semibold shadow-lg shadow-primary/25 transition-all transform hover:scale-105">Kembali ke Beranda</a>
                <a href="{{ route('panduan') }}" class="px-8 py-3 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-200 dark:hover:bg-gray-700 transition">Lihat Panduan</a>
            </div>
        </div>
    </main>
@endsection
