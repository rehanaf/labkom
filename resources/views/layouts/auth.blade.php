<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Laboratorium Komputer | @yield('title', 'Masuk')</title>

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
<body class="bg-gray-50 dark:bg-darkbg antialiased">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white dark:bg-darkcard rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            
            <!-- KOLOM KIRI: Branding -->
            <div class="md:w-1/2 bg-gradient-to-br from-blue-600 to-indigo-800 text-white p-8 flex flex-col justify-center items-center space-y-6">
                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-lg flex items-center justify-center text-3xl font-bold">L</div>
                <h1 class="text-3xl font-bold text-center">Sistem Manajemen Laboratorium Terpadu</h1>
                <p class="text-sm text-center opacity-90">
                    "Portal satu pintu untuk seluruh civitas akademika UIN. Akses layanan laboratorium, jadwal, dan verifikasi dalam satu sistem."
                </p>
            </div>

            <!-- KOLOM KANAN: Form -->
            <div class="md:w-1/2 p-8">
                <!-- Dark Mode Toggle -->
                <div class="flex justify-end mb-6">
                    <button id="theme-toggle" class="p-2 rounded-full text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Konten Dinamis (Login / Register) -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Dark Mode Script -->
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

        themeToggleBtn?.addEventListener('click', function () {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
            setIcons();
        });
    </script>
</body>
</html>