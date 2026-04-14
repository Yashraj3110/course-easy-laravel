@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-950 py-20 px-6">
    <div class="max-w-xl w-full text-center">
        
        <!-- Result Icon -->
        <div class="relative w-48 h-48 mx-auto mb-12">
            @if($attempt->passed)
                <div class="absolute inset-0 bg-green-500 rounded-[2.5rem] blur-3xl opacity-30 animate-pulse"></div>
                <div class="relative w-full h-full bg-white dark:bg-gray-900 rounded-[3rem] shadow-2xl flex items-center justify-center border-4 border-green-500">
                    <i data-lucide="party-popper" class="w-20 h-20 text-green-500 animate-bounce"></i>
                </div>
            @else
                <div class="absolute inset-0 bg-red-500 rounded-[2.5rem] blur-3xl opacity-30 animate-pulse"></div>
                <div class="relative w-full h-full bg-white dark:bg-gray-900 rounded-[3rem] shadow-2xl flex items-center justify-center border-4 border-red-500">
                    <i data-lucide="frown" class="w-20 h-20 text-red-500"></i>
                </div>
            @endif
        </div>

        <h1 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white mb-4 leading-tight">
            {{ $attempt->passed ? 'Congratulations!' : 'Keep Practicing!' }}
        </h1>
        <p class="text-xl text-gray-500 dark:text-gray-400 mb-12">
            {{ $attempt->passed ? 'You successfully passed the quiz.' : 'You didn\'t reach the passing score this time.' }}
        </p>

        <!-- Stats Card -->
        <div class="grid grid-cols-2 gap-4 mb-12">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
                <p class="text-[10px] font-black uppercase tracking-widest text-indigo-500 mb-1">Your Score</p>
                <p class="text-3xl font-black text-gray-900 dark:text-white">{{ $attempt->score }} <span class="text-sm text-gray-400">/ {{ $attempt->total_marks }}</span></p>
            </div>
            <div class="p-6 bg-white dark:bg-gray-900 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
                <p class="text-[10px] font-black uppercase tracking-widest text-indigo-500 mb-1">Passing Mark</p>
                <p class="text-3xl font-black text-gray-900 dark:text-white">{{ $quiz->passing_marks }}</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('student.course.learn', $course) }}" 
               class="flex-1 px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-xl shadow-indigo-500/30 transition transform active:scale-95 flex items-center justify-center gap-3">
                <i data-lucide="play" class="w-5 h-5"></i>
                BACK TO COURSE
            </a>
            @if(!$attempt->passed)
                <a href="{{ route('student.quiz.show', [$course, $quiz]) }}" 
                   class="flex-1 px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white font-black rounded-2xl border-2 border-indigo-600 dark:border-indigo-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition transform active:scale-95 flex items-center justify-center gap-3">
                    <i data-lucide="rotate-ccw" class="w-5 h-5"></i>
                    RETRY QUIZ
                </a>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    lucide.createIcons();
    @if($attempt->passed)
        const notyf = new Notyf();
        notyf.success('🎉 Well done! You passed the quiz!');
    @endif
</script>
@endpush
@endsection
