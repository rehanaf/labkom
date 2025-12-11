@extends('layouts.app')

@section('title', 'Tambah Laboratorium')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Laboratorium</h1>
        <a href="{{ route('laboratorium.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="p-8">
            <form action="{{ route('laboratorium.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Lab -->
                <div>
                    <label for="nama_lab" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Laboratorium</label>
                    <input type="text" name="nama_lab" id="nama_lab" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" placeholder="Contoh: Lab Komputer 1" required value="{{ old('nama_lab') }}">
                    @error('nama_lab')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kapasitas -->
                    <div>
                        <label for="kapasitas" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kapasitas (Orang)</label>
                        <input type="number" name="kapasitas" id="kapasitas" min="1" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" required value="{{ old('kapasitas') }}">
                        @error('kapasitas')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kondisi -->
                    <div>
                        <label for="kondisi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kondisi Saat Ini</label>
                        <select name="kondisi" id="kondisi" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="perbaikan" {{ old('kondisi') == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                            <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                        @error('kondisi')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Fasilitas -->
                <div>
                    <label for="fasilitas" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Fasilitas & Deskripsi</label>
                    <textarea name="fasilitas" id="fasilitas" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" placeholder="Sebutkan fasilitas yang tersedia (PC, AC, Proyektor, dll)...">{{ old('fasilitas') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Jelaskan spesifikasi alat yang tersedia di laboratorium ini.</p>
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
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection