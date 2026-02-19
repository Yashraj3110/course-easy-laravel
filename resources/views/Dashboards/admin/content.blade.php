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
        @foreach($contents->where('approval', 'pending') as $content)
        <div class="p-4 bg-gray-800/40 border border-gray-700/50 rounded-xl flex justify-between mb-3">
            <div>
                <h2 class="text-white font-semibold">{{ $content->title }}</h2>
                <p class="text-gray-400 text-sm">Submitted by: {{ $content->submitted_by }}</p>
            </div>
            <div class="space-x-2">
                <button class="px-3 py-1 bg-green-600/50 rounded-lg text-white">Approve</button>
                <button class="px-3 py-1 bg-red-600/50 rounded-lg text-white">Reject</button>
            </div>
        </div>
        @endforeach
        @if($contents->where('approval', 'pending')->isEmpty())
        <p class="text-gray-400">No pending content.</p>
        @endif
    </div>

    {{-- Approved Content --}}
    <div id="approvedContent" class="hidden">
        @foreach($contents->where('approval', 'approved') as $content)
        <div class="p-4 bg-gray-800/40 border border-gray-700/50 rounded-xl flex justify-between mb-3">
            <div>
                <h2 class="text-white font-semibold">{{ $content->title }}</h2>
                <p class="text-gray-400 text-sm">Submitted by: {{ $content->submitted_by }}</p>
            </div>
            <div>
                <span class="px-3 py-1 bg-green-600/50 rounded-lg text-white">Approved</span>
            </div>
        </div>
        @endforeach
        @if($contents->where('approval', 'approved')->isEmpty())
        <p class="text-gray-400">No approved content.</p>
        @endif
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
