@extends('Dashboards.student.dashboard')

@section('Sdash')
<div class="p-6 text-gray-200">
    <h2 class="text-2xl font-semibold mb-6">💬 Course Discussions</h2>

    <!-- Discussion List -->
    <div class="space-y-4">
        <div class="bg-gray-800 p-4 rounded-xl">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white">Understanding React useEffect Hook</h3>
                <span class="text-sm text-gray-400">2h ago</span>
            </div>
            <p class="text-gray-400 mt-2">I’m confused about when to use dependencies inside useEffect. Can someone clarify?</p>
            <div class="mt-3 flex gap-2">
                <button class="text-blue-400 hover:underline text-sm">Reply</button>
                <button class="text-gray-400 hover:text-red-400 text-sm">Report</button>
            </div>
        </div>

        <div class="bg-gray-800 p-4 rounded-xl">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white">Best Resources for Learning Laravel</h3>
                <span class="text-sm text-gray-400">1d ago</span>
            </div>
            <p class="text-gray-400 mt-2">Any good YouTube channels or courses for mastering Laravel quickly?</p>
            <div class="mt-3 flex gap-2">
                <button class="text-blue-400 hover:underline text-sm">Reply</button>
                <button class="text-gray-400 hover:text-red-400 text-sm">Report</button>
            </div>
        </div>
    </div>

    <!-- Add Discussion -->
    <div class="mt-8">
        <h3 class="text-xl font-semibold mb-3 text-white">Start a Discussion</h3>
        <textarea class="w-full bg-gray-900 border border-gray-700 rounded-xl p-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Ask something or share your thoughts..."></textarea>
        <button class="mt-3 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-white transition">Post Discussion</button>
    </div>
</div>
@endsection
