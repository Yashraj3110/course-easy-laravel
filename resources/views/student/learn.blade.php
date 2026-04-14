@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row h-screen bg-[#050505] overflow-hidden">
    
    <!-- Main Player Area (Cinematic Center) -->
    <div class="flex-1 flex flex-col min-h-0 relative">
        <!-- Video Canvas -->
        <div class="w-full bg-black aspect-video lg:flex-1 relative group overflow-hidden shadow-2xl">
            @if($currentLecture && $currentLecture->video_url)
                @php
                    $videoId = '';
                    if (strpos($currentLecture->video_url, 'youtube.com') !== false) {
                        parse_str(parse_url($currentLecture->video_url, PHP_URL_QUERY), $vars);
                        $videoId = $vars['v'] ?? '';
                    } elseif (strpos($currentLecture->video_url, 'youtu.be') !== false) {
                        $videoId = ltrim(parse_url($currentLecture->video_url, PHP_URL_PATH), '/');
                    }
                @endphp

                @if($videoId)
                    <iframe class="w-full h-full lg:absolute lg:inset-0" 
                            src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&modestbranding=1&autoplay=1" 
                            title="Learning Session" frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @else
                    <video class="w-full h-full lg:absolute lg:inset-0" controls autoplay>
                        <source src="{{ asset($currentLecture->video_url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            @else
                <div class="flex flex-col items-center justify-center h-full text-center p-12 space-y-4">
                    <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center border border-white/10">
                        <i data-lucide="video-off" class="w-8 h-8 text-gray-600"></i>
                    </div>
                    <p class="text-gray-500 font-bold uppercase tracking-widest text-xs">No video content</p>
                </div>
            @endif
        </div>

        <!-- Session Info -->
        <div class="flex-none overflow-y-auto p-8 lg:p-10 space-y-8 custom-scrollbar max-h-[40vh] border-t border-white/5 bg-[#080808]">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest">Active Lesson</span>
                        <span class="text-gray-700">•</span>
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">{{ $currentLecture->module->title ?? 'General' }}</span>
                    </div>
                    <h1 class="text-3xl font-extrabold text-white leading-tight tracking-tight">
                        {{ $currentLecture->title }}
                    </h1>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <button id="markCompleteBtn" 
                        data-url="{{ route('student.lecture.complete', [$course, $currentLecture]) }}"
                        class="px-6 py-3 {{ in_array($currentLecture->id, $completed) ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-lg shadow-indigo-600/20' }} rounded-xl font-bold transition transform active:scale-95 border uppercase tracking-widest text-[10px] flex items-center gap-2">
                        <i data-lucide="{{ in_array($currentLecture->id, $completed) ? 'check-circle' : 'circle' }}" class="w-4 h-4"></i>
                        {{ in_array($currentLecture->id, $completed) ? 'Completed' : 'Complete' }}
                    </button>
                    
                    @if($currentLecture->quizzes->count() > 0)
                        <a href="{{ route('student.quiz.show', [$course, $currentLecture->quizzes->first()]) }}" 
                           class="px-6 py-3 bg-white/5 text-white font-bold rounded-xl border border-white/10 hover:bg-white/10 transition transform active:scale-95 flex items-center gap-2 uppercase tracking-widest text-[10px]">
                            <i data-lucide="help-circle" class="w-4 h-4 text-amber-500"></i>
                            Quiz
                        </a>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-4">
                    <h3 class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">Description</h3>
                    <p class="text-gray-400 font-medium leading-relaxed">
                        {{ $currentLecture->description ?? 'Explore this session to deepen your understanding of the curriculum.' }}
                    </p>
                </div>
                
                @if($currentLecture->studyMaterials->count() > 0)
                    <div class="space-y-4">
                        <h3 class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">Resources</h3>
                        <div class="grid gap-2">
                            @foreach($currentLecture->studyMaterials as $material)
                                <a href="{{ asset($material->file_path) }}" target="_blank"
                                   class="flex items-center justify-between p-3 bg-white/[0.03] rounded-xl border border-white/5 hover:border-indigo-500/30 transition group">
                                    <span class="text-gray-300 text-[11px] font-bold truncate pr-4">{{ $material->title }}</span>
                                    <i data-lucide="download" class="w-3.5 h-3.5 text-gray-500 group-hover:text-indigo-400"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sidebar (Course Content) -->
    <div class="w-full lg:w-96 flex flex-col bg-[#0d0d0d] border-l border-white/5 shadow-2xl">
        <div class="p-6 border-b border-white/5 flex justify-between items-center bg-[#111]">
            <div class="space-y-1">
                <h2 class="font-bold text-white uppercase tracking-widest text-[11px]">Course Content</h2>
                <div class="flex items-center gap-2">
                    <div class="w-24 h-1 bg-white/5 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-500 transition-all duration-1000" style="width: {{ $course->enrollments->where('user_id', auth()->id())->first()?->progress_percent ?? 0 }}%"></div>
                    </div>
                    <p id="progressBarText" class="text-[10px] font-bold text-indigo-400">{{ $course->enrollments->where('user_id', auth()->id())->first()?->progress_percent ?? 0 }}%</p>
                </div>
            </div>
            <a href="{{ route('dashboard.student.home') }}" class="p-2 bg-white/5 rounded-lg text-gray-400 hover:text-white transition">
                <i data-lucide="x" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="flex-1 overflow-y-auto p-4 space-y-4 custom-scrollbar pb-10">
            @foreach($course->modules as $mIndex => $module)
                <div x-data="{ open: {{ $currentLecture->module_id == $module->id ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" 
                            class="w-full flex items-center justify-between p-4 rounded-2xl transition duration-300 border border-transparent"
                            :class="open ? 'bg-white/5' : 'hover:bg-white/[0.02]'">
                        <div class="flex items-center gap-3">
                             <span class="text-[10px] font-bold text-gray-600">{{ str_pad($mIndex + 1, 2, '0', STR_PAD_LEFT) }}</span>
                             <span class="font-bold text-gray-300 text-[11px] uppercase tracking-wide text-left line-clamp-1">{{ $module->title }}</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-3 h-3 text-gray-600 transition" :class="open ? 'rotate-180' : ''"></i>
                    </button>

                    <div x-show="open" x-collapse x-cloak class="space-y-1 pl-4 mt-1">
                        @foreach($module->lectures as $lIndex => $lecture)
                            <a href="{{ route('student.course.learn', [$course, 'lecture' => $lecture->id]) }}" 
                               class="flex items-center gap-4 p-3 rounded-xl transition-all group {{ $currentLecture->id == $lecture->id ? 'bg-indigo-600/10 border border-indigo-600/20 text-indigo-400' : 'text-gray-500 hover:bg-white/[0.03]' }}">
                                <div class="relative">
                                    @if(in_array($lecture->id, $completed))
                                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-500"></i>
                                    @else
                                        <i data-lucide="play-circle" class="w-4 h-4 group-hover:text-indigo-400 transition"></i>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-[11px] font-bold uppercase tracking-tight truncate leading-none mb-1">{{ $lecture->title }}</p>
                                    <p class="text-[9px] font-medium opacity-50 uppercase tracking-widest">{{ $lecture->duration ?? 'Video Session' }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Discussion Shortcut -->
        <div class="p-6 border-t border-white/5 bg-[#111]">
            <a href="{{ route('student.course.discussions', $course) }}" class="flex items-center justify-center gap-3 px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-[10px] font-bold text-gray-300 uppercase tracking-widest hover:bg-white/10 transition group">
                <i data-lucide="message-square" class="w-4 h-4 text-indigo-400"></i>
                Join Discussion
            </a>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 3px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();

        document.getElementById('markCompleteBtn')?.addEventListener('click', function() {
            const btn = this;
            const url = btn.getAttribute('data-url');
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            btn.disabled = true;
            btn.classList.add('opacity-50');

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.done) {
                    btn.innerHTML = `<i data-lucide="check-check" class="w-4 h-4"></i> VALIDATED`;
                    btn.classList.replace('bg-indigo-600', 'bg-green-500/10');
                    btn.classList.replace('text-white', 'text-green-500');
                    btn.classList.add('border-green-500/20');
                    document.getElementById('progressBarText').innerText = res.progress + '%';
                    lucide.createIcons();
                    
                    const notyf = new Notyf({
                        duration: 3000,
                        position: { x: 'right', y: 'bottom' }
                    });
                    notyf.success('Intelligence Logged: Module Validated.');
                    
                    if(res.progress === 100) {
                       notyf.success('🏆 BLUEPRINT COMPLETED: Full Integration achieved.');
                    }
                }
                btn.disabled = false;
                btn.classList.remove('opacity-50');
            });
        });
    });
</script>
@endpush
@endsection
