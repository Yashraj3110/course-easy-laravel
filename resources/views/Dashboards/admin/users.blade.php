@extends('Dashboards.admin.dashboard')

@section('Adash')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-white mb-6">User Management</h1>

    {{-- Tabs --}}
    <div class="mb-6">
        <nav class="flex border-b border-gray-700">
            <button id="studentsTab" 
                    class="px-4 py-2 -mb-px font-semibold text-blue-400 border-b-2 border-blue-400 focus:outline-none">
                Students
            </button>
            <button id="instructorsTab" 
                    class="px-4 py-2 -mb-px font-semibold text-gray-300 border-b-2 border-transparent hover:text-purple-400 focus:outline-none">
                Instructors
            </button>
        </nav>
    </div>

    {{-- Students Table --}}
    <div id="studentsContent">
        {{-- Search --}}
        <input type="text" id="studentSearch" placeholder="Search students..."
            class="w-full p-3 mb-4 rounded-lg bg-gray-700 text-white border border-gray-600"
            onkeyup="filterTable('studentsTable', this.value)">

        <table id="studentsTable" class="w-full text-left border border-gray-700/50 bg-gray-800/40 rounded-xl mb-8">
            <thead class="bg-gray-900/40 text-gray-300">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-400">
                @foreach($users->where('role', 'student') as $user)
                <tr class="border-t border-gray-700/50">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">
                        @if($user->status == 'active')
                            <span class="text-green-400">Active</span>
                        @else
                            <span class="text-red-400">Inactive</span>
                        @endif
                    </td>
                    <td class="p-3 space-x-2">
                        <button class="text-blue-400 hover:underline">Edit</button>
                        <button class="text-red-400 hover:underline">Ban</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Instructors Table --}}
    <div id="instructorsContent" class="hidden">
        {{-- Search --}}
        <input type="text" id="instructorSearch" placeholder="Search instructors..."
            class="w-full p-3 mb-4 rounded-lg bg-gray-700 text-white border border-gray-600"
            onkeyup="filterTable('instructorsTable', this.value)">

        <table id="instructorsTable" class="w-full text-left border border-gray-700/50 bg-gray-800/40 rounded-xl">
            <thead class="bg-gray-900/40 text-gray-300">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-400">
                @foreach($users->where('role', 'instructor') as $user)
                <tr class="border-t border-gray-700/50">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">
                        @if($user->status == 'active')
                            <span class="text-green-400">Active</span>
                        @else
                            <span class="text-red-400">Inactive</span>
                        @endif
                    </td>
                    <td class="p-3 space-x-2">
                        <button class="text-blue-400 hover:underline">Edit</button>
                        <button class="text-red-400 hover:underline">Ban</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Tabs & Search Script --}}
<script>
    const studentsTab = document.getElementById('studentsTab');
    const instructorsTab = document.getElementById('instructorsTab');
    const studentsContent = document.getElementById('studentsContent');
    const instructorsContent = document.getElementById('instructorsContent');

    studentsTab.addEventListener('click', () => {
        studentsContent.classList.remove('hidden');
        instructorsContent.classList.add('hidden');

        studentsTab.classList.add('text-blue-400', 'border-blue-400');
        studentsTab.classList.remove('text-gray-300', 'border-transparent');

        instructorsTab.classList.add('text-gray-300', 'border-transparent');
        instructorsTab.classList.remove('text-purple-400', 'border-purple-400');
    });

    instructorsTab.addEventListener('click', () => {
        instructorsContent.classList.remove('hidden');
        studentsContent.classList.add('hidden');

        instructorsTab.classList.add('text-purple-400', 'border-purple-400');
        instructorsTab.classList.remove('text-gray-300', 'border-transparent');

        studentsTab.classList.add('text-gray-300', 'border-transparent');
        studentsTab.classList.remove('text-blue-400', 'border-blue-400');
    });

    // Search Filter Function
    function filterTable(tableId, searchTerm) {
        const table = document.getElementById(tableId);
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        searchTerm = searchTerm.toLowerCase();

        Array.from(rows).forEach(row => {
            const name = row.cells[0].textContent.toLowerCase();
            const email = row.cells[1].textContent.toLowerCase();
            row.style.display = (name.includes(searchTerm) || email.includes(searchTerm)) ? '' : 'none';
        });
    }
</script>
@endsection
