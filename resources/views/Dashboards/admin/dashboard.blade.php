<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseEasy | Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/image/image.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        // Softer, more aesthetic dark tones
                        'primary-dark': '#0f172a', // Deep, modern navy-blue (slate-900)
                        'secondary-dark': '#1e293b', // Lighter for cards/sidebar (slate-800)
                        'accent-gold': '#facc15', // Vibrant, slightly deeper gold (amber-400)
                        'accent-blue': '#6366f1', // Soft, modern indigo (indigo-500)
                    },
                    boxShadow: {
                        // Subtle inner shadow for depth
                        'inner-dark': 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.4)',
                    }
                }
            }
        }
    </script>

    <style>
        .icon {
            width: 1.25rem;
            height: 1.25rem;
        }
    </style>
</head>

<body class="bg-primary-dark text-gray-200 min-h-screen flex flex-col antialiased">
    <!-- 🔹 Navbar -->
    <nav class="bg-red-900/40 border-b border-red-700/50 shadow-md sticky top-0 z-50 backdrop-blur-xl">
        <div class="flex justify-between items-center px-6 py-4">

            <!-- Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('home') }}"
                    class="text-3xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                text-transparent bg-clip-text tracking-tight">
                    Course<span class="text-gray-200">Easy</span>
                </a>
                <div class="w-px h-8 bg-red-600/40"></div>

                <h1
                    class="text-xl font-semibold tracking-wide uppercase
                bg-gradient-to-r from-red-400 via-orange-400 to-amber-400
                text-transparent bg-clip-text drop-shadow-sm">
                    Admin Dashboard
                </h1>
            </div>

            <!-- Mobile -->
            <div class="md:hidden flex items-center space-x-3 flex-1">
                <a href="{{ route('home') }}"
                    class="text-2xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                text-transparent bg-clip-text tracking-tight">
                    Course<span class="text-gray-200">Easy</span>
                </a>

                <div class="w-px h-6 bg-red-600/40"></div>

                <span
                    class="text-sm font-semibold tracking-wide uppercase
                bg-gradient-to-r from-red-400 via-orange-400 to-amber-400
                text-transparent bg-clip-text drop-shadow-sm">
                    Admin Dashboard
                </span>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <img src="{{ asset(Auth::user()->photo) }}"
                    class="w-9 h-9 rounded-full object-cover border border-blue-600" alt="Profile">
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-xl font-bold hover:bg-red-600 transition-all duration-300 shadow-md shadow-red-500/30 focus:outline-none focus:ring-4 focus:ring-red-300">
                        Logout
                    </button>
                </form>
            </div>

            <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-md hover:bg-red-700/40">
                <svg class="w-7 h-7" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>
    </nav>


    <!-- 🔹 Main Layout -->
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside
            class="w-full md:w-64 
    bg-gradient-to-b from-red-900/40 via-amber-950/40 to-red-900/40
    backdrop-blur-xl
    border-r border-red-800/40 
    shadow-2xl 
    p-6 md:sticky md:top-16
    h-auto md:h-[calc(100vh-4rem)]
    transition-all duration-300">

            <nav class="space-y-3">

                <!-- Dashboard -->
                <a href="{{ route('dashboard.admin.home') }}"
                    class="flex items-center space-x-3 p-3 rounded-xl 
        {{ request()->routeIs('dashboard.admin.home')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">

                    <svg class="icon" ...> ... </svg>
                    <span>Dashboard</span>
                </a>

                <!-- User Management -->
                <a href="{{ route('dashboard.admin.users') }}"
                    class="flex items-center space-x-3 p-3 rounded-xl 
        {{ request()->routeIs('dashboard.admin.users')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                    <svg class="icon" ...> ... </svg>
                    <span>User Management</span>
                </a>

                <!-- Content Approval -->
                <a href="{{ route('dashboard.admin.content') }}"
                    class="flex items-center space-x-3 p-3 rounded-xl 
        {{ request()->routeIs('dashboard.admin.content')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                    <svg class="icon" ...> ... </svg>
                    <span>Content Approval</span>
                </a>

                <!-- Financials -->
                <a href="{{ route('dashboard.admin.financials') }}"
                    class="flex items-center space-x-3 p-3 rounded-xl 
        {{ request()->routeIs('dashboard.admin.financials')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                    <svg class="icon" ...> ... </svg>
                    <span>Financials & Audit</span>
                </a>

                <div class="h-px bg-gray-700/50 my-6"></div>

                <!-- System Logs -->
                <a href="{{ route('dashboard.admin.logs') }}"
                    class="flex items-center space-x-3 p-3 rounded-xl 
        {{ request()->routeIs('dashboard.admin.logs')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                    <svg class="icon" ...> ... </svg>
                    <span>System Logs</span>
                </a>

            </nav>


            <div class="mt-10 p-4 bg-accent-red/20 border border-accent-red rounded-xl text-center shadow-xl-red">
                <p class="text-sm font-bold text-accent-red">⚠️ Critical Alert</p>
                <p class="text-xs text-gray-300 mt-1">5+ Instructor Payouts Pending</p>
                <button
                    class="mt-2 text-xs font-semibold text-white bg-accent-red py-1 px-3 rounded-full hover:bg-red-700">Resolve
                    Now</button>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('Adash')
        </main>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('menuBtn').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>


</body>



</html>
