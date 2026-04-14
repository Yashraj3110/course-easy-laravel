@extends('Dashboards.admin.dashboard')

@section('Adash')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-white mb-6">Content Approval</h1>

    {{-- Tabs --}}
    <div class="mb-6">
        <nav class="flex border-b border-gray-700">
            <button id="pendingTab" 
                    class="px-4 py-2 -mb-px font-semibold text-blue-400 border-b-2 border-blue-400 focus:outline-none">
                Pending
            </button>
            <button id="approvedTab" 
                    class="px-4 py-2 -mb-px font-semibold text-gray-300 border-b-2 border-transparent hover:text-green-400 focus:outline-none">
                Approved
            </button>
        </nav>
    </div>

    {{-- Pending Content --}}
    <div id="pendingContent">
        @forelse($pending as $course)
        <div class="p-6 bg-gray-800/40 border border-gray-700/50 rounded-2xl flex justify-between items-center mb-4 hover:border-gray-600 transition">
            <div class="flex items-center gap-4">
                <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://placehold.co/100x100/333/fff?text=Thumb' }}" class="w-16 h-16 rounded-xl object-cover">
                <div>
                    <h2 class="text-white font-bold text-lg">{{ $course->title }}</h2>
                    <p class="text-gray-400 text-sm">Instructor: <span class="text-blue-400">{{ $course->tutor->name }}</span></p>
                </div>
            </div>
            <div class="flex gap-2">
                <form action="{{ route('courses.approve', $course) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-5 py-2 bg-green-600 hover:bg-green-700 rounded-xl text-white font-bold transition">Approve</button>
                </form>
                <form action="{{ route('courses.reject', $course) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-5 py-2 bg-red-600 hover:bg-red-700 rounded-xl text-white font-bold transition">Reject</button>
                </form>
            </div>
        </div>
        @empty
        <div class="p-12 text-center bg-gray-800/20 rounded-2xl border border-dashed border-gray-700">
            <p class="text-gray-500">No pending courses to review.</p>
        </div>
        @endforelse
    </div>

    {{-- Approved Content --}}
    <div id="approvedContent" class="hidden">
        @forelse($approved as $course)
        <div class="p-6 bg-gray-800/40 border border-gray-700/50 rounded-2xl flex justify-between items-center mb-4">
            <div class="flex items-center gap-4">
                <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://placehold.co/100x100/333/fff?text=Thumb' }}" class="w-16 h-16 rounded-xl object-cover grayscale">
                <div>
                    <h2 class="text-white font-bold text-lg">{{ $course->title }}</h2>
                    <p class="text-gray-400 text-sm">Instructor: {{ $course->tutor->name }}</p>
                </div>
            </div>
            <div>
                <span class="px-4 py-1.5 bg-green-500/20 text-green-400 rounded-lg border border-green-500/30 text-xs font-bold uppercase tracking-widest">Live</span>
            </div>
        </div>
        @empty
        <div class="p-12 text-center bg-gray-800/20 rounded-2xl border border-dashed border-gray-700">
            <p class="text-gray-500">No approved courses yet.</p>
        </div>
        @endforelse
    </div>
</div>

{{-- Tabs Script --}}
<script>
    const pendingTab = document.getElementById('pendingTab');
    const approvedTab = document.getElementById('approvedTab');
    const pendingContent = document.getElementById('pendingContent');
    const approvedContent = document.getElementById('approvedContent');

    pendingTab.addEventListener('click', () => {
        pendingContent.classList.remove('hidden');
        approvedContent.classList.add('hidden');

        pendingTab.classList.add('text-blue-400', 'border-blue-400');
        pendingTab.classList.remove('text-gray-300', 'border-transparent');

        approvedTab.classList.add('text-gray-300', 'border-transparent');
        approvedTab.classList.remove('text-green-400', 'border-green-400');
    });

    approvedTab.addEventListener('click', () => {
        approvedContent.classList.remove('hidden');
        pendingContent.classList.add('hidden');

        approvedTab.classList.add('text-green-400', 'border-green-400');
        approvedTab.classList.remove('text-gray-300', 'border-transparent');

        pendingTab.classList.add('text-gray-300', 'border-transparent');
        pendingTab.classList.remove('text-blue-400', 'border-blue-400');
    });
</script>
@endsection
