@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white dark:bg-[#050505] selection:bg-indigo-500 selection:text-white pb-32">
    
    <!-- Modern Header -->
    <header class="pt-24 pb-20 relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-12">
                <div class="max-w-2xl">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-[11px] font-bold uppercase tracking-widest mb-6 border border-indigo-100 dark:border-indigo-500/20">
                        Course Repository
                    </span>
                    <h1 class="text-4xl md:text-7xl font-extrabold text-gray-900 dark:text-white leading-tight tracking-tight">
                        Excellence in <br> <span class="text-indigo-600">Motion.</span>
                    </h1>
                </div>

                <!-- Modern Search & Filters -->
                <form action="{{ route('courses') }}" method="GET" class="w-full lg:w-auto flex flex-col sm:flex-row gap-3 items-center">
                    <div class="relative w-full sm:w-[350px]">
                        <i data-lucide="search" class="absolute left-5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                        <input type="text" name="search" value="{{ request('search') }}" 
                            placeholder="Find your next challenge..."
                            class="w-full bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-2xl pl-12 pr-6 py-4 text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 outline-none transition duration-300">
                    </div>

                    <select name="category" onchange="this.form.submit()"
                        class="w-full sm:w-auto bg-gray-50 dark:bg-white/5 border border-gray-100 dark:border-white/10 rounded-2xl px-6 py-4 text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 outline-none cursor-pointer appearance-none pr-10">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('-', ' ', $cat)) }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </header>

    <!-- Catalog Grid -->
    <main class="container mx-auto px-6 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($courses as $course)
                <div class="group bg-white dark:bg-[#0d0d0d] rounded-3xl border border-gray-100 dark:border-white/5 hover:border-indigo-500/20 transition-all duration-500 overflow-hidden hover:shadow-2xl">
                    
                    <!-- Media Area -->
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://placehold.co/800x600/1e293b/fff?text='.$course->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute top-4 right-4">
                            <span class="px-2 py-1 bg-white/90 dark:bg-black/60 backdrop-blur rounded-lg text-[10px] font-bold uppercase text-gray-900 dark:text-white tracking-widest border border-white/20">
                                {{ $course->difficulty }}
                            </span>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-2 py-0.5 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-[10px] font-bold rounded uppercase tracking-wider">
                                {{ $course->category ?? 'General' }}
                            </span>
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 line-clamp-2 leading-tight group-hover:text-indigo-600 transition">
                            <a href="{{ route('courses.show', $course) }}">
                                {{ $course->title }}
                            </a>
                        </h3>

                        <div class="flex items-center gap-3 mb-6">
                            <img src="{{ $course->tutor->photo ? asset($course->tutor->photo) : 'https://ui-avatars.com/?name='.urlencode($course->tutor->name) }}" 
                                 class="w-6 h-6 rounded-full grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition">
                            <span class="text-xs text-gray-500 dark:text-gray-400 font-medium">{{ $course->tutor->name }}</span>
                        </div>

                        <!-- Action/Price -->
                        <div class="pt-5 border-t border-gray-50 dark:border-white/5 flex items-center justify-between">
                            @php $isEnrolled = in_array($course->id, $enrolled_ids); @endphp
                            
                            @if($isEnrolled)
                                <div class="flex flex-col">
                                    <span class="text-[9px] font-bold text-green-500 uppercase tracking-widest">Enrolled</span>
                                    <span class="text-xs text-gray-400 font-medium">Lifetime Access</span>
                                </div>
                                <a href="{{ route('student.course.learn', $course) }}" 
                                   class="px-5 py-2.5 bg-green-500 text-white font-bold text-[11px] rounded-xl hover:bg-green-600 transition shadow-lg shadow-green-500/20">
                                    RESUME
                                </a>
                            @else
                                <div class="flex flex-col">
                                    <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Price</span>
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">
                                        {{ $course->price > 0 ? '$'.number_format($course->price, 2) : 'FREE' }}
                                    </span>
                                </div>
                                <a href="{{ route('courses.show', $course) }}" 
                                   class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center transition-all group-hover:scale-110 shadow-lg shadow-indigo-600/20">
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-gray-50 dark:bg-white/[0.02] rounded-3xl border border-dashed border-gray-200 dark:border-white/5">
                    <i data-lucide="layers" class="w-12 h-12 mx-auto mb-4 text-gray-300"></i>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">No courses found</h2>
                    <p class="text-sm text-gray-500 mt-1">Try adjusting your filters or search keywords.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-20">
            {{ $courses->links('pagination::tailwind') }}
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
    /* Pagination Overrides */
    .pagination nav svg { width: 24px; }
    .pagination nav span, .pagination nav a { padding: 12px 20px !important; border-radius: 12px !important; font-weight: 800; font-size: 10px; text-transform: uppercase; letter-spacing: 0.1em; border: 1px solid rgba(128,128,128,0.1) !important; background: transparent !important; }
    .pagination nav .bg-indigo-600 { background: #4f46e5 !important; border-color: #4f46e5 !important; }
</style>
@endpush
