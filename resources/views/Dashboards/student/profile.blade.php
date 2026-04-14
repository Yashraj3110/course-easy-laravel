@extends('Dashboards.student.dashboard')

@section('Sdash')
<main class="flex-1 p-8 lg:p-12 overflow-y-auto">
    
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-black text-white mb-10 flex items-center gap-3">
            <i data-lucide="user" class="text-accent-blue"></i> My Profile
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <!-- Profile Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-secondary-dark rounded-[2.5rem] p-8 border border-gray-700/50 text-center shadow-2xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-blue/5 to-transparent opacity-0 group-hover:opacity-100 transition duration-700"></div>
                    
                    <div class="relative">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6366f1&color=fff&size=200" 
                             class="w-32 h-32 rounded-[2rem] mx-auto mb-6 border-4 border-gray-800 shadow-xl group-hover:scale-105 transition duration-500">
                        <h3 class="text-xl font-black text-white mb-1">{{ $user->name }}</h3>
                        <p class="text-xs font-black text-accent-gold uppercase tracking-widest mb-6">Student Explorer</p>
                    </div>

                    <div class="space-y-3 pt-6 border-t border-gray-800">
                        <div class="flex items-center justify-between text-xs font-bold text-gray-500">
                            <span>Courses</span>
                            <span class="text-white">{{ $user->enrollments()->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs font-bold text-gray-500">
                            <span>Points</span>
                            <span class="text-accent-blue">2,450 XP</span>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary-dark rounded-[2.5rem] p-6 border border-gray-700/50 shadow-xl">
                    <h4 class="text-sm font-black text-white uppercase tracking-widest mb-4 flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-accent-blue"></i> Bio
                    </h4>
                    <p class="text-sm text-gray-400 leading-relaxed italic">
                        {{ $user->bio ?? 'No bio shared yet... Update your profile to tell us about your learning goals!' }}
                    </p>
                </div>
            </div>

            <!-- Profile Details -->
            <div class="lg:col-span-2">
                <div class="bg-secondary-dark rounded-[2.5rem] p-10 border border-gray-700/50 shadow-2xl">
                    <div class="flex justify-between items-center mb-10">
                        <h3 class="text-xl font-black text-white uppercase tracking-tight">Personal Details</h3>
                        <a href="{{ route('dashboard.student.settings') }}" class="p-3 bg-gray-800 hover:bg-accent-blue text-white rounded-xl transition shadow-lg">
                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-1">
                            <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Full Name</label>
                            <p class="text-lg font-bold text-white">{{ $user->name }}</p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Email Address</label>
                            <p class="text-lg font-bold text-white">{{ $user->email }}</p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Phone Number</label>
                            <p class="text-lg font-bold text-white">{{ $user->phone ?? 'Not provided' }}</p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Gender</label>
                            <p class="text-lg font-bold text-white">{{ ucfirst($user->gender) ?? 'Not shared' }}</p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Date of Birth</label>
                            <p class="text-lg font-bold text-white">{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('M d, Y') : 'Not shared' }}</p>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Joined On</label>
                            <p class="text-lg font-bold text-white">{{ $user->created_at->format('M Y') }}</p>
                        </div>
                    </div>

                    <!-- Achievement Badges (LMS Feature) -->
                    <div class="mt-16 pt-10 border-t border-gray-800">
                        <h4 class="text-sm font-black text-white uppercase tracking-widest mb-6">Earned Badges</h4>
                        <div class="flex flex-wrap gap-4">
                            <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center group cursor-help" title="Early Adopter">
                                <i data-lucide="award" class="w-8 h-8 text-indigo-500 group-hover:scale-110 transition"></i>
                            </div>
                            <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center group cursor-help opacity-40" title="Course Master (Locked)">
                                <i data-lucide="zap" class="w-8 h-8 text-gray-500"></i>
                            </div>
                            <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center group cursor-help opacity-40" title="Quiz King (Locked)">
                                <i data-lucide="target" class="w-8 h-8 text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>
@endsection
