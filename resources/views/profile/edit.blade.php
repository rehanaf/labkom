@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Profil</h1>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Avatar: Lingkaran + Placeholder + Upload -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Foto Profil</label>
            <div class="flex items-center space-x-4">
                <!-- Tampilkan avatar atau placeholder -->
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                         alt="Avatar"
                         class="w-16 h-16 rounded-full object-cover border-2 border-blue-500 shadow-md">
                @else
                    <div class="w-16 h-16 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-xl font-bold text-gray-700 dark:text-white">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                @endif

                <!-- Tombol Ganti Foto -->
                <div>
                    <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden">
                    <label for="avatar" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-600 rounded-md cursor-pointer hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Ganti Foto
                    </label>
                    @if(Auth::user()->avatar)
                        <p class="mt-1 text-xs text-gray-500">Unggah gambar baru untuk mengganti</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', Auth::user()->name) }}"
                required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', Auth::user()->email) }}"
                required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
        </div>

        <!-- Bio -->
        <div class="mb-4">
            <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bio (Opsional)</label>
            <textarea
                id="bio"
                name="bio"
                rows="3"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
            >{{ old('bio', Auth::user()->bio) }}</textarea>
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ceritakan tentang diri Anda dalam 1-2 kalimat.</p>
        </div>

        <!-- No. HP -->
        <div class="mb-6">
            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">No. HP (Opsional)</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', Auth::user()->phone) }}"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button
                type="submit"
                class="px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection