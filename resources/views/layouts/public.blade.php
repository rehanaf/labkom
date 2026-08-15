<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laboratorium Komputer | @yield('title', 'LabKom')</title>

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Konfigurasi Custom Tailwind -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#2563EB', // Blue 600
                            dark: '#1E40AF',    // Blue 800
                            glow: '#3B82F6',    // Blue 500
                        },
                        darkbg: '#0B1121', // Latar belakang sangat gelap (Dark Mode)
                        cardbg: '#111827', // Gray 900 (Latar belakang Nav/Card gelap)
                        lightbg: '#F3F4F6', // Latar belakang Light Mode
                        lightcard: '#FFFFFF', // Card Light Mode
                    },
                    fontFamily: {
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

        /* --- Styling Mode (warna literal agar selalu konsisten di dark mode) --- */
        body {
            background-color: #F3F4F6;
            color: #111827;
            font-family: 'Poppins', sans-serif;
        }
        .header-bg { background-color: rgba(255, 255, 255, 0.9); border-bottom: 1px solid #E5E7EB; }

        .dark body { background-color: #0B1121; color: #ffffff; }
        .dark .header-bg { background-color: rgba(11, 17, 33, 0.9); border-bottom: 1px solid rgba(255, 255, 255, 0.05); }

        .hero-text { color: #111827; }
        .dark .hero-text { color: #ffffff; }
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
                <a href="{{ route('landing') }}" class="flex items-center gap-3 cursor-pointer">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center shadow-lg shadow-primary/30">
                        <span class="text-white font-bold text-xl">L</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg leading-tight tracking-wide text-gray-900 dark:text-white">LAB KOMPUTER</span>
                        <span class="text-[10px] text-gray-500 dark:text-gray-400 uppercase tracking-widest">Sistem Informasi Lab</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-600 dark:text-gray-300">
                    @yield('nav-links')
                </div>

                <!-- Right Actions (Toggle, Login, Register) -->
                <div class="flex items-center space-x-4">
                    <!-- Dark/Light Toggle -->
                    <button id="theme-toggle" class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-white/10 transition-colors">
                        <span id="theme-icon">
                            <!-- Default icon (Moon) -->
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        </span>
                    </button>

                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary transition-colors hidden sm:block">Masuk</a>

                    <a href="{{ route('register') }}" class="hidden sm:block px-5 py-2.5 text-sm font-medium rounded-lg bg-primary hover:bg-primary-dark text-white shadow-lg shadow-primary/25 transition-all transform hover:scale-105">
                        Daftar Sekarang
                    </a>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-cardbg border-b border-gray-200 dark:border-white/10 px-4 py-4 space-y-3">
            @yield('mobile-links')
            <div class="border-t border-gray-200 dark:border-gray-700 pt-3 mt-2 space-y-3">
                <a href="{{ route('register') }}" class="block w-full text-center bg-primary hover:bg-primary-dark text-white font-medium rounded-lg px-4 py-2.5 transition-all">
                    Daftar Sekarang
                </a>
                <a href="{{ route('login') }}" class="block w-full text-center text-gray-700 dark:text-gray-300 hover:text-primary">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    @yield('content')

    <!-- Footer Detail -->
    <footer class="bg-white dark:bg-cardbg border-t border-gray-200 dark:border-white/5 transition-colors duration-300 mt-auto">
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
                        <li><a href="{{ route('landing') }}#beranda" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="{{ route('landing') }}#fitur" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Fitur</a></li>
                        <li><a href="{{ route('landing') }}#fasilitas" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Fasilitas Lab</a></li>
                        <li><a href="{{ route('panduan') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary transition-colors">Panduan Penggunaan</a></li>
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
            htmlElement.classList.remove('dark');
            updateThemeIcon(false);
        }

        if (themeToggle) {
            themeToggle.addEventListener('click', toggleTheme);
        }
    </script>
</body>
</html>
