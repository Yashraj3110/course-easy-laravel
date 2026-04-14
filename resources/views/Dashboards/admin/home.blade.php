@extends('Dashboards.admin.dashboard')

@section('Adash')
<main class="flex-1 p-10 overflow-y-auto">

    <header class="flex justify-between items-center mb-12">
        <div>
            <h2 class="text-4xl font-light text-white">System <span class="font-bold text-red-500">Administrator</span></h2>
            <p class="text-gray-400 mt-2 italic">"Efficiency is doing things right; effectiveness is doing the right things."</p>
        </div>
        <div class="flex items-center space-x-6">
            <div class="flex items-center bg-secondary-dark rounded-2xl p-1 border border-gray-700 shadow-2xl">
                <div class="px-6 py-3">
                    <p class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Platform Status</p>
                    <p class="text-xs font-bold text-green-500 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                        Healthy
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- High Level Metrics -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="users" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-xs font-black uppercase tracking-widest mb-2">Total Students</p>
            <h3 class="text-4xl font-black text-white mb-2">{{ number_format($stats['total_students']) }}</h3>
            <p class="text-[10px] text-accent-blue font-black uppercase">+{{ number_format($recent_users->count()) }} new this week</p>
        </div>

        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="graduation-cap" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-xs font-black uppercase tracking-widest mb-2">Instructors</p>
            <h3 class="text-4xl font-black text-white mb-2">{{ number_format($stats['total_instructors']) }}</h3>
             <p class="text-[10px] text-accent-gold font-black uppercase">{{ $stats['pending_instructors'] }} awaiting approval</p>
        </div>

        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="book-open" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-xs font-black uppercase tracking-widest mb-2">Review Queue</p>
            <h3 class="text-4xl font-black text-white mb-2 ml-1">{{ $stats['pending_approvals'] }}</h3>
            <p class="text-[10px] text-red-500 font-black uppercase">Courses pending review</p>
        </div>

        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="dollar-sign" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-xs font-black uppercase tracking-widest mb-2">Total Revenue</p>
            <h3 class="text-4xl font-black text-white mb-2">${{ number_format($stats['total_revenue'], 2) }}</h3>
            <p class="text-[10px] text-green-500 font-black uppercase">Platform Total</p>
        </div>
    </section>

    <!-- Admin Activity Hub -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        
        <!-- Pending Instructor Requests -->
        <section class="bg-secondary-dark rounded-[3rem] p-10 border border-gray-700/50 shadow-2xl">
            <div class="flex justify-between items-center mb-8 text-white">
                <h3 class="text-xl font-black uppercase tracking-tight">Pending Course Submissions</h3>
                <a href="{{ route('dashboard.admin.content') }}" class="text-xs font-black text-red-400 hover:underline">Manage All</a>
            </div>
            <div class="space-y-4">
                @foreach($recent_courses as $course)
                    @if($course->approval === 'pending')
                        <div class="flex items-center gap-4 p-5 bg-primary-dark/50 rounded-[2rem] border border-gray-800 hover:border-red-500/30 transition group">
                            <div class="w-14 h-14 bg-gray-800 rounded-2xl flex items-center justify-center">
                                <i data-lucide="file-text" class="text-gray-500 group-hover:text-red-400 transition"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-white">{{ $course->title }}</h4>
                                <p class="text-[10px] text-gray-500 font-black uppercase mt-1">Instructor: {{ $course->tutor->name }}</p>
                            </div>
                            <div class="flex gap-2">
                                <form action="{{ route('dashboard.admin.courses.approve', $course) }}" method="POST">
                                    @csrf
                                    <button class="p-3 bg-green-500/10 text-green-500 rounded-xl hover:bg-green-500 hover:text-white transition">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                @if($recent_courses->where('approval', 'pending')->count() == 0)
                    <div class="text-center py-10 opacity-30">
                        <i data-lucide="check-circle" class="w-12 h-12 mx-auto mb-4"></i>
                        <p class="text-sm font-bold uppercase tracking-widest">Everything Approved</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- Platform User Insights -->
        <section class="bg-secondary-dark rounded-[3rem] p-10 border border-gray-700/50 shadow-2xl">
            <h3 class="text-xl font-black text-white uppercase tracking-tight mb-8">Recently Joined Users</h3>
            <div class="space-y-6">
                @foreach($recent_users as $user)
                    <div class="flex items-center gap-4 group">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6366f1&color=fff" 
                             class="w-12 h-12 rounded-[1.25rem] border-2 border-gray-800 group-hover:border-accent-blue transition">
                        <div class="flex-1">
                            <p class="text-sm font-bold text-white">{{ $user->name }}</p>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 rounded {{ $user->role === 'student' ? 'bg-blue-500/10 text-blue-400' : 'bg-accent-gold/10 text-accent-gold' }}">
                                {{ $user->role }}
                            </span>
                        </div>
                        <p class="text-[10px] text-gray-600 font-black uppercase">{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

</main>

@push('scripts')
<script>
    lucide.createIcons();
</script>
@endpush
@endsection
