<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laboratorium Komputer | @yield('title', 'Kelompok 7')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        primary: '#2563EB',
                        darkbg: '#0F172A',
                        darkcard: '#1E293B',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }
    </style>

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-darkbg text-gray-900 dark:text-gray-100 antialiased">

    @if (!Auth::check())
        <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-darkbg">
            <div class="text-center">
                <p class="text-gray-600 dark:text-gray-300">Anda harus login terlebih dahulu.</p>
                <a href="{{ route('login') }}" class="mt-4 inline-block text-blue-600 hover:underline dark:text-blue-400">Kembali ke Login</a>
            </div>
        </div>
        @php return; @endphp
    @endif

    <div class="flex h-screen overflow-hidden">
        <!-- OVERLAY (Mobile Offcanvas) -->
        <div id="sidebar-backdrop" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden"></div>

        <!-- SIDEBAR (Offcanvas di mobile, statis di desktop) -->
        <aside id="sidebar" class="w-64 bg-white dark:bg-darkcard border-r border-gray-200 dark:border-gray-700 flex flex-col fixed inset-y-0 left-0 z-40 -translate-x-full transition-transform duration-300 md:static md:translate-x-0 md:z-auto">
            <div class="h-16 flex items-center px-6 border-b border-gray-200 dark:border-gray-700">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold mr-3">L</div>
                <span class="text-lg font-bold tracking-wide">LABKOM</span>
            </div>

            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Dashboard
                </a>

                @if(Auth::user()->role === 'admin_labkom')
                <a href="{{ route('users.index') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('users.*') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('users.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Kelola User
                </a>
                @endif

                @if(in_array(Auth::user()->role, ['admin_labkom', 'dosen']))
                <a href="{{ route('laboratorium.index') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('laboratorium.*') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('laboratorium.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                    Data Laboratorium
                </a>
                @endif

                <a href="{{ route('peminjaman.index') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('peminjaman.*') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('peminjaman.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Peminjaman
                </a>

                <!-- ✅ Profil Saya — POSISI YANG TEPAT DI DALAM NAV -->
                <a href="{{ route('profile.show') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('profile.*') ? 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('profile.*') ? 'text-blue-600 dark:text-blue-400' : 'text-gray-400 group-hover:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
    Profil Saya
</a>
            </nav>

           <!-- User Info (Bottom Sidebar) -->
<div class="border-t border-gray-200 dark:border-gray-700 p-4">
    <div class="flex items-center">
        <!-- Avatar -->
        @if(Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                 alt="{{ Auth::user()->name }}"
                 class="w-9 h-9 rounded-full object-cover border-2 border-blue-500 shadow-md">
        @else
            <div class="w-9 h-9 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-sm font-bold text-gray-700 dark:text-white">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        @endif

        <div class="ml-3">
            <p class="text-sm font-medium text-gray-900 dark:text-white truncate w-32">{{ Auth::user()->name }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 capitalize">
                {{ str_replace('_', ' ', Auth::user()->role) }}
            </p>
        </div>
    </div>
</div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 flex items-center justify-between px-6 bg-white dark:bg-darkcard border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3 md:hidden">
                    <button id="sidebar-toggle" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none" aria-label="Buka menu">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                    <span class="font-bold text-lg">LabKom</span>
                </div>
                <div class="flex items-center space-x-4 ml-auto">
                    <button id="theme-toggle" class="p-2 rounded-full text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"/>
                        </svg>
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                    </button>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                            Keluar
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-darkbg">
                @if(session('success'))
                    <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-200 text-green-700 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-200 text-red-700 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        function setIcons() {
            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcon?.classList.remove('hidden');
                themeToggleDarkIcon?.classList.add('hidden');
            } else {
                themeToggleLightIcon?.classList.add('hidden');
                themeToggleDarkIcon?.classList.remove('hidden');
            }
        }

        setIcons();

        themeToggleBtn?.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
            setIcons();
        });

        // Offcanvas Sidebar (Mobile)
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarBackdrop = document.getElementById('sidebar-backdrop');

        function openSidebar() {
            sidebar?.classList.remove('-translate-x-full');
            sidebarBackdrop?.classList.remove('hidden');
        }
        function closeSidebar() {
            sidebar?.classList.add('-translate-x-full');
            sidebarBackdrop?.classList.add('hidden');
        }
        sidebarToggle?.addEventListener('click', openSidebar);
        sidebarBackdrop?.addEventListener('click', closeSidebar);
    </script>
</body>
</html>