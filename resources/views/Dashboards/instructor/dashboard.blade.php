<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseEasy | Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/image/image.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
                    },
                }
            }
        }
    </script>

    <style>
        .icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        /* Smooth, modern scrollbar */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #3b82f6 #1e293b;
            /* thumb + track */
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #1e293b;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }
    </style>
   <style>
    /* Custom Stepper Styles */
    .step-circle {
        @apply w-10 h-10 rounded-full border-2 flex items-center justify-center font-bold transition-all duration-300 z-10 bg-slate-900 border-slate-700 text-slate-500;
    }
    
    .step.active .step-circle {
        @apply border-indigo-500 bg-indigo-500 text-white shadow-[0_0_15px_rgba(99,102,241,0.4)];
    }

    .step.completed .step-circle {
        @apply border-emerald-500 bg-emerald-500 text-white;
    }

    .step-line {
        @apply flex-1 h-0.5 bg-slate-800 mx-4 transition-colors duration-500;
    }

    /* Input focus effects */
    .input-dark:focus {
        @apply border-indigo-500 ring-4 ring-indigo-500/10;
    }
</style>

</head>

<body class="bg-primary-dark text-gray-200 min-h-screen flex flex-col antialiased">

    <!-- NAVBAR -->
    <nav class="bg-purple-900/40 border-b border-purple-700/50 shadow-md sticky top-0 z-50 backdrop-blur-xl">
        <div class="flex justify-between items-center px-6 py-4">

            <!-- Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('home') }}"
                    class="text-3xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                text-transparent bg-clip-text tracking-tight">
                    Course<span class="text-gray-200">Easy</span>
                </a>
                <div class="w-px h-8 bg-purple-600/40"></div>

                <h1
                    class="text-xl font-semibold tracking-wide uppercase
                bg-gradient-to-r from-indigo-400 via-purple-400 to-violet-400
                text-transparent bg-clip-text drop-shadow-sm">
                    Instructor Dashboard
                </h1>
            </div>

            <!-- Mobile -->
            <div class="md:hidden flex items-center space-x-3 flex-1">
                <a href="{{ route('home') }}"
                    class="text-2xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                text-transparent bg-clip-text tracking-tight">
                    Course<span class="text-gray-200">Easy</span>
                </a>

                <div class="w-px h-6 bg-purple-600/40"></div>

                <span
                    class="text-sm font-semibold tracking-wide uppercase
                bg-gradient-to-r from-purple-400 via-violet-400 to-fuchsia-400
                text-transparent bg-clip-text drop-shadow-sm">
                    Instructor Dashboard
                </span>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 rounded-lg text-sm font-semibold
                   bg-gradient-to-r from-pink-500 to-purple-600
                   hover:from-pink-600 hover:to-purple-700
                   text-white shadow-md transition">
                        Logout
                    </button>
                </form>
                <img src="https://i.pravatar.cc/40" class="w-9 h-9 rounded-full border border-purple-600">
            </div>

            <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-md hover:bg-purple-700/40">
                <svg class="w-7 h-7" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </nav>


    <!-- MAIN LAYOUT -->
    <div class="flex flex-col md:flex-row min-h-screen">

        <!-- SIDEBAR (Desktop) -->
        <aside
            class="hidden md:flex w-64 fixed top-16 left-0 h-[calc(100vh-4rem)]
    bg-gradient-to-b from-purple-900/40 via-indigo-950/40 to-purple-900/40
    backdrop-blur-xl
    border-r border-purple-800/40
    shadow-2xl
    p-0">

            <div class="w-full h-full overflow-y-auto p-6 custom-scrollbar">
                @include('Dashboards.instructor.sidebar')
            </div>

        </aside>


        <!-- SIDEBAR (Mobile Drawer) -->
        <aside id="mobileSidebar"
            class="fixed top-16 left-0 w-64 h-[calc(100vh-4rem)] bg-secondary-dark border-r border-gray-700/50 p-6
           transform -translate-x-full transition-all duration-300 z-50 md:hidden">

            @include('Dashboards.instructor.sidebar')
        </aside>



        <!-- SIDEBAR (Mobile Drawer) -->
        <aside id="mobileSidebar"
            class="fixed top-16 left-0 w-64 h-[calc(100vh-4rem)] bg-secondary-dark border-r border-gray-700/50 p-6
                      transform -translate-x-full transition-all duration-300 z-50 md:hidden">

            @include('Dashboards.instructor.sidebar')
        </aside>

        <!-- CONTENT AREA -->
        <main class="flex-1 md:ml-64 p-6 overflow-y-auto">
            @yield('Idash')
        </main>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        function toggleSidebar() {
            document.getElementById('mobileSidebar')
                .classList.toggle('-translate-x-full');
        }
    </script>
    @stack('scriptsdash')
</body>

</html>
