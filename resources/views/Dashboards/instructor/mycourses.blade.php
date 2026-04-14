@extends('Dashboards.instructor.dashboard')

@section('Idash')
<main class="flex-1 p-10 overflow-y-auto bg-primary-dark">

    <header class="flex justify-between items-center mb-12">
        <div>
            <h2 class="text-4xl font-light text-white">My <span class="font-bold text-instructor-purple track-tighter">Content</span></h2>
            <p class="text-gray-400 mt-2">Manage and monitor all your published and draft courses.</p>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('courses.create') }}" class="py-4 px-8 bg-instructor-purple text-white font-black rounded-2xl hover:bg-opacity-90 shadow-xl shadow-instructor-purple/20 transition transform active:scale-95 flex items-center gap-2 uppercase tracking-widest text-xs">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                New Course
            </a>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($courses as $course)
            <div class="bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl overflow-hidden group hover:border-instructor-purple/30 transition-all duration-500 flex flex-col">
                <!-- Thumbnail Area -->
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://placehold.co/800x600/1e293b/fff?text='.$course->title }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-secondary-dark via-transparent to-transparent"></div>
                    
                    <!-- Status Badge -->
                    <div class="absolute top-4 right-4 flex gap-2">
                        <span class="px-3 py-1 bg-primary-dark/80 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-white/10">
                            {{ $course->status }}
                        </span>
                        @if($course->approval === 'approved')
                            <span class="px-3 py-1 bg-green-500/80 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-green-400/20">
                                Published
                            </span>
                        @else
                            <span class="px-3 py-1 bg-red-500/80 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-white border border-red-400/20">
                                {{ $course->approval }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Content Area -->
                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-[10px] font-black text-instructor-purple uppercase tracking-[0.2em] bg-instructor-purple/10 px-3 py-1 rounded-lg border border-instructor-purple/20">{{ $course->difficulty }}</span>
                        <span class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] px-1 line-clamp-1">{{ $course->category }}</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-instructor-purple transition-colors line-clamp-2 leading-snug">
                        {{ $course->title }}
                    </h3>
                    
                    <p class="text-sm text-gray-500 line-clamp-2 mb-6 leading-relaxed">
                        {{ $course->description }}
                    </p>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4 mt-auto pt-6 border-t border-gray-800">
                        <div class="flex flex-col">
                            <span class="text-[9px] font-black text-gray-600 uppercase tracking-[0.2em]">Enrolled</span>
                            <span class="text-sm font-bold text-white">{{ $course->enrollments_count ?? 0 }} Students</span>
                        </div>
                        <div class="flex flex-col text-right">
                            <span class="text-[9px] font-black text-gray-600 uppercase tracking-[0.2em]">Rating</span>
                            <span class="text-sm font-bold text-accent-gold flex items-center justify-end gap-1">
                                <i data-lucide="star" class="w-3 h-3 fill-accent-gold"></i>
                                {{ number_format($course->rating, 1) }}
                            </span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="grid grid-cols-2 gap-3 mt-8">
                        <a href="{{ route('courses.edit', $course) }}" class="flex items-center justify-center gap-2 py-3 bg-gray-800 text-white text-xs font-black rounded-xl hover:bg-gray-700 transition uppercase tracking-widest">
                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                            Edit
                        </a>
                        <a href="{{ route('courses.show', $course) }}" class="flex items-center justify-center gap-2 py-3 bg-instructor-purple/10 text-instructor-purple text-xs font-black rounded-xl hover:bg-instructor-purple hover:text-white transition uppercase tracking-widest border border-instructor-purple/20">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                            View
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-32 text-center opacity-30">
                <i data-lucide="book-x" class="w-20 h-20 mx-auto mb-6"></i>
                <h3 class="text-2xl font-black uppercase tracking-[0.3em] mb-2 text-white">No Courses Found</h3>
                <p class="text-gray-400">Time to create your first masterpiece!</p>
            </div>
        @endforelse
    </div>

</main>
@endsection
