<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laboratorium Komputer | Kelompok 7</title>
    
    <!-- Tailwind CSS (Menggunakan CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Konfigurasi Custom Tailwind (Menggunakan warna yang mendekati referensi) -->
    <script>
        tailwind.config = {
            // Mengaktifkan dark mode menggunakan class 'dark' di elemen <html>
            darkMode: 'class', 
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#2563EB', // Blue 600
                            dark: '#1E40AF',    // Blue 800
                            glow: '#3B82F6',    // Blue 500
                        },
                        darkbg: '#0B1121', // Latar belakang sangat gelap (Dark Mode)
                        cardbg: '#111827', // Gray 900 (Latar belakang Nav/Card gelap)
                        lightbg: '#F3F4F6', // Latar belakang Light Mode
                        lightcard: '#FFFFFF', // Card Light Mode
                    },
                    fontFamily: {
                        // Menggunakan Poppins sesuai permintaan sebelumnya
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Efek Glow Background (Hanya di Dark Mode) */
        .glow-bg {
            background: radial-gradient(circle at center, rgba(37, 99, 235, 0.15) 0%, rgba(11, 17, 33, 0) 70%);
        }
        /* Gradient untuk teks "Cerdas & Terintegrasi" */
        .text-gradient {
            background: linear-gradient(to right, #3B82F6, #8B5CF6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- Styling Mode --- */
        /* Body Default (Light Mode) */
        body { 
            background-color: var(--tw-colors-lightbg); 
            color: var(--tw-colors-gray-900); 
            font-family: 'Poppins', sans-serif;
        }
        .header-bg { background-color: rgba(255, 255, 255, 0.9); border-bottom: 1px solid #E5E7EB; }
        
        /* Dark Mode */
        .dark body { background-color: var(--tw-colors-darkbg); color: white; }
        .dark .header-bg { background-color: rgba(11, 17, 33, 0.9); border-bottom: 1px solid rgba(255, 255, 255, 0.05); }

        /* Teks Utama di Hero (Dark in Light Mode, White in Dark Mode) */
        .hero-text {
            color: var(--tw-colors-gray-900);
        }
        .dark .hero-text {
            color: white;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col relative overflow-x-hidden transition-colors duration-300">

    <!-- Background Glow Effects (Hanya terlihat di Dark Mode) -->
    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-[600px] glow-bg -z-10 pointer-events-none hidden dark:block"></div>
    
    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 backdrop-blur-md header-bg" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo Section -->
                <div class="flex items-center gap-3 cursor-pointer">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center shadow-lg shadow-primary/30">
                        <span class="text-white font-bold text-xl">L</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg leading-tight tracking-wide text-gray-900 dark:text-white">LAB KOMPUTER</span>
                        <span class="text-[10px] text-gray-500 dark:text-gray-400 uppercase tracking-widest">Sistem Informasi Lab</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-600 dark:text-gray-300">
                    <a href="#beranda" class="hover:text-primary transition-colors relative group">
                        Beranda
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#fitur" class="hover:text-primary transition-colors">Fitur</a>
                    <a href="#fasilitas" class="hover:text-primary transition-colors">Fasilitas</a>
                </div>

                <!-- Right Actions (Dark Mode, Login, Register) -->
                <div class="flex items-center space-x-4">
                    <!-- Dark/Light Toggle -->
                    <button id="theme-toggle" class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-white/10 transition-colors">
                        <span id="theme-icon">
                            <!-- Default icon (Moon) -->
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        </span>
                    </button>

                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary transition-colors hidden sm:block">Masuk</a>
                    
                    <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-medium rounded-lg bg-primary hover:bg-primary-dark text-white shadow-lg shadow-primary/25 transition-all transform hover:scale-105">
                        Daftar Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-cardbg border-b border-gray-200 dark:border-white/10 px-4 py-4 space-y-3">
             <a href="#beranda" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Beranda</a>
            <a href="#fitur" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Fitur</a>
            <a href="#fasilitas" class="block text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-white/5 px-3 py-2 rounded-md">Fasilitas</a>
            <div class="border-t border-gray-200 dark:border-gray-700 pt-3 mt-2">
                <a href="{{ route('login') }}" class="block w-full text-center text-gray-700 dark:text-gray-300 hover:text-primary mb-3">Masuk</a>
            </div>
        </div>
    </nav>

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
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3 .895 3 2s-1.343 2-3 2-3-.895-3-2 1.343-2 3-2zM9 16h6M9 20h6M7 14h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v7a2 2 0 002 2z"></path></svg>
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
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-2.414-2.414A1 1 0 0015.586 6H7a2 2 0 00-2 2v11a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Kelola Aset & Kondisi</h3>
                    <p class="text-gray-600 dark:text-gray-400">Admin LabKom dapat mengelola data laboratorium, kapasitas, fasilitas, dan status kondisi (baik/rusak).</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section 3: Fasilitas Statis -->
    <!-- PERBAIKAN: Menggunakan bg-lightbg di light mode untuk section ini -->
    <section id="fasilitas" class="py-20 bg-lightbg dark:bg-darkbg transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8">50+ Laboratorium yang Dapat Anda Pinjam</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Lab Card 1 -->
                <div class="p-6 rounded-xl shadow-lg bg-white dark:bg-cardbg transition-colors duration-300 border border-gray-200 dark:border-gray-700">
                    <h4 class="text-xl font-bold text-blue-600 dark:text-blue-400">Lab Pemrograman Dasar</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Kapasitas: 40 Orang</p>
                    <ul class="text-left text-gray-700 dark:text-gray-300 text-sm list-disc ml-4 space-y-1">
                        <li>PC i7 Generasi Terbaru</li>
                        <li>OS Multi-Boot (Linux/Win)</li>
                        <li>Proyektor HD</li>
                    </ul>
                </div>
                <!-- Lab Card 2 -->
                <div class="p-6 rounded-xl shadow-lg bg-white dark:bg-cardbg transition-colors duration-300 border border-gray-200 dark:border-gray-700">
                    <h4 class="text-xl font-bold text-purple-600 dark:text-purple-400">Lab Jaringan & Keamanan</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Kapasitas: 25 Orang</p>
                    <ul class="text-left text-gray-700 dark:text-gray-300 text-sm list-disc ml-4 space-y-1">
                        <li>Router & Switch Cisco</li>
                        <li>Kabel Jaringan Lengkap</li>
                        <li>Server Simulasi</li>
                    </ul>
                </div>
                <!-- Lab Card 3 -->
                <div class="p-6 rounded-xl shadow-lg bg-white dark:bg-cardbg transition-colors duration-300 border border-gray-200 dark:border-gray-700">
                    <h4 class="text-xl font-bold text-green-600 dark:text-green-400">Lab Multimedia & Grafis</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Kapasitas: 30 Orang</p>
                    <ul class="text-left text-gray-700 dark:text-gray-300 text-sm list-disc ml-4 space-y-1">
                        <li>PC Workstation High-Spec</li>
                        <li>Software Editing Lengkap</li>
                        <li>Monitor Kalibrasi Warna</li>
                    </ul>
                </div>
                <!-- Lab Card 4 -->
                <div class="p-6 rounded-xl shadow-lg bg-white dark:bg-cardbg transition-colors duration-300 border border-gray-200 dark:border-gray-700">
                    <h4 class="text-xl font-bold text-red-600 dark:text-red-400">Lab Data Science</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Kapasitas: 20 Orang</p>
                    <ul class="text-left text-gray-700 dark:text-gray-300 text-sm list-disc ml-4 space-y-1">
                        <li>GPU Accelerated Computing</li>
                        <li>Akses Cluster Server</li>
                        <li>Software Analisis Lanjutan</li>
                    </ul>
                </div>
            </div>
            
            <p class="mt-10 text-gray-600 dark:text-gray-400">Lihat detail ketersediaan dan booking setelah <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">Masuk</a>.</p>
        </div>
    </section>

    <!-- Footer Detail -->
    <footer class="bg-white dark:bg-cardbg border-t border-gray-200 dark:border-white/5 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Kolom 1: Logo & Deskripsi -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold">L</span>
                        </div>
                        <span class="font-bold text-lg text-gray-900 dark:text-white">LABKOM</span>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Sistem informasi manajemen laboratorium terintegrasi untuk mendukung kegiatan akademik dan praktikum.</p>
                </div>

                <!-- Kolom 2: Navigasi Cepat -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#beranda" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="#fitur" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Fitur</a></li>
                        <li><a href="#fasilitas" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Fasilitas Lab</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Login / Masuk</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak & Dukungan -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Anggota Kelompok</h4>
                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="https://github.com/mtiarajlgita" class="hover:text-primary transition-colors">Mutiara Joni Legita</a></li>
                        <li><a href="https://github.com/CaesarRaja" class="hover:text-primary transition-colors">Caesar Raja Yusri</a></li>
                        <li><a href="https://github.com/Yawad38" class="hover:text-primary transition-colors">M. Yawad Arrahman</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Legal -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Jobdesk</h4>
                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="https://roadmap.sh/backend" class="hover:text-primary transition-colors">Back End Developer</a></li>
                        <li><a href="https://roadmap.sh/frontend" class="hover:text-primary transition-colors">Front End Developer</a></li>
                        <li><a href="https://roadmap.sh/sql" class="hover:text-primary transition-colors">Database Administrator</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-white/10 text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm">&copy; {{ date('Y') }} LabKom UIN. All rights reserved. Dibuat dengan Laravel & Tailwind CSS.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle Logic
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Dark/Light Mode Logic
        const themeToggle = document.getElementById('theme-toggle');
        const htmlElement = document.documentElement;
        const themeIcon = document.getElementById('theme-icon');

        function updateThemeIcon(isDark) {
            themeIcon.innerHTML = isDark 
                ? '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z"></path></svg>'
                : '<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>';
        }

        function toggleTheme() {
            const isDark = htmlElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateThemeIcon(isDark);
        }

        // Cek tema saat load
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            htmlElement.classList.add('dark');
            updateThemeIcon(true);
        } else {
            htmlElement.classList.remove('dark'); // Penting: memastikan tidak ada dark class di light mode
            updateThemeIcon(false);
        }

        if (themeToggle) {
            themeToggle.addEventListener('click', toggleTheme);
        }
    </script>
</body>
</html>