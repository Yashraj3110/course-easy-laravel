@extends('Dashboards.admin.dashboard')

@section('Adash')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-white mb-6">Content Approval</h1>

    <div class="space-y-3">
        <div class="p-4 bg-gray-800/40 border border-gray-700/50 rounded-xl flex justify-between">
            <div>
                <h2 class="text-white font-semibold">React JS Full Course</h2>
                <p class="text-gray-400 text-sm">Submitted by: Rahul Sharma</p>
            </div>
            <div class="space-x-2">
                <button class="px-3 py-1 bg-green-600/50 rounded-lg text-white">Approve</button>
                <button class="px-3 py-1 bg-red-600/50 rounded-lg text-white">Reject</button>
            </div>
        </div>
    </div>

</div>
@endsection
