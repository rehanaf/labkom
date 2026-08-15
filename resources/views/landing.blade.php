@extends('layouts.public')

@section('title', 'Beranda')

@section('nav-links')
    <a href="{{ route('landing') }}#beranda" class="hover:text-primary transition-colors relative group">
        Beranda
        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
    </a>
    <a href="{{ route('landing') }}#fitur" class="hover:text-primary transition-colors">Fitur</a>
    <a href="{{ route('landing') }}#fasilitas" class="hover:text-primary transition-colors">Fasilitas</a>
    <a href="{{ route('panduan') }}" class="hover:text-primary transition-colors {{ request()->routeIs('panduan') ? 'text-primary' : '' }}">Panduan</a>
@endsection

@section('mobile-links')
    <a href="{{ route('landing') }}#beranda" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Beranda</a>
    <a href="{{ route('landing') }}#fitur" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Fitur</a>
    <a href="{{ route('landing') }}#fasilitas" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Fasilitas</a>
    <a href="{{ route('panduan') }}" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Panduan</a>
@endsection

@section('content')
    <!-- Main Hero Content -->
    <!-- PERBAIKAN: Menggunakan bg-white di light mode untuk kontras yang jelas -->
    <main class="flex-grow flex items-center justify-center pt-20 relative bg-white dark:bg-darkbg transition-colors duration-300">
        <div id="beranda" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 text-center z-10">

            <!-- Badge/Pill -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-primary/30 bg-primary/10 text-primary-glow text-sm font-bold tracking-wider uppercase mb-8">
                <span class="w-2.5 h-2.5 rounded-full bg-primary animate-pulse"></span>
                Sistem Informasi Laboratorium Komputer | Kelompok 7
            </div>

            <!-- Main Heading -->
            <!-- PERBAIKAN: Menggunakan hero-text (hitam) sebagai default -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold tracking-tight hero-text mb-6 leading-tight">
                Manajemen Laboratorium <br class="hidden md:block" />
                <span class="text-gradient">Cerdas & Terintegrasi</span>
            </h1>

            <!-- Description -->
            <p class="mt-4 max-w-2xl mx-auto text-lg md:text-xl text-gray-600 dark:text-gray-400 mb-10 leading-relaxed">
                Platform satu pintu untuk Mahasiswa, Dosen, dan Admin LabKom UIN.
                Ajukan jadwal praktikum, verifikasi real-time, dan monitoring inventaris dengan mudah.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
                <!-- Primary Button (Mulai Peminjaman -> Login) -->
                <a href="{{ route('login') }}" class="group w-full sm:w-auto px-8 py-4 rounded-xl bg-primary hover:bg-primary-dark text-white font-semibold shadow-lg shadow-primary/30 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>
                    Mulai Peminjaman
                </a>
        </div>

    </main>

    <!-- Section 2: Fitur Statis -->
    <!-- PERBAIKAN: Menggunakan bg-lightcard (putih) di light mode untuk section ini -->
    <section id="fitur" class="py-20 bg-lightcard dark:bg-cardbg transition-colors duration-300 border-t border-gray-200 dark:border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Fitur Unggulan Sistem</h2>
                <p class="mt-3 text-xl text-gray-600 dark:text-gray-400">Dirancang untuk efisiensi dan transparansi manajemen Lab.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fitur 1: Peminjaman Mandiri -->
                <div class="p-8 rounded-xl shadow-xl border-t-4 border-primary bg-gray-50 dark:bg-darkbg transition-colors duration-300">
                    <div class="text-primary mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Booking Real-Time</h3>
                    <p class="text-gray-600 dark:text-gray-400">Mahasiswa dapat mengajukan peminjaman lab secara mandiri 24/7 dan melihat ketersediaan jadwal secara langsung.</p>
                </div>

                <!-- Fitur 2: Verifikasi Dosen -->
                <div class="p-8 rounded-xl shadow-xl border-t-4 border-purple-500 bg-gray-50 dark:bg-darkbg transition-colors duration-300">
                    <div class="text-purple-600 dark:text-purple-400 mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.242a1.207 1.207 0 010 1.697l-2.75 2.75a1.207 1.207 0 01-1.697 0L10 12l-4.596 4.596a1.207 1.207 0 01-1.697 0l-2.75-2.75a1.207 1.207 0 010-1.697l.75-.75"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Persetujuan Cepat</h3>
                    <p class="text-gray-600 dark:text-gray-400">Dosen menerima notifikasi instan untuk menyetujui atau menolak permintaan peminjaman dengan mudah melalui dashboard.</p>
                </div>

                <!-- Fitur 3: Monitoring Inventaris -->
                <div class="p-8 rounded-xl shadow-xl border-t-4 border-green-500 bg-gray-50 dark:bg-darkbg transition-colors duration-300">
                    <div class="text-green-600 dark:text-green-400 mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Kelola Aset & Kondisi</h3>
                    <p class="text-gray-600 dark:text-gray-400">Admin LabKom dapat mengelola data laboratorium, kapasitas, fasilitas, dan status kondisi (baik/rusak).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Fasilitas (Data Laboratorium dari Database) -->
    <section id="fasilitas" class="py-20 bg-lightbg dark:bg-darkbg transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8">{{ $totalLabs }} Laboratorium yang Dapat Anda Pinjam</h2>

            @if($laboratoriums->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $accentColors = ['blue', 'purple', 'green', 'red'];
                @endphp
                @foreach($laboratoriums as $index => $lab)
                @php $accent = $accentColors[$index % count($accentColors)]; @endphp
                <div class="p-6 rounded-xl shadow-lg bg-white dark:bg-cardbg transition-colors duration-300 border border-gray-200 dark:border-gray-700">
                    <h4 class="text-xl font-bold text-{{ $accent }}-600 dark:text-{{ $accent }}-400">{{ $lab->nama_lab }}</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Kapasitas: {{ $lab->kapasitas }} Orang</p>
                    <ul class="text-left text-gray-700 dark:text-gray-300 text-sm list-disc ml-4 space-y-1">
                        @foreach(array_filter(array_map('trim', explode(',', $lab->fasilitas ?? ''))) as $fasilitas)
                            <li>{{ $fasilitas }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-600 dark:text-gray-400">Belum ada laboratorium terdaftar.</p>
            @endif

            <p class="mt-10 text-gray-600 dark:text-gray-400">Lihat detail ketersediaan dan booking setelah <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">Masuk</a>.</p>
        </div>
    </section>
@endsection
