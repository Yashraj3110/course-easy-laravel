<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseEasy | Student Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/image/image.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

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
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 10px;
        }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-primary-dark text-gray-200 min-h-screen antialiased flex flex-col">

    <!-- Top Navigation -->
    <nav class="sticky top-0 z-50 bg-primary-dark/80 backdrop-blur-xl border-b border-gray-800 px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-accent-blue rounded-xl flex items-center justify-center shadow-lg shadow-accent-blue/20">
                    <i data-lucide="graduation-cap" class="text-white w-6 h-6"></i>
                </div>
                <span class="text-2xl font-black text-white tracking-tighter">CourseEasy</span>
            </a>
            
            <div class="hidden lg:flex items-center gap-1 bg-secondary-dark rounded-xl p-1 border border-gray-700">
                <a href="{{ route('courses') }}" class="px-4 py-2 text-sm font-bold text-gray-400 hover:text-white transition">Explore</a>
                <a href="#" class="px-4 py-2 bg-gray-700 text-sm font-bold text-white rounded-lg shadow-sm">My Learning</a>
            </div>
        </div>

        <div class="flex items-center gap-6">
            <div class="hidden sm:flex flex-col items-end">
                <span class="text-sm font-bold text-white leading-none">{{ Auth::user()->name }}</span>
                <span class="text-[10px] font-black text-accent-gold uppercase tracking-widest mt-1">Student Pioneer</span>
            </div>
            <div class="relative group">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff" 
                     class="w-10 h-10 rounded-xl border-2 border-gray-700 group-hover:border-accent-blue transition cursor-pointer">
                
                <!-- Dropdown -->
                <div class="absolute right-0 mt-3 w-56 bg-secondary-dark border border-gray-700 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-2">
                    <a href="{{ route('dashboard.student.profile') }}" class="flex items-center gap-3 p-3 text-sm font-medium hover:bg-gray-700 rounded-xl transition text-gray-300">
                        <i data-lucide="user" class="w-4 h-4 text-accent-blue"></i> Profile
                    </a>
                    <a href="{{ route('dashboard.student.settings') }}" class="flex items-center gap-3 p-3 text-sm font-medium hover:bg-gray-700 rounded-xl transition text-gray-300">
                        <i data-lucide="settings" class="w-4 h-4 text-accent-blue"></i> Account Settings
                    </a>
                    <div class="h-px bg-gray-700 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 p-3 text-sm font-bold text-red-400 hover:bg-red-500/10 rounded-xl transition">
                            <i data-lucide="log-out" class="w-4 h-4"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="hidden md:flex flex-col w-64 bg-primary-dark border-r border-gray-800 p-6">
            <nav class="space-y-2 flex-1">
                <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4">Main Menu</p>
                
                @php
                    $menuItems = [
                        ['route' => 'dashboard.student.home', 'icon' => 'layout-dashboard', 'label' => 'Dashboard'],
                        ['route' => 'dashboard.student.courses', 'icon' => 'book-open', 'label' => 'My Courses'],
                        ['route' => 'dashboard.student.certificates', 'icon' => 'award', 'label' => 'Certificates'],
                        ['route' => 'dashboard.student.discussions', 'icon' => 'message-square', 'label' => 'Discussions'],
                    ];
                @endphp

                @foreach($menuItems as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs($item['route']) ? 'bg-accent-blue text-white shadow-lg shadow-accent-blue/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
                        <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5"></i>
                        {{ $item['label'] }}
                    </a>
                @endforeach

                <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4 mt-10">Account</p>
                <a href="{{ route('dashboard.student.profile') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs('dashboard.student.profile') ? 'bg-accent-blue text-white shadow-lg shadow-accent-blue/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    Profile
                </a>
                <a href="{{ route('dashboard.student.settings') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs('dashboard.student.settings') ? 'bg-accent-blue text-white shadow-lg shadow-accent-blue/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    Settings
                </a>
            </nav>

            <!-- Learning Goal Card -->
            <div class="mt-auto p-4 bg-gradient-to-br from-indigo-900/50 to-blue-900/50 rounded-2xl border border-indigo-700/30">
                <div class="flex items-center gap-2 mb-3">
                    <i data-lucide="star" class="w-4 h-4 text-accent-gold fill-accent-gold"></i>
                    <span class="text-[10px] font-black uppercase tracking-tighter text-white">Daily Goal</span>
                </div>
                <p class="text-xs text-indigo-200 mb-3 leading-snug">You're <b>45 mins</b> away from your daily goal!</p>
                <div class="w-full bg-indigo-950 rounded-full h-1.5 mb-1">
                    <div class="h-1.5 bg-accent-gold rounded-full" style="width: 65%"></div>
                </div>
            </div>
        </aside>

        <!-- Dynamic Content -->
        <div class="flex-1 overflow-y-auto custom-scrollbar">
            @yield('Sdash')
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>

</html>
