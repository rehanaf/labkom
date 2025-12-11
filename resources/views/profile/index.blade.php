@extends('layouts.app')

@section('title', 'Profil ' . $user->name)

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
    <!-- Header Profil -->
    <div class="flex items-center space-x-6 mb-8">
        <!-- Avatar -->
        <div class="relative">
            @if($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}"
                     alt="{{ $user->name }}"
                     class="w-24 h-24 rounded-full object-cover border-4 border-blue-500 shadow-lg">
            @else
                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-3xl font-bold text-white shadow-lg">
                    {{ substr($user->name, 0, 1) }}
                </div>
            @endif
        </div>

        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h1>
            <div class="flex items-center space-x-4 mt-1">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                    {{ str_replace('_', ' ', $user->role) }}
                </span>
                @if($user->nim_nip)
                    <span class="text-sm text-gray-600 dark:text-gray-300">
                        {{ $user->nim_nip }}
                    </span>
                @endif
            </div>
            @if($user->jurusan)
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    <span class="font-medium">Jurusan:</span> {{ $user->jurusan }}
                </p>
            @endif
        </div>
    </div>

    <!-- Bio -->
    @if($user->bio)
        <div class="mb-8 p-5 bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-600">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Tentang Saya</h2>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                {{ $user->bio }}
            </p>
        </div>
    @endif

    <!-- Informasi Kontak -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="p-4 bg-gray-50 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-600">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Email</h3>
            <p class="text-gray-900 dark:text-white truncate">{{ $user->email }}</p>
        </div>
        @if($user->phone)
            <div class="p-4 bg-gray-50 dark:bg-gray-700/30 rounded-lg border border-gray-200 dark:border-gray-600">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">No. HP</h3>
                <p class="text-gray-900 dark:text-white">{{ $user->phone }}</p>
            </div>
        @endif
    </div>

    <!-- Tombol Edit (Hanya untuk pemilik profil) -->
    @auth
        @if(Auth::id() === $user->id)
            <div class="flex justify-end">
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    Edit Profil
                </a>
            </div>
        @endif
    @endauth

    <!-- Notifikasi jika bukan pemilik profil -->
    @auth
        @if(Auth::id() !== $user->id)
            <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 text-blue-800 dark:text-blue-200 text-sm rounded-lg border border-blue-200 dark:border-blue-800">
                <p>Ini adalah profil publik milik <strong>{{ $user->name }}</strong>.</p>
                <p class="mt-1">
                    Untuk mengelola profil Anda, kunjungi
                    <a href="{{ route('profile.edit') }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">Profil Saya</a>.
                </p>
            </div>
        @endif
    @endauth
</div>
@endsection