@extends('Dashboards.instructor.dashboard')

@section('Idash')
<main class="flex-1 p-10 overflow-y-auto bg-primary-dark">

    <header class="flex justify-between items-center mb-12">
        <div>
            <h2 class="text-4xl font-light text-white">Performance <span class="font-bold text-instructor-purple italic">Insights</span></h2>
            <p class="text-gray-400 mt-2">Historical data and platform performance metrics.</p>
        </div>
        <div class="flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-500 bg-secondary-dark px-4 py-2 rounded-xl border border-gray-700">
            <span class="w-2 h-2 rounded-full bg-green-500"></span> Live Data Feed
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- Revenue Card -->
        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group hover:border-instructor-purple/30 transition">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="wallet" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2">Platform Revenue</p>
            <h3 class="text-4xl font-black text-white mb-2">${{ number_format($stats['total_revenue'], 2) }}</h3>
            <p class="text-[10px] text-green-500 font-black uppercase tracking-widest flex items-center gap-1">
                <i data-lucide="trending-up" class="w-3 h-3"></i> Total Lifetime
            </p>
        </div>

        <!-- Students Card -->
        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group hover:border-instructor-purple/30 transition">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="users" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2">Total Students</p>
            <h3 class="text-4xl font-black text-white mb-2">{{ number_format($stats['total_students']) }}</h3>
            <p class="text-[10px] text-instructor-purple font-black uppercase tracking-widest flex items-center gap-1">
                <i data-lucide="users" class="w-3 h-3"></i> Unique Learners
            </p>
        </div>

        <!-- Rating Card -->
        <div class="p-8 bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl relative overflow-hidden group hover:border-instructor-purple/30 transition">
            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                <i data-lucide="star" class="w-16 h-16 text-white"></i>
            </div>
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest mb-2">Average Rating</p>
            <h3 class="text-4xl font-black text-white mb-2">{{ number_format($stats['avg_rating'], 1) }}</h3>
            <p class="text-[10px] text-accent-gold font-black uppercase tracking-widest flex items-center gap-1">
                <i data-lucide="award" class="w-3 h-3"></i> Top Tier Educator
            </p>
        </div>
    </div>

    <!-- Growth Visualization Placeholder -->
    <section class="bg-secondary-dark rounded-[3rem] p-12 border border-gray-700/50 shadow-2xl relative overflow-hidden">
        <div class="flex justify-between items-center mb-10">
            <h3 class="text-xl font-black text-white uppercase tracking-tight">Student Growth Trends</h3>
        </div>
        
        <div class="h-64 flex items-end gap-2 px-10 relative">
            <!-- Mock Bar Chart using CSS -->
            <div class="flex-1 bg-gray-800/50 rounded-t-xl hover:bg-instructor-purple/40 transition-all duration-500" style="height: 40%"></div>
            <div class="flex-1 bg-gray-800/50 rounded-t-xl hover:bg-instructor-purple/40 transition-all duration-500" style="height: 60%"></div>
            <div class="flex-1 bg-gray-800/50 rounded-t-xl hover:bg-instructor-purple/40 transition-all duration-500" style="height: 35%"></div>
            <div class="flex-1 bg-instructor-purple/80 rounded-t-xl hover:bg-instructor-purple transition-all duration-500" style="height: 85%"></div>
            <div class="flex-1 bg-gray-800/50 rounded-t-xl hover:bg-instructor-purple/40 transition-all duration-500" style="height: 55%"></div>
            <div class="flex-1 bg-gray-800/50 rounded-t-xl hover:bg-instructor-purple/40 transition-all duration-500" style="height: 70%"></div>
            <div class="flex-1 bg-gray-800/50 rounded-t-xl hover:bg-instructor-purple/40 transition-all duration-500 shadow-[0_0_20px_rgba(139,92,246,0.3)]" style="height: 95%"></div>
            
            <!-- Axis Labels -->
            <div class="absolute inset-0 flex flex-col justify-between text-[10px] font-black text-gray-700 uppercase -ml-16 py-4">
                <span>100%</span>
                <span>50%</span>
                <span>0%</span>
            </div>
        </div>
        
        <div class="flex justify-between px-10 mt-6 text-[10px] font-black text-gray-600 uppercase tracking-widest">
            <span>Monday</span>
            <span>Tuesday</span>
            <span>Wednesday</span>
            <span>Thursday</span>
            <span>Friday</span>
            <span>Saturday</span>
            <span>Sunday</span>
        </div>
    </section>

</main>
@endsection
