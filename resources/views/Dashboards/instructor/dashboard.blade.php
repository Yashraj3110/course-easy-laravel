<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseEasy | Instructor HQ</title>
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
                        'instructor-purple': '#8b5cf6', // A vibrant indigo/purple
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

    <!-- Top Instructor Bar -->
    <nav class="sticky top-0 z-50 bg-primary-dark/80 backdrop-blur-xl border-b border-gray-800 px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-instructor-purple rounded-xl flex items-center justify-center shadow-lg shadow-instructor-purple/20">
                    <i data-lucide="graduation-cap" class="text-white w-6 h-6"></i>
                </div>
                <div class="flex flex-col leading-none">
                    <span class="text-xl font-black text-white tracking-tighter">CourseEasy</span>
                    <span class="text-[10px] font-black text-instructor-purple uppercase mt-0.5">Instructor Hub</span>
                </div>
            </a>
        </div>

        <div class="flex items-center gap-6">
            <div class="hidden sm:flex flex-col items-end">
                <span class="text-sm font-bold text-white">{{ Auth::user()->name }}</span>
                <span class="text-[10px] font-black text-instructor-purple uppercase tracking-widest mt-1">Verified Educator</span>
            </div>
            <div class="flex items-center gap-3">
                <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=8b5cf6&color=fff' }}" 
                     class="w-10 h-10 rounded-xl border border-gray-700 object-cover">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-3 bg-red-500/10 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition group">
                        <i data-lucide="log-out" class="w-5 h-5 group-hover:scale-110 transition"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="hidden md:flex flex-col w-64 bg-primary-dark border-r border-gray-800 p-6 overflow-y-auto custom-scrollbar">
            @include('Dashboards.instructor.sidebar')
            
            <!-- Support Card -->
            <div class="mt-auto p-4 bg-instructor-purple/10 rounded-2xl border border-instructor-purple/20">
                <p class="text-[10px] font-black uppercase text-instructor-purple mb-1">Need Help?</p>
                <p class="text-xs text-gray-400 leading-relaxed">Access the educator knowledge base or contact support.</p>
                <button class="mt-3 w-full py-2 bg-instructor-purple text-white text-[10px] font-black rounded-lg hover:bg-opacity-90 transition">
                    VIEW GUIDE
                </button>
            </div>
        </aside>

        <!-- Dynamic Content -->
        <div class="flex-1 overflow-y-auto custom-scrollbar bg-primary-dark">
            @yield('Idash')
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>

</html>
