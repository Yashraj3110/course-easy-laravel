@extends('Dashboards.instructor.dashboard')

@section('Idash')
<main class="flex-1 p-10 overflow-y-auto bg-primary-dark">

    <header class="flex justify-between items-center mb-12">
        <div>
            <h2 class="text-4xl font-light text-white">Instructor <span class="font-bold text-instructor-purple track-tighter">HQ</span></h2>
            <p class="text-gray-400 mt-2">Empowering students, one lesson at a time.</p>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('courses.create') }}" class="py-4 px-8 bg-instructor-purple text-white font-black rounded-2xl hover:bg-opacity-90 shadow-xl shadow-instructor-purple/20 transition transform active:scale-95 flex items-center gap-2 uppercase tracking-widest text-xs">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                Create New Course
            </a>
        </div>
    </header>

    <!-- Analytics Cards -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="book-open" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2">My Courses</p>
            <h3 class="text-4xl font-black text-white mb-2">{{ $stats['total_courses'] }}</h3>
            <div class="flex items-center gap-1 text-[10px] text-instructor-purple font-black uppercase">
                <i data-lucide="trending-up" class="w-3 h-3"></i> Updated live
            </div>
        </div>

        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="users" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2">Total Students</p>
            <h3 class="text-4xl font-black text-white mb-2">{{ number_format($stats['total_students']) }}</h3>
            <div class="flex items-center gap-1 text-[10px] text-green-500 font-black uppercase">
                <i data-lucide="arrow-up-right" class="w-3 h-3"></i> Enrolled
            </div>
        </div>

        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="dollar-sign" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2">My Earnings</p>
            <h3 class="text-4xl font-black text-white mb-2">${{ number_format($stats['total_earnings'], 2) }}</h3>
            <div class="flex items-center gap-1 text-[10px] text-accent-gold font-black uppercase">
                <i data-lucide="wallet" class="w-3 h-3"></i> Total Revenue
            </div>
        </div>

        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="clock" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2">Pending Review</p>
            <h3 class="text-4xl font-black text-white mb-2 ml-1">{{ $stats['pending_review'] }}</h3>
            <div class="flex items-center gap-1 text-[10px] text-orange-500 font-black uppercase">
                <i data-lucide="alert-circle" class="w-3 h-3"></i> Awaiting Admin
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Recent Courses -->
        <section class="bg-secondary-dark rounded-[3rem] p-10 border border-gray-700/50 shadow-2xl">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-black text-white uppercase tracking-tight">Recent Courses</h3>
                <a href="{{ route('dashboard.instructor.courses') }}" class="text-[10px] font-black text-instructor-purple hover:underline uppercase tracking-widest">View All</a>
            </div>
            <div class="space-y-4">
                @foreach($my_courses as $course)
                    <div class="flex items-center gap-4 p-4 bg-primary-dark/50 rounded-[2rem] border border-gray-800 group hover:border-instructor-purple/30 transition shadow-inner">
                        <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://placehold.co/100/1e293b/fff?text='.$course->title }}" 
                             class="w-16 h-16 rounded-[1.5rem] object-cover shadow-lg">
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-white group-hover:text-instructor-purple transition line-clamp-1">{{ $course->title }}</h4>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[8px] font-black px-2 py-0.5 rounded {{ $course->approval === 'approved' ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500' }} uppercase">{{ $course->approval }}</span>
                                <span class="text-[8px] font-black px-2 py-0.5 rounded bg-gray-500/10 text-gray-400 uppercase">{{ $course->status }}</span>
                            </div>
                        </div>
                        <a href="{{ route('courses.edit', $course) }}" class="p-3 bg-gray-800 rounded-xl text-gray-400 hover:text-white transition">
                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Student Activity -->
        <section class="bg-secondary-dark rounded-[3rem] p-10 border border-gray-700/50 shadow-2xl">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-black text-white uppercase tracking-tight">Student Engagement</h3>
            </div>
            <div class="space-y-6">
                @foreach($recent_enrollments as $enroll)
                    <div class="flex items-center gap-4 group">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($enroll->user->name) }}&background=8b5cf6&color=fff" 
                             class="w-12 h-12 rounded-[1.25rem] border-2 border-gray-800 group-hover:border-instructor-purple transition">
                        <div class="flex-1">
                            <p class="text-sm font-bold text-white leading-tight">{{ $enroll->user->name }}</p>
                            <p class="text-[10px] text-gray-500 mt-1 italic">Joined <span class="text-instructor-purple font-bold">#{{ $enroll->course->title }}</span></p>
                        </div>
                        <p class="text-[10px] text-gray-600 font-black uppercase">{{ $enroll->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach
                
                @if($recent_enrollments->count() == 0)
                     <div class="text-center py-10">
                        <i data-lucide="users" class="w-10 h-10 text-gray-700 mx-auto mb-4"></i>
                        <p class="text-gray-500 text-sm">No recent students yet.</p>
                     </div>
                @endif
            </div>
        </section>
    </div>

</main>
@endsection
