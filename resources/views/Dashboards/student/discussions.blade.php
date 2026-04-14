@extends('Dashboards.student.dashboard')

@section('Sdash')
    <section class="w-full p-2 bg-[#313338] rounded-2xl shadow-xl border border-gray-700 overflow-hidden">
        <div class="p-6 border-b border-gray-700 bg-[#2b2d31]">
            <h2 class="text-xl font-bold text-white flex items-center gap-3">
                <i data-lucide="hash" class="w-6 h-6 text-gray-400"></i> Activity Feed
            </h2>
            <p class="text-xs text-gray-400 mt-1">Recent conversations across your enrolled courses.</p>
        </div>

        <div class="flex flex-col">
            @forelse($discussions as $discussion)
                <a href="{{ route('student.course.discussions', $discussion->course) }}" 
                   class="group flex gap-4 p-4 hover:bg-[#2e3035] border-b border-gray-800/50 last:border-0 transition">
                    
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($discussion->user->name) }}&background=6366f1&color=fff" 
                         class="w-10 h-10 rounded-full flex-shrink-0 mt-1">
                    
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="font-bold text-white text-sm group-hover:underline">{{ $discussion->user->name }}</span>
                            @if($discussion->user->role === 'instructor' || $discussion->user->role === 'admin')
                                <span class="bg-indigo-600 text-[8px] font-black px-1.5 py-0.5 rounded text-white uppercase tracking-tighter">Instructor</span>
                            @endif
                            <span class="text-[10px] text-gray-500">{{ $discussion->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <div class="text-[10px] text-indigo-400 font-bold uppercase tracking-widest mb-2"># {{ $discussion->course->title }}</div>
                        
                        <p class="text-[#dbdee1] text-sm leading-relaxed line-clamp-2">
                             {{ $discussion->comment }}
                        </p>

                        <div class="mt-3 flex items-center gap-3 text-xs text-gray-500 font-bold opacity-0 group-hover:opacity-100 transition">
                            <span class="flex items-center gap-1"><i data-lucide="thumbs-up" class="w-3.5 h-3.5"></i> {{ $discussion->upvotes }}</span>
                            @if($discussion->replies_count > 0)
                                <span class="flex items-center gap-1"><i data-lucide="message-square" class="w-3.5 h-3.5"></i> {{ $discussion->replies_count }} replies</span>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
                <div class="py-20 text-center">
                    <i data-lucide="message-circle" class="w-12 h-12 text-gray-700 mx-auto mb-4"></i>
                    <p class="text-gray-500 text-sm">Silence... no activity in your courses yet.</p>
                </div>
            @endforelse
        </div>

        @if($discussions->hasPages())
            <div class="p-6 bg-[#2b2d31]">
                {{ $discussions->links() }}
            </div>
        @endif
    </section>
@endsection
