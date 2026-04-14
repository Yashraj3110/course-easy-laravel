@extends('Dashboards.student.dashboard')

@section('Sdash')
<main class="flex-1 p-10 overflow-y-auto bg-[#050505] selection:bg-indigo-500 selection:text-white pb-32">

    <!-- Premium Artistic Header -->
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-20 relative">
        <div class="absolute -top-20 -left-20 w-64 h-64 bg-indigo-600/10 rounded-full blur-[100px] pointer-events-none"></div>
        
        <div class="relative z-10 space-y-2">
            <h2 class="text-5xl font-black text-white leading-tight tracking-tighter uppercase italic">
                Focus, <span class="text-indigo-600">{{ explode(' ', Auth::user()->name)[0] }}.</span>
            </h2>
            <p class="text-[10px] font-black text-gray-500 uppercase tracking-[0.4em]">Operational Status: Learning Mode Active</p>
        </div>

        <div class="flex items-center gap-4 relative z-10 w-full md:w-auto">
            <div class="relative group flex-1 md:flex-none">
                <input type="text" placeholder="SEARCH MY BLUEPRINTS..."
                    class="w-full md:w-80 py-4 px-6 bg-white/[0.03] border border-white/5 rounded-2xl focus:ring-2 focus:ring-indigo-500 text-[10px] font-black tracking-widest text-gray-300 transition duration-300 uppercase outline-none">
                <i data-lucide="search" class="absolute right-6 top-1/2 -translate-y-1/2 text-gray-500 w-4 h-4"></i>
            </div>
            <button class="p-4 rounded-2xl bg-white/[0.03] border border-white/5 text-gray-500 hover:text-white transition duration-300">
                <i data-lucide="bell" class="w-5 h-5"></i>
            </button>
        </div>
    </header>

    <!-- Master Progress HUD -->
    <section class="grid grid-cols-1 lg:grid-cols-4 gap-10 mb-20">
        <div class="lg:col-span-3 relative group overflow-hidden bg-white/[0.02] border border-white/5 rounded-[3rem] p-12 transition hover:border-indigo-500/30">
            <!-- Background Glow -->
            <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-indigo-600/10 rounded-full blur-[100px] transition group-hover:bg-indigo-600/20"></div>
            
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-12">
                <div class="space-y-6 flex-1">
                    <div class="flex items-center gap-4">
                        <span class="p-3 bg-indigo-600/10 rounded-2xl border border-indigo-600/20 text-indigo-500">
                            <i data-lucide="activity" class="w-6 h-6"></i>
                        </span>
                        <h3 class="text-2xl font-black text-white uppercase tracking-tighter">Current Momentum</h3>
                    </div>
                    
                    <div class="flex items-baseline gap-4">
                        <span class="text-8xl font-black text-white tracking-tighter">{{ number_format($stats['avg_progress'], 0) }}%</span>
                        <span class="text-xs font-black text-gray-500 uppercase tracking-widest italic">Global Average</span>
                    </div>

                    <div class="space-y-4">
                        <div class="w-full bg-white/5 rounded-full h-2 overflow-hidden">
                            <div class="h-full bg-indigo-600 rounded-full transition-all duration-1000 shadow-[0_0_20px_rgba(79,70,229,0.4)]" style="width: {{ $stats['avg_progress'] }}%"></div>
                        </div>
                        <p class="text-[9px] font-black text-gray-500 uppercase tracking-widest italic">Success metric: {{ $stats['completed'] }} Project modules fully integrated.</p>
                    </div>
                </div>

                @if($enrollments->count() > 0)
                    <div class="shrink-0">
                        <a href="{{ route('student.course.learn', $enrollments->first()->course) }}" 
                           class="group/btn relative py-6 px-12 bg-indigo-600 text-white font-black rounded-3xl text-center flex items-center gap-4 transition overflow-hidden">
                            <span class="relative z-10 uppercase tracking-widest text-[10px]">Resume Last Blueprint</span>
                            <i data-lucide="move-right" class="relative z-10 w-4 h-4 group-hover/btn:translate-x-2 transition"></i>
                            <div class="absolute inset-x-0 bottom-0 h-0 group-hover/btn:h-full bg-white/10 transition-all duration-300"></div>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 gap-6">
            <div class="p-8 bg-white/[0.02] border border-white/5 rounded-[2.5rem] flex flex-col justify-between transition hover:border-indigo-500/20">
                <div class="flex justify-between items-start">
                    <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Active <br> Artifacts</span>
                    <i data-lucide="book-open" class="text-indigo-500 w-5 h-5 opacity-40"></i>
                </div>
                <h4 class="text-5xl font-black text-white tracking-tighter leading-none mt-4">{{ $stats['enrolled'] }}</h4>
            </div>
            <div class="p-8 bg-white/[0.02] border border-white/5 rounded-[2.5rem] flex flex-col justify-between transition hover:border-indigo-500/20">
                <div class="flex justify-between items-start">
                    <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Ownership <br> Proofs</span>
                    <i data-lucide="award" class="text-indigo-500 w-5 h-5 opacity-40"></i>
                </div>
                <h4 class="text-5xl font-black text-white tracking-tighter leading-none mt-4">{{ $stats['certs'] }}</h4>
            </div>
        </div>
    </section>

    <!-- My Repositories Section -->
    <section class="mb-32">
        <div class="flex justify-between items-end mb-12">
            <div class="space-y-2">
                <h3 class="text-3xl font-black text-white uppercase tracking-tighter">My Blueprints</h3>
                <p class="text-[9px] font-black text-gray-500 uppercase tracking-[0.3em]">Persistent Learning Repository</p>
            </div>
            <a href="{{ route('dashboard.student.courses') }}" class="text-[10px] font-black text-indigo-500 uppercase tracking-widest hover:underline px-6 py-3 bg-white/[0.03] border border-white/5 rounded-xl transition">
                Access All →
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($enrollments as $enrollment)
                <div class="group bg-white/[0.02] rounded-[3rem] border border-white/5 overflow-hidden transition-all duration-700 hover:border-indigo-500/20 hover:-translate-y-4">
                    <div class="relative h-48 overflow-hidden grayscale-[30%] group-hover:grayscale-0 transition duration-700">
                        <img src="{{ $enrollment->course->thumbnail ? asset($enrollment->course->thumbnail) : 'https://placehold.co/600x400/1e293b/fff?text='.$enrollment->course->title }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#050505] via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-8">
                            <span class="px-3 py-1 bg-white/10 backdrop-blur rounded-lg text-[8px] font-black text-white uppercase tracking-widest border border-white/10">
                                {{ strtoupper($enrollment->course->category) }}
                            </span>
                        </div>
                    </div>

                    <div class="p-10 space-y-8">
                        <div>
                             <h4 class="text-2xl font-black text-white mb-2 leading-none group-hover:text-indigo-500 transition line-clamp-1">{{ strtoupper($enrollment->course->title) }}</h4>
                             <p class="text-[9px] font-black text-gray-500 uppercase tracking-widest italic">Instructed by {{ $enrollment->course->tutor->name }}</p>
                        </div>
                        
                        <div class="space-y-4 pt-6 border-t border-white/5">
                             <div class="flex justify-between items-end">
                                 <span class="text-[9px] font-black text-gray-500 uppercase tracking-widest">Progress Integrity</span>
                                 <span class="text-xl font-black text-white tracking-tighter">{{ $enrollment->progress_percent }}%</span>
                             </div>
                             <div class="w-full bg-white/5 rounded-full h-1">
                                 <div class="h-full bg-indigo-600 rounded-full transition-all duration-700" style="width: {{ $enrollment->progress_percent }}%"></div>
                             </div>
                        </div>
                        
                        <a href="{{ route('student.course.learn', $enrollment->course) }}" 
                           class="flex items-center justify-between py-5 px-8 bg-white/5 hover:bg-indigo-600 text-white font-black text-[9px] uppercase tracking-[0.2em] rounded-2xl transition duration-500 group/link shadow-xl">
                           Project Entry
                           <i data-lucide="arrow-right" class="w-4 h-4 group-hover/link:translate-x-2 transition"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center opacity-20 bg-white/[0.01] rounded-[4rem] border-2 border-dashed border-white/5">
                    <i data-lucide="code-2" class="w-20 h-20 mx-auto mb-6 text-indigo-500"></i>
                    <h4 class="text-4xl font-black uppercase tracking-tighter mb-4 italic">No Active Deployments</h4>
                    <p class="text-xs font-black uppercase tracking-widest mb-10">Your personal repository is currently empty.</p>
                    <a href="{{ route('courses') }}" class="inline-flex items-center gap-4 px-12 py-5 bg-white text-gray-900 font-black rounded-3xl uppercase tracking-widest text-[10px] hover:scale-105 transition">Explore Catalog</a>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Curator's Selection -->
    <section>
        <div class="flex items-center gap-6 mb-12">
            <h3 class="text-3xl font-black text-white uppercase tracking-tighter">Vault <br> Suggestions.</h3>
            <div class="h-px bg-white/5 flex-1"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($recommended as $course)
                <div class="p-8 bg-white/[0.02] border border-white/5 rounded-[2.5rem] group hover:border-indigo-500/20 transition-all duration-500">
                    <div class="flex justify-between items-start mb-6">
                        <span class="text-[8px] font-black text-indigo-500 uppercase tracking-widest">{{ strtoupper($course->category) }}</span>
                        <div class="flex items-center gap-1 text-[10px] font-black text-accent-gold">
                            <i data-lucide="star" class="w-3 h-3 fill-accent-gold"></i>
                            {{ number_format($course->rating, 1) }}
                        </div>
                    </div>
                    <h4 class="text-lg font-black text-white mb-6 group-hover:text-indigo-500 transition leading-tight line-clamp-2">{{ strtoupper($course->title) }}</h4>
                    
                    <div class="flex justify-between items-center pt-6 border-t border-white/5">
                        <span class="text-xl font-black text-white">
                            {{ $course->price == 0 ? 'FREE' : '$'.number_format($course->price) }}
                        </span>
                        <a href="{{ route('courses.show', $course) }}" class="p-4 bg-white/5 rounded-2xl text-white hover:bg-indigo-600 transition shadow-lg group-hover:rotate-12">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();
    });
</script>
<style>
    body {
        scrollbar-width: thin;
        scrollbar-color: #4f46e5 #050505;
    }
    body::-webkit-scrollbar {
        width: 6px;
    }
    body::-webkit-scrollbar-thumb {
        background: #4f46e5;
        border-radius: 10px;
    }
</style>
@endpush
