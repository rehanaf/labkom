@extends('layouts.app')

@section('title', 'Edit Laboratorium')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Laboratorium: {{ $laboratorium->nama_lab }}</h1>
        <a href="{{ route('laboratorium.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
        <div class="p-8">
            <form action="{{ route('laboratorium.update', $laboratorium->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Lab -->
                <div>
                    <label for="nama_lab" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Laboratorium</label>
                    <input type="text" name="nama_lab" id="nama_lab" value="{{ old('nama_lab', $laboratorium->nama_lab) }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
                    @error('nama_lab')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kapasitas -->
                    <div>
                        <label for="kapasitas" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kapasitas (Orang)</label>
                        <input type="number" name="kapasitas" id="kapasitas" value="{{ old('kapasitas', $laboratorium->kapasitas) }}" min="1" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required>
                        @error('kapasitas')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kondisi -->
                    <div>
                        <label for="kondisi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kondisi Saat Ini</label>
                        <select name="kondisi" id="kondisi" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            <option value="baik" {{ old('kondisi', $laboratorium->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="perbaikan" {{ old('kondisi', $laboratorium->kondisi) == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                            <option value="rusak" {{ old('kondisi', $laboratorium->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                        @error('kondisi')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Fasilitas -->
                <div>
                    <label for="fasilitas" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fasilitas & Deskripsi</label>
                    <textarea name="fasilitas" id="fasilitas" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">{{ old('fasilitas', $laboratorium->fasilitas) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Deskripsikan fasilitas utama di Lab ini.</p>
                    @error('fasilitas')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="pt-4 flex justify-end space-x-3">
                    <a href="{{ route('laboratorium.index') }}" class="px-6 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-semibold rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition transform hover:scale-[1.02]">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection