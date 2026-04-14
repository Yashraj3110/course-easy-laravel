@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-[#050505] min-h-screen selection:bg-indigo-500 selection:text-white pb-32">
    
    <!-- Header -->
    <header class="pt-24 pb-12 relative overflow-hidden bg-white dark:bg-[#080808] border-b border-gray-100 dark:border-white/5">
        <div class="container mx-auto px-6 max-w-5xl relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-6">
                <a href="{{ route('student.course.learn', $course) }}" class="p-3 bg-gray-50 dark:bg-white/5 rounded-xl border border-gray-100 dark:border-white/10 hover:border-indigo-500 transition-all text-gray-400 hover:text-indigo-500">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                </a>
                <div class="space-y-1">
                    <p class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest leading-none">Discussion Forum</p>
                    <h1 class="text-2xl md:text-4xl font-extrabold text-gray-900 dark:text-white leading-tight tracking-tight">
                        {{ $course->title }}
                    </h1>
                </div>
            </div>
            <div class="flex items-center gap-4">
                 <div class="flex -space-x-2">
                     @foreach($discussions->unique('user_id')->take(4) as $d)
                        <img src="https://ui-avatars.com/?name={{ urlencode($d->user->name) }}&background=6366f1&color=fff" class="w-9 h-9 rounded-full border-2 border-white dark:border-[#080808] object-cover">
                     @endforeach
                 </div>
                 <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $discussions->count() }} Comments</span>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 max-w-4xl py-12" x-data="{ openReply: null }">
        <div class="space-y-8">
            @forelse($discussions as $disc)
                <div class="bg-white dark:bg-[#0d0d0d] rounded-2xl p-6 md:p-8 border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-start gap-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($disc->user->name) }}&background=6366f1&color=fff" 
                             class="w-12 h-12 rounded-xl object-cover shadow-sm">
                        
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-bold text-gray-900 dark:text-white">{{ $disc->user->name }}</span>
                                    @if($disc->user->role === 'instructor' || $disc->user->role === 'admin')
                                        <span class="bg-indigo-600 text-[9px] font-bold px-1.5 py-0.5 rounded text-white uppercase tracking-wider">Instructor</span>
                                    @endif
                                    <span class="text-xs text-gray-400 font-medium ml-2">{{ $disc->created_at->diffForHumans() }}</span>
                                </div>
                                <form action="{{ route('student.discussion.upvote', $disc) }}" method="POST">
                                    @csrf
                                    <button class="flex items-center gap-1.5 text-gray-400 hover:text-indigo-500 transition group px-3 py-1 rounded-lg hover:bg-indigo-50 dark:hover:bg-indigo-500/10">
                                        <i data-lucide="heart" class="w-4 h-4 group-hover:fill-indigo-500"></i>
                                        <span class="text-xs font-bold">{{ $disc->upvotes }}</span>
                                    </button>
                                </form>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-medium mb-4">
                                {{ $disc->comment }}
                            </p>

                            <!-- Mini Action Row -->
                            <div class="flex items-center gap-6">
                                <button @click="openReply = (openReply === {{ $disc->id }} ? null : {{ $disc->id }})" 
                                        class="flex items-center gap-2 text-xs font-bold text-gray-400 hover:text-indigo-500 transition uppercase tracking-widest">
                                    <i data-lucide="message-circle" class="w-4 h-4"></i> Reply
                                </button>
                            </div>

                            <!-- Replies -->
                            @if($disc->replies->count() > 0)
                                <div class="mt-6 space-y-6 pt-6 border-t border-gray-50 dark:border-white/5">
                                    @foreach($disc->replies as $reply)
                                        <div class="flex gap-4">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($reply->user->name) }}&background=4f46e5&color=fff" 
                                                 class="w-8 h-8 rounded-lg object-cover">
                                            <div class="flex-1">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <span class="text-xs font-bold text-gray-900 dark:text-white">{{ $reply->user->name }}</span>
                                                    <span class="text-[10px] text-gray-400 font-medium">{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">{{ $reply->comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Reply Form -->
                            <div x-show="openReply === {{ $disc->id }}" x-collapse x-cloak class="mt-6">
                                <form action="{{ route('student.course.discussions.store', $course) }}" method="POST" class="space-y-3">
                                    @csrf
                                    <input type="hidden" name="parent_id" value="{{ $disc->id }}">
                                    <textarea name="comment" required rows="2" 
                                        placeholder="Write a response..."
                                        class="w-full bg-gray-50 dark:bg-white/[0.03] rounded-xl p-4 border border-gray-100 dark:border-white/5 focus:ring-2 focus:ring-indigo-500 text-sm text-gray-900 dark:text-white outline-none transition"></textarea>
                                    <div class="flex justify-end">
                                        <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-xs font-bold uppercase tracking-widest rounded-lg transition hover:bg-indigo-700">Reply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 bg-white dark:bg-[#0d0d0d] rounded-3xl border border-gray-100 dark:border-white/5">
                    <i data-lucide="message-square-off" class="w-12 h-12 mx-auto mb-4 text-gray-200"></i>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Be the first to speak</h2>
                    <p class="text-sm text-gray-500 mt-1">Initialize the conversation protocol.</p>
                </div>
            @endforelse
        </div>

        <!-- Sticky Bottom Bar -->
        <div class="fixed bottom-8 left-1/2 -translate-x-1/2 w-full max-w-2xl px-6 z-50">
            <div class="bg-white/80 dark:bg-black/60 backdrop-blur-xl rounded-2xl p-4 border border-gray-200 dark:border-white/10 shadow-2xl flex items-center gap-4">
                <form action="{{ route('student.course.discussions.store', $course) }}" method="POST" class="flex-1 flex gap-3">
                    @csrf
                    <input type="text" name="comment" required autocomplete="off"
                        placeholder="Type your message..."
                        class="flex-1 bg-transparent border-none focus:ring-0 text-sm font-medium text-gray-900 dark:text-white py-2 placeholder-gray-400">
                    <button type="submit" class="p-2.5 bg-indigo-600 text-white rounded-xl shadow-lg shadow-indigo-600/20 hover:scale-105 active:scale-95 transition">
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </button>
                </form>
            </div>
        </div>
    </main>
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
        scrollbar-color: #4f46e5 #050505;
    }
    [x-cloak] { display: none !important; }
</style>
@endpush
