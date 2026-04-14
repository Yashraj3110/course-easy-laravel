@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-[#000] selection:bg-indigo-500 selection:text-white pb-40">
    
    <!-- Immersive Header/Hero (Blueprint/Architect Theme) -->
    <header class="relative pt-24 pb-48 lg:pb-64 overflow-hidden bg-gray-900 border-b border-white/5">
        <!-- Blueprint Overlay -->
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff12_1px,transparent_1px),linear-gradient(to_bottom,#ffffff12_1px,transparent_1px)] bg-[size:40px_40px]"></div>
        </div>
        
        <!-- Background Orbs -->
        <div class="absolute top-[-10%] right-0 w-[600px] h-[600px] bg-indigo-600/20 rounded-full blur-[150px] pointer-events-none"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-20 items-start">
                <div class="lg:w-2/3 space-y-10">
                    <div class="flex items-center gap-4">
                        <span class="px-4 py-1.5 rounded-full bg-white/10 text-white text-[10px] font-black uppercase tracking-[0.4em] border border-white/10">
                            {{ strtoupper($course->category ?? 'TECHNICAL') }}
                        </span>
                        <span class="px-4 py-1.5 rounded-full bg-indigo-600/20 text-indigo-400 text-[10px] font-black uppercase tracking-[0.4em] border border-indigo-600/20">
                            {{ strtoupper($course->difficulty) }} LEVEL
                        </span>
                    </div>

                    <h1 class="text-6xl md:text-8xl font-black text-white leading-[0.85] tracking-tighter uppercase italic">
                        {{ $course->title }}
                    </h1>

                    <p class="text-xl text-gray-400 max-w-2xl leading-relaxed italic border-l-4 border-indigo-600 pl-8">
                        {{ $course->description }}
                    </p>

                    <div class="flex flex-wrap items-center gap-10 text-[10px] font-black uppercase tracking-[0.3em] text-gray-400">
                        <div class="flex items-center gap-3">
                            <i data-lucide="play-circle" class="w-4 h-4 text-indigo-500"></i>
                            {{ $totalLectures }} MODULES
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="clock" class="w-4 h-4 text-indigo-500"></i>
                            Self-paced
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="award" class="w-4 h-4 text-indigo-500"></i>
                            Certified
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Content Controller (Overlapping Viewports) -->
    <div class="container mx-auto px-6 -mt-32 lg:-mt-48 relative z-20">
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
            
            <!-- Curriculum Area (Architectural List) -->
            <div class="lg:w-2/3 space-y-20">
                <div class="bg-white dark:bg-[#0d0d0d] rounded-[3rem] border border-gray-100 dark:border-white/5 p-12 lg:p-16 shadow-2xl">
                    <div class="flex items-center justify-between mb-16">
                        <h2 class="text-4xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Blueprint <br> <span class="text-indigo-600 italic">Breakdown.</span></h2>
                        <div class="text-right">
                             <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Est. Duration</p>
                             <p class="text-xl font-black dark:text-white">~12.5 Hours</p>
                        </div>
                    </div>

                    <div class="space-y-8">
                        @foreach($course->modules as $index => $module)
                            <div class="group border-b border-gray-100 dark:border-white/5 pb-8 last:border-0">
                                <div class="flex items-start gap-8 mb-6">
                                    <span class="text-5xl font-black text-gray-100 dark:text-white/5 tracking-tighter group-hover:text-indigo-600 transition">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2 uppercase">{{ $module->title }}</h3>
                                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest">{{ $module->lectures->count() }} Sub-Blueprints</p>
                                    </div>
                                </div>

                                <div class="space-y-3 pl-20">
                                    @foreach($module->lectures as $lecture)
                                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-white/[0.02] rounded-2xl group/sub transition hover:bg-gray-100 dark:hover:bg-white/5">
                                            <div class="flex items-center gap-4">
                                                <i data-lucide="chevron-right" class="w-4 h-4 text-indigo-500 opacity-0 group-hover/sub:opacity-100 transition"></i>
                                                <span class="text-sm font-bold text-gray-600 dark:text-gray-300">{{ $lecture->title }}</span>
                                            </div>
                                            @if($lecture->is_preview)
                                                <span class="px-3 py-1 bg-indigo-500/10 text-indigo-500 text-[8px] font-black uppercase tracking-widest rounded-lg border border-indigo-500/20">PREVIEW</span>
                                            @else
                                                <i data-lucide="lock" class="w-3.5 h-3.5 text-gray-300 dark:text-white/10"></i>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Instructor Branding -->
                <div class="bg-indigo-600 rounded-[3rem] p-12 lg:p-20 text-white relative overflow-hidden group">
                     <div class="absolute inset-0 z-0 opacity-10 bg-[radial-gradient(circle_at_center,_#fff_1px,_transparent_1px)] bg-[size:40px_40px]"></div>
                     <div class="relative z-10 flex flex-col md:flex-row items-center gap-12">
                        <img src="https://ui-avatars.com/?name={{ urlencode($course->tutor->name) }}&size=200&background=fff&color=4f46e5" 
                             class="w-40 h-40 rounded-[2.5rem] shadow-2xl border-4 border-white/20 transform group-hover:rotate-6 transition duration-700">
                        <div class="space-y-4 text-center md:text-left">
                            <p class="text-[10px] font-black uppercase tracking-[0.5em] opacity-60">Lead Architect</p>
                            <h4 class="text-4xl font-black uppercase tracking-tighter">{{ $course->tutor->name }}</h4>
                            <p class="text-lg text-indigo-100 font-medium italic opacity-80 leading-relaxed">
                                "{{ $course->tutor->bio ?? 'The architect of this entire technical ecosystem.' }}"
                            </p>
                        </div>
                     </div>
                </div>
            </div>

            <!-- Enrollment Interface (Pinned Right) -->
            <div class="lg:w-1/3">
                <div class="sticky top-24 bg-white dark:bg-[#111] border border-gray-100 dark:border-white/5 rounded-[4rem] p-10 lg:p-12 shadow-2xl shadow-gray-200 dark:shadow-none">
                    <div class="relative h-64 rounded-[2.5rem] overflow-hidden mb-12 shadow-2xl">
                        <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://placehold.co/800x600/1e293b/fff?text=Curriculum+Preview' }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-indigo-600/20 backdrop-blur-[2px]"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                             <div class="w-20 h-20 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/30 animate-pulse cursor-pointer hover:scale-110 transition">
                                 <i data-lucide="play" class="w-8 h-8 text-white fill-white"></i>
                             </div>
                        </div>
                    </div>

                    <div class="space-y-10">
                        <div>
                             <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Tuition</p>
                             <div class="flex items-baseline gap-4">
                                <p class="text-5xl font-black text-gray-900 dark:text-white">{{ $course->price > 0 ? '$'.number_format($course->price, 2) : 'FREE' }}</p>
                                @if($course->price > 0)
                                    <p class="text-xl text-gray-400 line-through font-bold opacity-30">$149</p>
                                @endif
                             </div>
                        </div>

                        @if($isEnrolled)
                            <div class="space-y-4">
                                <a href="{{ route('student.course.learn', $course) }}" 
                                   class="w-full py-6 bg-indigo-600 text-white font-black text-xs rounded-3xl uppercase tracking-widest text-center block shadow-2xl shadow-indigo-600/30 hover:scale-[1.02] active:scale-95 transition">
                                    RESUME BLUEPRINT
                                </a>
                                <a href="{{ route('student.course.discussions', $course) }}" 
                                   class="w-full py-6 bg-white dark:bg-white/5 text-gray-900 dark:text-white font-black text-xs rounded-3xl uppercase tracking-widest text-center block border border-gray-100 dark:border-white/10 hover:bg-gray-50 dark:hover:bg-white/10 transition">
                                    Join Discussions
                                </a>
                            </div>
                        @else
                            <form action="{{ route('courses.enroll', $course) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                   class="w-full py-6 bg-indigo-600 text-white font-black text-xs rounded-3xl uppercase tracking-widest text-center shadow-2xl shadow-indigo-600/30 hover:scale-[1.02] active:scale-95 transition">
                                    INITIALIZE ENROLLMENT
                                </button>
                            </form>
                        @endif

                        <div class="pt-8 border-t border-gray-50 dark:border-white/5 space-y-4">
                            <div class="flex items-center gap-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i>
                                Lifetime Possession
                            </div>
                            <div class="flex items-center gap-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <i data-lucide="shield-check" class="w-4 h-4 text-green-500"></i>
                                Verified Certificate
                            </div>
                            <div class="flex items-center gap-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                <i data-lucide="video" class="w-4 h-4 text-green-500"></i>
                                4K Technical Content
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        scrollbar-color: #4f46e5 transparent;
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
