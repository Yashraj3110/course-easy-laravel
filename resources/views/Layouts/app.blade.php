<!DOCTYPE html>
<html id="html" lang="en" class="scroll-smooth transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Easy | Modern Online Learning</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/image/image.png') }}">



    <!-- 🩶 Apply theme BEFORE Tailwind loads -->
    <script>
        (() => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <!-- ✅ Tailwind should load AFTER theme script -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- If Alpine.js is not already loaded -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#0f172a',
                        'secondary-dark': '#1e293b',
                        'accent-gold': '#facc15',
                        'accent-blue': '#6366f1',
                        'active-blue': '#374151',
                    },
                    boxShadow: {
                        'lg-dark': '0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.1)',
                    },
                },
            },
        };
    </script>
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Notyf JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #4f46e5;
            border-radius: 4px;
        }

        body::-webkit-scrollbar-track {
            background: #1f2937;
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-300">

    <!-- 🌞 Light Mode Button -->
    <button id="light-btn"
        class="fixed bottom-6 right-6 z-[9999] p-3 rounded-full shadow-lg backdrop-blur-md
           bg-white/70 border border-gray-300 transition-all duration-300
           hover:scale-110 hover:shadow-xl hover:bg-white dark:hidden">
        <i data-lucide="moon" class="w-6 h-6 text-gray-900"></i>
    </button>

    <!-- 🌙 Dark Mode Button -->
    <button id="dark-btn"
        class="fixed bottom-6 right-6 z-[9999] p-3 rounded-full shadow-lg backdrop-blur-md
           bg-gray-800/70 border border-gray-700 transition-all duration-300
           hover:scale-110 hover:shadow-xl hover:bg-gray-700 hidden dark:flex">
        <i data-lucide="sun" class="w-6 h-6 text-yellow-400"></i>
    </button>

    @include('pages.navbar')

    <main>
        @yield('content')
    </main>

    @include('pages.footer')

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            const htmlEl = document.getElementById('html');
            const lightBtn = document.getElementById('light-btn');
            const darkBtn = document.getElementById('dark-btn');

            // 🌗 Load saved theme
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                htmlEl.classList.add('dark');
                lightBtn.classList.add('hidden');
                darkBtn.classList.remove('hidden');
            } else {
                htmlEl.classList.remove('dark');
                darkBtn.classList.add('hidden');
                lightBtn.classList.remove('hidden');
            }

            // 🌙 Light Mode → Dark Mode
            lightBtn.addEventListener('click', () => {
                htmlEl.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                lightBtn.classList.add('hidden');
                darkBtn.classList.remove('hidden');
            });

            // 🌞 Dark Mode → Light Mode
            darkBtn.addEventListener('click', () => {
                htmlEl.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                darkBtn.classList.add('hidden');
                lightBtn.classList.remove('hidden');
            });
        });
    </script>
</body>

</html>
