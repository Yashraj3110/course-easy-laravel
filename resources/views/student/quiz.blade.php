@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white dark:bg-gray-950 py-12">
    <div class="container mx-auto px-6 max-w-4xl">
        
        <!-- Header -->
        <div class="flex items-center gap-4 mb-10">
            <a href="{{ route('student.course.learn', $course) }}" class="p-3 rounded-2xl bg-gray-100 dark:bg-gray-800 text-gray-500 hover:text-indigo-600 transition shadow-sm">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <div>
                <nav class="text-xs font-black uppercase tracking-widest text-indigo-500 mb-1">{{ $course->title }}</nav>
                <h1 class="text-3xl font-black text-gray-900 dark:text-white">{{ $quiz->title }}</h1>
            </div>
        </div>

        @if($previousAttempt)
            <div class="bg-indigo-50 dark:bg-indigo-900/20 rounded-[2rem] p-6 border border-indigo-100 dark:border-indigo-800 mb-10 flex items-center justify-between">
                <div>
                    <p class="text-indigo-800 dark:text-indigo-300 font-bold">Your Latest Attempt</p>
                    <p class="text-xs text-indigo-600 dark:text-indigo-400 mt-1">
                        Score: <strong>{{ $previousAttempt->score }}/{{ $previousAttempt->total_marks }}</strong> 
                        ({{ $previousAttempt->passed ? 'Passed' : 'Not Passed' }})
                    </p>
                </div>
                <div class="px-4 py-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm text-xs font-black uppercase tracking-widest text-indigo-600 dark:text-indigo-400">
                    Attempted {{ $previousAttempt->submitted_at->diffForHumans() }}
                </div>
            </div>
        @endif

        <!-- Quiz Form -->
        <form action="{{ route('student.quiz.submit', [$course, $quiz]) }}" method="POST" class="space-y-8">
            @csrf

            @foreach($quiz->questions as $index => $question)
                <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] border border-gray-100 dark:border-gray-800 p-8 md:p-12 shadow-sm">
                    <div class="flex items-start gap-6">
                        <div class="hidden md:flex w-14 h-14 shrink-0 rounded-[1.2rem] bg-indigo-600 text-white items-center justify-center text-xl font-black shadow-lg shadow-indigo-600/20">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl md:text-2xl font-black text-gray-900 dark:text-white mb-8 leading-tight">
                                {{ $question->question }}
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($question->options as $option)
                                    <label class="relative flex items-center p-5 rounded-2xl bg-gray-50 dark:bg-gray-800 border-2 border-transparent hover:border-indigo-500 transition cursor-pointer group">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->option_number }}" required
                                               class="w-5 h-5 text-indigo-600 border-gray-300 focus:ring-indigo-500 bg-white dark:bg-gray-700">
                                        <span class="ml-4 text-gray-700 dark:text-gray-300 font-bold group-hover:text-indigo-600 transition">
                                            {{ $option->option_text }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Footer -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-10 border-t border-gray-100 dark:border-gray-800">
                <div class="text-gray-500 dark:text-gray-400 font-medium">
                    Total Questions: <span class="font-black text-gray-900 dark:text-white">{{ $quiz->questions->count() }}</span>
                </div>
                <button type="submit" 
                        class="w-full md:w-auto px-12 py-5 bg-indigo-600 hover:bg-indigo-700 text-white font-black text-lg rounded-3xl shadow-2xl shadow-indigo-600/30 transition transform active:scale-95 flex items-center justify-center gap-3">
                    SUBMIT QUIZ
                    <i data-lucide="send" class="w-5 h-5"></i>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    lucide.createIcons();
    
    // Prevent leaving if form is touched
    let formDirty = false;
    document.querySelectorAll('input[type="radio"]').forEach(el => el.addEventListener('change', () => formDirty = true));
    
    window.addEventListener('beforeunload', (e) => {
        if(formDirty) {
            e.preventDefault();
            e.returnValue = '';
        }
    });

    document.querySelector('form').addEventListener('submit', () => formDirty = false);
</script>
@endpush
@endsection
