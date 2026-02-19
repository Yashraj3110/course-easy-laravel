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
</head>

<body class="bg-primary-dark text-gray-200 min-h-screen flex flex-col antialiased">
    <!-- 🔹 Navbar -->
    <nav class="bg-blue-900/40 border-b border-blue-700/50 shadow-md sticky top-0 z-50 backdrop-blur-xl">
        <div class="flex justify-between items-center px-6 py-4">

            <!-- Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('home') }}"
                    class="text-3xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                text-transparent bg-clip-text tracking-tight">
                    Course<span class="text-gray-200">Easy</span>
                </a>
                <div class="w-px h-8 bg-blue-600/40"></div>

                <h1
                    class="text-xl font-semibold tracking-wide uppercase
                bg-gradient-to-r from-blue-400 via-cyan-400 to-green-400
                text-transparent bg-clip-text drop-shadow-sm">
                    Student Dashboard
                </h1>
            </div>

            <!-- Mobile -->
            <div class="md:hidden flex items-center space-x-3 flex-1">
                <a href="{{ route('home') }}"
                    class="text-2xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                text-transparent bg-clip-text tracking-tight">
                    Course<span class="text-gray-200">Easy</span>
                </a>

                <div class="w-px h-6 bg-blue-600/40"></div>

                <span
                    class="text-sm font-semibold tracking-wide uppercase
                bg-gradient-to-r from-blue-400 via-cyan-400 to-green-400
                text-transparent bg-clip-text drop-shadow-sm">
                    Student Dashboard
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

            <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-md hover:bg-blue-700/40">
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
            class="hidden md:flex w-64 fixed top-16 left-0 h-[calc(100vh-4rem)]
    bg-gradient-to-b from-blue-900/40 via-blue-950/40 to-blue-900/40
    backdrop-blur-xl
    border-r border-blue-800/40
    shadow-2xl
    p-0">


            <div class="w-full h-full overflow-y-auto p-6 custom-scrollbar">

                <nav class="space-y-2">

                    <!-- Dashboard -->
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard.student.home') }}"
                        class="flex items-center space-x-3 p-3 rounded-xl transition duration-200
        {{ request()->routeIs('dashboard.student.home')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                        <svg class="icon w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.55l7.5-3.75 7.5 3.75V3M18.75 6.75l-7.5 3.75-7.5-3.75" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- My Courses -->
                    <a href="{{ route('dashboard.student.courses') }}"
                        class="flex items-center space-x-3 p-3 rounded-xl transition duration-200
        {{ request()->routeIs('dashboard.student.courses')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                        <svg class="icon w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 006 3.75c-4.18 0-7.5 2.193-7.5 5.25 0 2.433 1.8 4.47 4.394 5.093l-.326 3.193a.75.75 0 001.076.626l1.62-1.079A9 9 0 0012 18z" />
                        </svg>
                        <span>My Courses</span>
                    </a>

                    <!-- Certificates -->
                    <a href="{{ route('dashboard.student.certificates') }}"
                        class="flex items-center space-x-3 p-3 rounded-xl transition duration-200
        {{ request()->routeIs('dashboard.student.certificates')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                        <svg class="icon w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-3.75H4.5m4.5-3H4.5m4.5-3H4.5m4.5-3H4.5M18 19.5a2.25 2.25 0 002.25-2.25V5.25A2.25 2.25 0 0018 3H6a2.25 2.25 0 00-2.25 2.25v12A2.25 2.25 0 006 19.5h12zm-8.25-3.75h-.008v.008H9.75v-.008zM12 21.75a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" />
                        </svg>
                        <span>Certificates</span>
                    </a>

                    <!-- Discussions -->
                    <a href="{{ route('dashboard.student.discussions') }}"
                        class="flex items-center space-x-3 p-3 rounded-xl transition duration-200
        {{ request()->routeIs('dashboard.student.discussions')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                        <svg class="icon w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21L15 15M10.5 5a5.5 5.5 0 110 11 5.5 5.5 0 010-11z" />
                        </svg>
                        <span>Discussions</span>
                    </a>

                    <div class="h-px bg-gray-700/50 my-6"></div>

                    <!-- Settings -->
                    <a href="{{ route('dashboard.student.settings') }}"
                        class="flex items-center space-x-3 p-3 rounded-xl transition duration-200
        {{ request()->routeIs('dashboard.student.settings')
            ? 'bg-accent-blue/20 text-accent-gold font-semibold ring-2 ring-accent-blue/70'
            : 'text-gray-400 hover:bg-gray-700/50 hover:text-white' }}">
                        <svg class="icon w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0M3.75 18H7.5" />
                        </svg>
                        <span>Settings</span>
                    </a>

                </nav>
            </div>

        </aside>


        <!-- Content -->

        <main class="flex-1 md:ml-64 p-6 overflow-y-auto">
            @yield('Sdash')
        </main>
    </div>

    {{-- <script>
        // Mobile menu toggle
        document.getElementById('menuBtn').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script> --}}

    @stack('scripts')
</body>



</html>
