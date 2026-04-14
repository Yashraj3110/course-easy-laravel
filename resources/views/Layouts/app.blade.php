<!DOCTYPE html>
<html id="html" lang="en" class="scroll-smooth transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Easy | Modern Laboratory of Learning</title>
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

    <!-- ✅ Tailwind & Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#050505',
                        'secondary-dark': '#0d0d0d',
                        'accent-gold': '#facc15',
                        'accent-indigo': '#4f46e5',
                        'active-blue': '#374151',
                    },
                    boxShadow: {
                        'premium': '0 20px 50px rgba(0, 0, 0, 0.4)',
                    },
                },
            },
        };
    </script>
    
    <!-- Dependencies -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        @font-face {
            font-family: 'CabinetGrotesk';
            src: url('https://api.fontshare.com/v2/fonts/cabinet-grotesk?display=swap');
        }

        body {
            font-family: 'CabinetGrotesk', 'Inter', sans-serif;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        html {
            overflow-x: hidden;
            scrollbar-width: none; /* Firefox */
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            display: none;
        }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-white dark:bg-[#050505] text-gray-900 dark:text-gray-100 transition-colors duration-300 antialiased">

    <!-- 🌞 Mode Controls (Tactical Floating) -->
    <div class="fixed bottom-10 right-10 z-[9999] flex flex-col gap-3">
        <button id="theme-toggle"
            class="p-4 rounded-[1.2rem] shadow-premium backdrop-blur-3xl
               bg-white/10 dark:bg-black/10 border border-black/5 dark:border-white/5 transition-all duration-500
               hover:scale-110 group active:scale-95">
            <i data-lucide="sun" class="w-5 h-5 text-yellow-500 hidden dark:block"></i>
            <i data-lucide="moon" class="w-5 h-5 text-indigo-600 dark:hidden"></i>
        </button>
    </div>

    @include('pages.navbar')

    <main>
        @yield('content')
    </main>

    @if(!Route::is('student.course.learn'))
        @include('pages.footer')
    @endif

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
            AOS.init({ duration: 800, once: true });

            const htmlEl = document.documentElement;
            const themeToggle = document.getElementById('theme-toggle');

            themeToggle.addEventListener('click', () => {
                const isDark = htmlEl.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                lucide.createIcons();
            });
        });
    </script>
</body>

</html>
