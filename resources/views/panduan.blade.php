@extends('layouts.public')

@section('title', 'Panduan Penggunaan')

@section('nav-links')
    <a href="{{ route('landing') }}" class="hover:text-primary transition-colors relative group">
        Beranda
        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
    </a>
    <a href="#semua" class="hover:text-primary transition-colors">Semua</a>
    <a href="#mahasiswa" class="hover:text-primary transition-colors">Mahasiswa</a>
    <a href="#dosen" class="hover:text-primary transition-colors">Dosen</a>
    <a href="#admin" class="hover:text-primary transition-colors">Admin</a>
    <a href="{{ route('panduan') }}" class="text-primary transition-colors">Panduan</a>
@endsection

@section('mobile-links')
    <a href="{{ route('landing') }}" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Beranda</a>
    <a href="#semua" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Semua</a>
    <a href="#mahasiswa" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Mahasiswa</a>
    <a href="#dosen" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Dosen</a>
    <a href="#admin" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Admin</a>
@endsection

@section('content')
    <!-- Hero -->
    <header class="bg-gradient-to-br from-blue-600 to-indigo-800 text-white pt-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-16 md:py-20 text-center">
            <p class="text-sm font-bold uppercase tracking-widest text-blue-200 mb-3">Buku Panduan</p>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4">Cara Menggunakan Aplikasi LabKom</h1>
            <p class="text-blue-100 text-base md:text-lg max-w-2xl mx-auto">
                Panduan lengkap untuk Mahasiswa, Dosen, dan Admin LabKom — mulai dari pendaftaran hingga verifikasi peminjaman.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="#semua" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-white text-blue-700 shadow hover:bg-blue-50 transition">Untuk Semua</a>
                <a href="#mahasiswa" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-emerald-500 text-white shadow hover:bg-emerald-600 transition">Mahasiswa</a>
                <a href="#dosen" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-amber-500 text-white shadow hover:bg-amber-600 transition">Dosen</a>
                <a href="#admin" class="px-5 py-2.5 text-sm font-semibold rounded-lg bg-purple-600 text-white shadow hover:bg-purple-700 transition">Admin LabKom</a>
            </div>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-12 space-y-14">

        <!-- ================= SEMUA PENGGUNA ================= -->
        <section id="semua">
            <h2 class="text-2xl font-bold flex items-center gap-2 mb-6">
                <span class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center text-sm">1</span>
                Untuk Semua Pengguna
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-blue-600 dark:text-blue-400">Mendaftar Akun Baru</h3>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Klik tombol <strong>Daftar Sekarang</strong> di halaman beranda.</li>
                        <li>Isi nama lengkap dan email yang aktif.</li>
                        <li>Pilih peran Anda: <strong>Mahasiswa</strong> atau <strong>Dosen</strong>.</li>
                        <li>Isi NIM (mahasiswa) / NIP (dosen) beserta jurusan.</li>
                        <li>Buat password minimal 8 karakter, lalu konfirmasi.</li>
                        <li>Klik <strong>Daftar Sekarang</strong> — Anda langsung masuk ke dashboard.</li>
                    </ol>
                    <div class="mt-4 p-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 text-xs">
                        Akun <strong>Admin LabKom</strong> tidak dapat didaftarkan mandiri — hanya dibuat oleh admin melalui menu Kelola Pengguna.
                    </div>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-blue-600 dark:text-blue-400">Masuk (Login)</h3>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Buka halaman <strong>Masuk</strong>.</li>
                        <li>Isi kolom identitas dengan <strong>email ATAU NIM/NIP</strong>.</li>
                        <li>Isi password, centang <strong>Ingat Saya</strong> jika ingin tetap login.</li>
                        <li>Klik <strong>Masuk Portal</strong>. Anda diarahkan ke dashboard sesuai peran.</li>
                    </ol>
                    <div class="mt-4 p-3 rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-300 text-xs">
                        Lupa identitas atau password? Hubungi Admin LabKom agar akun Anda direset.
                    </div>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700 md:col-span-2">
                    <h3 class="font-semibold text-lg mb-3 text-blue-600 dark:text-blue-400">Lengkapi Profil Anda</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">Setelah login, perbarui profil Anda agar mudah dikenali oleh dosen dan admin:</p>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Klik menu <strong>Profil Saya</strong> di sidebar.</li>
                        <li>Klik <strong>Edit Profil</strong>.</li>
                        <li>Unggah foto profil, isi <em>bio</em> dan nomor HP.</li>
                        <li>Klik <strong>Simpan Perubahan</strong>.</li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- ================= MAHASISWA ================= -->
        <section id="mahasiswa" class="border-t border-gray-200 dark:border-gray-800 pt-12">
            <h2 class="text-2xl font-bold flex items-center gap-2 mb-2">
                <span class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center text-sm">2</span>
                Panduan Mahasiswa
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Sebagai mahasiswa, Anda dapat mengajukan dan memantau peminjaman laboratorium.</p>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <h3 class="font-semibold text-lg mb-3 text-emerald-700 dark:text-emerald-300">Mengajukan Peminjaman</h3>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Di dashboard, klik <strong>Ajukan Peminjaman Baru</strong>.</li>
                        <li>Pilih laboratorium yang tersedia (perhatikan kapasitas & kondisi).</li>
                        <li>Pilih tanggal (tidak bisa mundur) dan jam mulai–selesai.</li>
                        <li>Tuliskan keperluan peminjaman secara jelas.</li>
                        <li>Klik <strong>Ajukan Sekarang</strong>. Status pengajuan menjadi <strong>Menunggu</strong>.</li>
                    </ol>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-emerald-700 dark:text-emerald-300">Memantau Status</h3>
                    <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-disc list-inside">
                        <li><span class="font-semibold text-yellow-600">Menunggu</span> — pengajuan belum diverifikasi dosen.</li>
                        <li><span class="font-semibold text-green-600">Disetujui</span> — peminjaman disetujui, silakan hadir sesuai jadwal.</li>
                        <li><span class="font-semibold text-red-600">Ditolak</span> — periksa catatan/alasan dari dosen, lalu ajukan ulang jika perlu.</li>
                    </ul>
                    <div class="mt-4 p-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 text-xs">
                        Status dapat dilihat di halaman <strong>Peminjaman</strong> dan di ringkasan dashboard Anda.
                    </div>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-emerald-700 dark:text-emerald-300">Membatalkan Pengajuan</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">Pengajuan hanya bisa dibatalkan jika masih berstatus <strong>Menunggu</strong>:</p>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Buka halaman <strong>Peminjaman</strong>.</li>
                        <li>Pada pengajuan berstatus Menunggu, klik ikon <strong>hapus</strong>.</li>
                        <li>Konfirmasi pembatalan pada kotak dialog.</li>
                    </ol>
                </div>
                <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                    <h3 class="font-semibold text-lg mb-3 text-emerald-700 dark:text-emerald-300">Tips</h3>
                    <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-disc list-inside">
                        <li>Pastikan jadwal tidak bentrok dengan kuliah atau peminjaman lain.</li>
                        <li>Ajukan lebih awal agar dosen sempat memverifikasi.</li>
                        <li>NIM/NIP wajib terisi — gunakan untuk login jika lupa email.</li>
                        <li>Jika ditolak, baca catatan dosen lalu perbaiki keperluannya.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ================= DOSEN ================= -->
        <section id="dosen" class="border-t border-gray-200 dark:border-gray-800 pt-12">
            <h2 class="text-2xl font-bold flex items-center gap-2 mb-2">
                <span class="w-8 h-8 rounded-lg bg-amber-500 text-white flex items-center justify-center text-sm">3</span>
                Panduan Dosen
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Sebagai dosen, Anda memverifikasi pengajuan peminjaman dari mahasiswa.</p>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-amber-50 dark:bg-amber-900/20 rounded-xl p-6 border border-amber-200 dark:border-amber-800">
                    <h3 class="font-semibold text-lg mb-3 text-amber-700 dark:text-amber-300">Memverifikasi Pengajuan</h3>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Dashboard menampilkan daftar pengajuan yang <strong>menunggu verifikasi</strong>.</li>
                        <li>Klik tombol <strong>Verifikasi</strong> pada pengajuan yang dipilih.</li>
                        <li>Periksa detail: mahasiswa, lab, tanggal, jam, dan keperluan.</li>
                        <li>Pilih tindakan: <strong>Setujui</strong>, <strong>Tolak</strong>, atau biarkan <strong>Pending</strong>.</li>
                        <li>Isi catatan/alasan (wajib bila menolak). Klik <strong>Simpan Perubahan</strong>.</li>
                    </ol>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-amber-700 dark:text-amber-300">Kelola Data Laboratorium</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">Dosen juga dapat membantu memutakhirkan data laboratorium:</p>
                    <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-disc list-inside">
                        <li>Menu <strong>Data Laboratorium</strong> menampilkan seluruh lab beserta kondisi.</li>
                        <li>Tambah lab baru, edit kapasitas/fasilitas, atau tandai kondisi (<strong>Baik / Perbaikan / Rusak</strong>).</li>
                        <li>Hapus lab bila tidak lagi digunakan (data peminjaman terkait ikut terhapus).</li>
                    </ul>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-amber-700 dark:text-amber-300">Lihat Seluruh Riwayat</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Melalui menu <strong>Peminjaman</strong>, dosen dapat melihat seluruh riwayat peminjaman (semua mahasiswa) termasuk yang sudah disetujui atau ditolak, lengkap dengan nama peminjam dan NIM/NIP-nya.
                    </p>
                </div>
                <div class="bg-amber-50 dark:bg-amber-900/20 rounded-xl p-6 border border-amber-200 dark:border-amber-800">
                    <h3 class="font-semibold text-lg mb-3 text-amber-700 dark:text-amber-300">Tips</h3>
                    <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-disc list-inside">
                        <li>Verifikasi segera agar mahasiswa mendapat kepastian jadwal.</li>
                        <li>Gunakan kolom catatan untuk feedback yang konstruktif.</li>
                        <li>Pastikan kondisi lab diperbarui agar mahasiswa tidak salah pilih.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ================= ADMIN LABKOM ================= -->
        <section id="admin" class="border-t border-gray-200 dark:border-gray-800 pt-12">
            <h2 class="text-2xl font-bold flex items-center gap-2 mb-2">
                <span class="w-8 h-8 rounded-lg bg-purple-600 text-white flex items-center justify-center text-sm">4</span>
                Panduan Admin LabKom
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Sebagai Admin LabKom, Anda memiliki kendali penuh atas pengguna, laboratorium, dan peminjaman.</p>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-purple-50 dark:bg-purple-900/20 rounded-xl p-6 border border-purple-200 dark:border-purple-800">
                    <h3 class="font-semibold text-lg mb-3 text-purple-700 dark:text-purple-300">Kelola Pengguna</h3>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Buka menu <strong>Kelola User</strong>.</li>
                        <li>Klik <strong>Tambah User Baru</strong> untuk membuat akun dosen/mahasiswa.</li>
                        <li>Edit nama, email, peran, NIM/NIP, jurusan, atau ganti password.</li>
                        <li>Hapus akun bila diperlukan (tidak dapat menghapus akun sendiri).</li>
                    </ol>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-purple-700 dark:text-purple-300">Kelola Laboratorium</h3>
                    <ol class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>Buka menu <strong>Data Laboratorium</strong>.</li>
                        <li><strong>Tambah Lab Baru</strong>: nama unik, kapasitas, kondisi, dan fasilitas.</li>
                        <li>Gunakan ikon <strong>edit</strong> untuk mengubah data, ikon <strong>hapus</strong> untuk menghapus.</li>
                    </ol>
                </div>
                <div class="bg-white dark:bg-cardbg rounded-xl p-6 shadow border border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-3 text-purple-700 dark:text-purple-300">Monitor & Verifikasi Peminjaman</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">Dashboard menampilkan statistik: total laboratorium, pengguna, pengajuan disetujui, dan menunggu verifikasi.</p>
                    <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-disc list-inside">
                        <li>Admin dapat <strong>melihat dan memverifikasi</strong> seluruh peminjaman layaknya dosen.</li>
                        <li>Admin dapat <strong>menghapus</strong> peminjaman apa pun.</li>
                    </ul>
                </div>
                <div class="bg-purple-50 dark:bg-purple-900/20 rounded-xl p-6 border border-purple-200 dark:border-purple-800">
                    <h3 class="font-semibold text-lg mb-3 text-purple-700 dark:text-purple-300">Tips</h3>
                    <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300 list-disc list-inside">
                        <li>Perbarui kondisi lab (baik/perbaikan/rusak) secara berkala.</li>
                        <li>Buat akun pengguna secara resmi; admin tidak dapat didaftarkan lewat form publik.</li>
                        <li>Segera tangani pengaduan lupa password dengan mengedit akun terkait.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ================= GLOSARIUM STATUS ================= -->
        <section class="border-t border-gray-200 dark:border-gray-800 pt-12">
            <h2 class="text-2xl font-bold mb-6">Arti Status Peminjaman</h2>
            <div class="grid sm:grid-cols-3 gap-4">
                <div class="rounded-xl p-5 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800">
                    <p class="font-bold text-yellow-700 dark:text-yellow-300 mb-1">● Menunggu</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300">Pengajuan diterima sistem, menunggu verifikasi dosen/admin.</p>
                </div>
                <div class="rounded-xl p-5 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800">
                    <p class="font-bold text-green-700 dark:text-green-300 mb-1">● Disetujui</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300">Peminjaman disetujui. Peminjam dapat menggunakan lab sesuai jadwal.</p>
                </div>
                <div class="rounded-xl p-5 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800">
                    <p class="font-bold text-red-700 dark:text-red-300 mb-1">● Ditolak</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300">Pengajuan ditolak. Periksa catatan dosen lalu ajukan ulang bila perlu.</p>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 md:p-10 text-center text-white shadow-xl">
            <h2 class="text-2xl font-bold mb-2">Siap memulai?</h2>
            <p class="text-blue-100 mb-6">Masuk menggunakan akun Anda, atau daftar jika belum memiliki akun.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-3">
                <a href="{{ route('login') }}" class="px-8 py-3 rounded-xl bg-white text-blue-700 font-semibold shadow hover:bg-blue-50 transition">Masuk Sekarang</a>
                <a href="{{ route('register') }}" class="px-8 py-3 rounded-xl bg-blue-500 hover:bg-blue-400 text-white font-semibold shadow transition">Daftar Akun Baru</a>
            </div>
        </div>
    </main>
@endsection
