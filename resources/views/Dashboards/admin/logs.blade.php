@extends('Dashboards.admin.dashboard')

@section('Adash')
    <div class="p-6">
        <h1 class="text-2xl font-semibold text-white mb-6">System Logs</h1>

        <div class="bg-gray-900/40 p-4 rounded-xl border border-gray-700/50 max-h-[500px] overflow-y-auto custom-scrollbar">
            <p class="text-green-400">[12:32:14] ✔ User logged in: admin@example.com</p>
            <p class="text-yellow-400">[12:35:27] ⚠ Suspicious activity detected</p>
            <p class="text-red-400">[12:40:10] ❌ Unauthorized access attempt blocked</p>
            <p class="text-gray-400">… more logs …</p>
        </div>

    </div>
@endsection
