<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseEasy | Admin HQ</title>
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
    </style>
</head>

<body class="bg-primary-dark text-gray-200 min-h-screen antialiased flex flex-col">

    <!-- Top Admin Bar -->
    <nav class="sticky top-0 z-50 bg-primary-dark/80 backdrop-blur-xl border-b border-gray-800 px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-600 rounded-xl flex items-center justify-center shadow-lg shadow-red-600/20">
                    <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
                </div>
                <div class="flex flex-col leading-none">
                    <span class="text-xl font-black text-white tracking-tighter">CourseEasy</span>
                    <span class="text-[10px] font-black text-red-500 uppercase mt-0.5">Admin Central</span>
                </div>
            </a>
        </div>

        <div class="flex items-center gap-6">
            <div class="hidden sm:flex flex-col items-end">
                <span class="text-sm font-bold text-white">{{ Auth::user()->name }}</span>
                <span class="text-[10px] font-black text-red-500 uppercase tracking-widest mt-1">Super Admin</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="p-3 bg-red-500/10 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition group">
                    <i data-lucide="log-out" class="w-5 h-5 group-hover:scale-110 transition"></i>
                </button>
            </form>
        </div>
    </nav>

    <div class="flex flex-1 overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="hidden md:flex flex-col w-64 bg-primary-dark border-r border-gray-800 p-6">
            <nav class="space-y-2 flex-1">
                <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4">Management</p>
                
                @php
                    $adminItems = [
                        ['route' => 'dashboard.admin.home', 'icon' => 'layout-grid', 'label' => 'Dashboard'],
                        ['route' => 'dashboard.admin.users', 'icon' => 'users', 'label' => 'User Management'],
                        ['route' => 'dashboard.admin.content', 'icon' => 'check-square', 'label' => 'Course Approvals'],
                    ];
                @endphp

                @foreach($adminItems as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs($item['route']) ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
                        <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5"></i>
                        {{ $item['label'] }}
                    </a>
                @endforeach

                <div class="h-px bg-gray-800 my-6 mx-3"></div>

                <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4">Finance</p>
                <a href="{{ route('dashboard.admin.financials') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs('dashboard.admin.financials') ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
                    <i data-lucide="banknote" class="w-5 h-5"></i>
                    Revenue & Payouts
                </a>

                <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4 mt-8">System</p>
                <a href="{{ route('dashboard.admin.logs') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs('dashboard.admin.logs') ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
                    <i data-lucide="terminal" class="w-5 h-5"></i>
                    Security Logs
                </a>
            </nav>

            <!-- Server Status -->
            <div class="mt-auto p-4 bg-red-900/10 rounded-2xl border border-red-900/20">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase text-white">Cloud Node 01</span>
                </div>
                <p class="text-[10px] text-gray-500 font-bold">Uptime: 99.98%</p>
            </div>
        </aside>

        <!-- Dynamic Content -->
        <div class="flex-1 overflow-y-auto custom-scrollbar bg-primary-dark">
            @yield('Adash')
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>

</html>
