@extends('layouts.app')

@section('title', 'Verifikasi Peminjaman')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Verifikasi Peminjaman #{{ $peminjaman->id }}</h1>
        <a href="{{ route('peminjaman.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
            &larr; Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Kolom Kiri: Detail Pengajuan (Read-Only) -->
        <div class="md:col-span-2 bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b border-gray-100 dark:border-gray-700 pb-2">Detail Pengajuan</h3>
            
            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Peminjam</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white font-semibold">{{ $peminjaman->user->name }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">NIM / NIP</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $peminjaman->user->nim_nip }}</dd>
                </div>
                
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Laboratorium</dt>
                    <dd class="mt-1 text-sm text-indigo-600 dark:text-indigo-400 font-bold">{{ $peminjaman->laboratorium->nama_lab }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('d F Y') }}</dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Waktu</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                        {{ \Carbon\Carbon::parse($peminjaman->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($peminjaman->jam_selesai)->format('H:i') }}
                    </dd>
                </div>
                
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Keperluan</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg border border-gray-100 dark:border-gray-600">
                        {{ $peminjaman->keperluan }}
                    </dd>
                </div>
            </dl>
        </div>

        <!-- Kolom Kanan: Form Verifikasi -->
        <div class="md:col-span-1 bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 p-6 h-fit">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 border-b border-gray-100 dark:border-gray-700 pb-2">Tindakan</h3>

            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ubah Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                        <option value="pending" {{ $peminjaman->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $peminjaman->status == 'approved' ? 'selected' : '' }}>Setujui (Approved)</option>
                        <option value="rejected" {{ $peminjaman->status == 'rejected' ? 'selected' : '' }}>Tolak (Rejected)</option>
                    </select>
                </div>

                <!-- Keterangan Dosen (Opsional) -->
                <div>
                    <label for="keterangan_dosen" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Catatan / Alasan</label>
                    <textarea name="keterangan_dosen" id="keterangan_dosen" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" placeholder="Berikan alasan jika ditolak, atau catatan tambahan...">{{ old('keterangan_dosen', $peminjaman->keterangan_dosen) }}</textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition transform hover:scale-[1.02]">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection