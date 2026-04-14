@extends('Dashboards.student.dashboard')

@section('Sdash')
<main class="flex-1 p-8 overflow-y-auto">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h2 class="text-3xl font-black text-white">My Courses</h2>
            <p class="text-gray-500 mt-1">Manage and track your learning progress across all enrolled courses.</p>
        </div>
        <div class="flex items-center gap-3">
             <span class="text-xs font-black text-gray-500 uppercase tracking-widest bg-secondary-dark px-4 py-2 rounded-xl"> Total: {{ $enrollments->total() }} </span>
        </div>
    </div>

    @if($enrollments->count() > 0)
        <!-- Dynamic Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($enrollments as $enrollment)
                <div class="bg-secondary-dark rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-700/50 group hover:border-accent-blue/50 transition-all duration-500">
                    <!-- Thumbnail -->
                    <div class="h-44 bg-gray-800 relative overflow-hidden">
                        <img src="{{ $enrollment->course->thumbnail ? asset($enrollment->course->thumbnail) : 'https://placehold.co/600x400/1e293b/fff?text='.$enrollment->course->title }}" 
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary-dark/90 to-transparent"></div>
                        
                        <div class="absolute top-4 right-4 bg-white/10 backdrop-blur-md rounded-xl p-2">
                             <i data-lucide="bookmark" class="w-4 h-4 text-white"></i>
                        </div>

                        <div class="absolute bottom-4 left-6">
                            <span class="px-3 py-1 bg-accent-blue/20 text-accent-blue text-[10px] font-black rounded-lg uppercase tracking-widest border border-accent-blue/30 backdrop-blur-sm">
                                {{ $enrollment->course->category->name ?? 'Enrolled' }}
                            </span>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-black text-white leading-tight group-hover:text-accent-blue transition line-clamp-1">
                                {{ $enrollment->course->title }}
                            </h3>
                        </div>

                        <div class="flex items-center gap-2 mb-6 text-gray-400">
                            <i data-lucide="user" class="w-3.5 h-3.5"></i>
                            <span class="text-xs font-bold">{{ $enrollment->course->tutor->name }}</span>
                        </div>

                        <!-- Progress Section -->
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-black text-gray-500 uppercase">Progress</span>
                                <span class="text-xs font-black text-accent-gold">{{ $enrollment->progress_percent }}%</span>
                            </div>
                            <div class="w-full bg-gray-900 rounded-full h-2">
                                <div class="h-2 rounded-full bg-gradient-to-r from-accent-blue to-accent-gold shadow-[0_0_10px_rgba(99,102,241,0.2)] transition-all duration-1000" style="width: {{ $enrollment->progress_percent }}%"></div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('student.course.learn', $enrollment->course) }}" 
                               class="flex-1 text-center py-4 bg-accent-blue hover:bg-indigo-600 text-white font-black rounded-2xl transition duration-300 shadow-xl shadow-accent-blue/20 flex items-center justify-center gap-2">
                                <i data-lucide="play-circle" class="w-5 h-5"></i>
                                CONTINUE
                            </a>
                            <a href="{{ route('courses.show', $enrollment->course) }}" 
                               class="p-4 bg-gray-800 hover:bg-gray-700 text-gray-400 rounded-2xl transition">
                                <i data-lucide="info" class="w-5 h-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $enrollments->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="py-32 text-center bg-secondary-dark rounded-[3rem] border-2 border-dashed border-gray-800">
            <div class="w-24 h-24 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                <i data-lucide="search" class="w-10 h-10 text-gray-600"></i>
            </div>
            <h4 class="text-3xl font-black text-white mb-4">No Courses Found</h4>
            <p class="text-gray-500 max-w-md mx-auto mb-10 leading-relaxed">It looks like you haven't started your learning journey yet. Dive into our catalog and find your next skill!</p>
            <a href="{{ route('courses') }}" class="inline-flex items-center gap-3 py-5 px-10 bg-accent-gold text-primary-dark font-black rounded-[2rem] shadow-2xl shadow-yellow-500/20 hover:scale-105 transition active:scale-95">
                DISCOVER COURSES
                <i data-lucide="sparkles" class="w-5 h-5"></i>
            </a>
        </div>
    @endif
</main>
@endsection
