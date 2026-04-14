@extends('Dashboards.instructor.dashboard')

@section('Idash')
<main class="flex-1 p-10 overflow-y-auto bg-primary-dark">

    <header class="flex justify-between items-center mb-12">
        <div>
            <h2 class="text-4xl font-light text-white">Students & <span class="font-bold text-instructor-purple">Enrollments</span></h2>
            <p class="text-gray-400 mt-2">Managing your global student community.</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="px-6 py-3 bg-secondary-dark rounded-2xl border border-gray-700">
                <p class="text-[10px] font-black uppercase text-gray-500 tracking-widest">Total Active Students</p>
                <p class="text-lg font-bold text-white">{{ $enrollments->total() }}</p>
            </div>
        </div>
    </header>

    <div class="bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary-dark/50">
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-gray-500 border-b border-gray-800">Student</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-gray-500 border-b border-gray-800">Email</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-gray-500 border-b border-gray-800">Course</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-gray-500 border-b border-gray-800">Enrolled On</th>
                        <th class="p-6 text-[10px] font-black uppercase tracking-widest text-gray-500 border-b border-gray-800">Revenue</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse($enrollments as $enroll)
                        <tr class="group hover:bg-primary-dark/30 transition">
                            <td class="p-6">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($enroll->user->name) }}&background=8b5cf6&color=fff" 
                                         class="w-10 h-10 rounded-xl border border-gray-700">
                                    <span class="text-sm font-bold text-white group-hover:text-instructor-purple transition">{{ $enroll->user->name }}</span>
                                </div>
                            </td>
                            <td class="p-6 text-sm text-gray-400 font-medium">{{ $enroll->user->email }}</td>
                            <td class="p-6">
                                <span class="text-xs font-bold text-gray-300 bg-gray-800 px-3 py-1 rounded-full border border-gray-700">{{ $enroll->course->title }}</span>
                            </td>
                            <td class="p-6 text-sm text-gray-500 font-black uppercase tracking-tighter">{{ $enroll->created_at->format('M d, Y') }}</td>
                            <td class="p-6">
                                <span class="text-sm font-black text-green-500 group-hover:scale-110 transition inline-block">${{ number_format($enroll->amount_paid, 2) }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-20 text-center opacity-30">
                                <i data-lucide="users-2" class="w-16 h-16 mx-auto mb-4"></i>
                                <p class="text-xl font-black uppercase tracking-[0.2em]">No Enrollments Yet</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($enrollments->hasPages())
            <div class="p-6 bg-primary-dark/20 border-t border-gray-800">
                {{ $enrollments->links() }}
            </div>
        @endif
    </div>

</main>
@endsection
