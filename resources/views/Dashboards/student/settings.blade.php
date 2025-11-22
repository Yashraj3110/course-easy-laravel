@extends('Dashboards.student.dashboard')

@section('Sdash')
<div class="p-6 text-gray-200">
    <h2 class="text-2xl font-semibold mb-6">⚙️ Account Settings</h2>

    <div class="bg-gray-800 p-6 rounded-xl space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-400">Full Name</label>
            <input type="text" value="John Doe"
                class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-lg p-2 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400">Email</label>
            <input type="email" value="john@example.com"
                class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-lg p-2 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-400">Change Password</label>
            <input type="password" placeholder="New Password"
                class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-lg p-2 text-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div class="flex justify-end">
            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-white transition">Save Changes</button>
        </div>
    </div>

    <div class="mt-8 bg-gray-800 p-6 rounded-xl">
        <h3 class="text-lg font-semibold text-red-400 mb-2">Danger Zone</h3>
        <p class="text-gray-400 mb-3">Delete your account and all related data permanently.</p>
        <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-white transition">Delete Account</button>
    </div>
</div>
@endsection
