@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-[#050505] selection:bg-indigo-500 selection:text-white overflow-x-hidden">

    <!-- Section 1: Cinematic Hero (Dynamic Height) -->
    <section class="relative min-h-[90vh] flex items-center justify-center pt-24 pb-12">
        <!-- Ambient Mesh Gradient -->
        <div class="absolute inset-0 z-0 opacity-20 dark:opacity-30">
            <div class="absolute top-[-5%] left-[-5%] w-[30%] h-[30%] bg-indigo-500 blur-[100px] rounded-full animate-pulse"></div>
            <div class="absolute bottom-[-5%] right-[-5%] w-[30%] h-[30%] bg-purple-500 blur-[100px] rounded-full animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col items-center text-center space-y-8">
                <div data-aos="fade-down" class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 dark:bg-white/[0.03] border border-gray-100 dark:border-white/10 backdrop-blur-xl">
                    <span class="flex h-1.5 w-1.5 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-indigo-500"></span>
                    </span>
                    <span class="text-[8px] font-black uppercase tracking-[0.4em] text-gray-500 dark:text-gray-400">Next-Gen Laboratory</span>
                </div>

                <h1 data-aos="fade-up" class="text-5xl md:text-8xl font-black text-gray-900 dark:text-white leading-[0.95] tracking-tighter uppercase italic select-none">
                    Forge <br> <span class="not-italic text-transparent bg-clip-text bg-gradient-to-b from-indigo-500 to-indigo-800">Elite</span> Code.
                </h1>

                <p data-aos="fade-up" data-aos-delay="100" class="text-base md:text-xl text-gray-500 dark:text-gray-400 max-w-xl font-medium leading-relaxed">
                    A cinematic workspace for software engineers. Master internal mechanics and system architecture with ultra-high fidelity curriculum.
                </p>

                <div data-aos="fade-up" data-aos-delay="200" class="flex flex-col sm:flex-row items-center gap-4 pt-4 w-full justify-center">
                    @guest
                        <button class="open-signup-modal group px-10 py-4 bg-indigo-600 text-white font-bold rounded-full hover:scale-105 transition shadow-xl shadow-indigo-600/20 flex items-center gap-3 text-sm">
                            Join the Collective
                            <i data-lucide="chevrons-right" class="w-4 h-4 group-hover:translate-x-1 transition"></i>
                        </button>
                        <a href="#artifacts" class="px-10 py-4 bg-white dark:bg-white/5 text-gray-900 dark:text-white font-bold rounded-full border border-gray-100 dark:border-white/10 hover:border-indigo-500 transition-all backdrop-blur-3xl text-sm">
                            Survey Artifacts
                        </a>
                    @else
                        <a href="{{ route('dashboard.student.home') }}" class="group px-10 py-4 bg-indigo-600 text-white font-bold rounded-full hover:scale-105 transition shadow-xl shadow-indigo-600/20 flex items-center gap-3 text-sm">
                            Access Workspace
                            <i data-lucide="command" class="w-4 h-4"></i>
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Artifact Bento (Courses) -->
    <section id="artifacts" class="py-24 bg-gray-50/50 dark:bg-white/[0.02]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8">
                <div class="max-w-xl space-y-4">
                    <span class="text-[8px] font-black text-indigo-500 uppercase tracking-[0.5em]">Inventory Status: Primed</span>
                    <h2 class="text-3xl md:text-6xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                        Highest Fidelity <br> <span class="not-italic text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-400 dark:from-white dark:to-white/20">Learning Nodes.</span>
                    </h2>
                </div>
                <a href="{{ route('courses') }}" class="group p-4 bg-white dark:bg-white/5 rounded-2xl border border-gray-100 dark:border-white/10 hover:border-indigo-500 transition shadow-sm">
                    <i data-lucide="grid" class="w-5 h-5 text-gray-400 group-hover:text-indigo-500 transition"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-6 gap-6 max-w-7xl mx-auto">
                @forelse($featuredCourses as $course)
                    <div class="md:col-span-2 group relative bg-white dark:bg-[#0d0d0d] rounded-2xl border border-gray-100 dark:border-white/5 overflow-hidden transition-all duration-700 hover:shadow-xl hover:border-indigo-500/30" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="aspect-[16/10] relative overflow-hidden">
                            <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://placehold.co/800x600/1e293b/fff?text='.$course->title }}" 
                                 class="w-full h-full object-cover transition duration-700 group-hover:scale-105 grayscale group-hover:grayscale-0">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            
                            <div class="absolute bottom-6 left-6 right-6 space-y-2">
                                <span class="px-2 py-0.5 bg-white/10 backdrop-blur-xl border border-white/20 rounded text-[7px] font-bold text-white uppercase tracking-widest">{{ $course->difficulty }}</span>
                                <h3 class="text-lg font-bold text-white tracking-tight leading-tight uppercase italic group-hover:text-indigo-400 transition">{{ $course->title }}</h3>
                                <div class="flex items-center justify-between pt-3 border-t border-white/10">
                                    <span class="text-xs font-black text-white italic tracking-tighter uppercase">{{ $course->price > 0 ? '$'.number_format($course->price) : 'Free Node' }}</span>
                                    <i data-lucide="arrow-up-right" class="w-4 h-4 text-white opacity-0 group-hover:opacity-100 group-hover:translate-x-1 group-hover:-translate-y-1 transition duration-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center bg-gray-100 dark:bg-white/5 rounded-3xl border border-dashed border-gray-200 dark:border-white/10">
                        <i data-lucide="box-select" class="w-12 h-12 mx-auto mb-4 text-gray-300"></i>
                        <p class="text-[8px] font-black uppercase tracking-[0.4em] text-gray-400">Inventory Empty - System Idle</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Section 3: Tech Pillars -->
    <section class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
                <div class="relative" data-aos="zoom-out">
                    <div class="aspect-square max-w-md mx-auto rounded-[3rem] border border-dashed border-indigo-500/20 flex items-center justify-center p-8">
                        <div class="w-full h-full bg-indigo-600 rounded-[2rem] flex flex-col items-center justify-center text-white relative group overflow-hidden shadow-2xl">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-700 backdrop-blur-sm"></div>
                            <i data-lucide="layers" class="w-20 h-20 opacity-20 group-hover:scale-125 transition duration-700"></i>
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-8 opacity-0 group-hover:opacity-100 transition duration-500">
                                <p class="text-[10px] font-black uppercase tracking-[0.5em] mb-4">Core Mission</p>
                                <p class="text-2xl font-black italic uppercase leading-none text-center tracking-tighter">"Architecting the future through rigorous code."</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-12" data-aos="fade-left">
                    <div class="space-y-4">
                        <h2 class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter leading-[0.95]">
                            Uncompromising <br> <span class="not-italic text-indigo-600">Standards.</span>
                        </h2>
                        <p class="text-base text-gray-500 dark:text-gray-400 leading-relaxed font-medium max-w-md">
                            We don't teach recipes, we teach algorithms. Our protocol ensures you master the system from the inside out.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-8">
                        <div class="flex items-start gap-6 group">
                            <div class="w-12 h-12 bg-gray-50 dark:bg-white/5 rounded-xl flex items-center justify-center group-hover:bg-indigo-600 transition flex-shrink-0">
                                <i data-lucide="cpu" class="w-5 h-5 text-gray-900 dark:text-white group-hover:text-white transition"></i>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-lg font-bold dark:text-white">Internal Mechanisms</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Deep dives into memory management and thread optimizations.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-6 group">
                            <div class="w-12 h-12 bg-gray-50 dark:bg-white/5 rounded-xl flex items-center justify-center group-hover:bg-indigo-600 transition flex-shrink-0">
                                <i data-lucide="shield" class="w-5 h-5 text-gray-900 dark:text-white group-hover:text-white transition"></i>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-lg font-bold dark:text-white">Production Guard</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Security-first curriculum focused on resilient, enterprise systems.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Final CTA -->
    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="relative bg-gray-900 rounded-[3rem] p-12 md:p-24 overflow-hidden text-center group" data-aos="fade-up">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,#4f46e510_0,transparent_70%)] group-hover:scale-110 transition duration-1000"></div>
                
                <div class="relative z-10 max-w-4xl mx-auto space-y-10">
                    <h2 class="text-4xl md:text-7xl font-black text-white italic uppercase tracking-tighter leading-none">
                        Initiate <br> <span class="not-italic text-transparent bg-clip-text bg-gradient-to-b from-indigo-400 to-indigo-800">Sequence.</span>
                    </h2>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                        @guest
                            <button class="open-signup-modal px-12 py-5 bg-white text-gray-900 font-black uppercase text-[9px] tracking-[0.5em] rounded-full hover:scale-105 active:scale-95 transition shadow-2xl">
                                Create Identity
                            </button>
                        @else
                            <a href="{{ route('dashboard.student.home') }}" class="px-12 py-5 bg-indigo-600 text-white font-black uppercase text-[9px] tracking-[0.5em] rounded-full hover:bg-indigo-700 transition shadow-2xl">
                                Resume Session
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({ duration: 1000, once: true, offset: 50 });
        lucide.createIcons();
    });
</script>
<style>
    .tracking-tighter { letter-spacing: -0.05em; }
</style>
@endpush
