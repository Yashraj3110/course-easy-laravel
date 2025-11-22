@extends('Dashboards.admin.dashboard')

@section('Adash')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-white mb-6">User Management</h1>

    <table class="w-full text-left border border-gray-700/50 bg-gray-800/40 rounded-xl">
        <thead class="bg-gray-900/40 text-gray-300">
            <tr>
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Role</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-400">
            <tr class="border-t border-gray-700/50">
                <td class="p-3">John Doe</td>
                <td class="p-3">john@example.com</td>
                <td class="p-3">Instructor</td>
                <td class="p-3"><span class="text-green-400">Active</span></td>
                <td class="p-3 space-x-2">
                    <button class="text-blue-400 hover:underline">Edit</button>
                    <button class="text-red-400 hover:underline">Ban</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
