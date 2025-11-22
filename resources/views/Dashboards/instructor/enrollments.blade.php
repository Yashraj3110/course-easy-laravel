@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-100">Students & Enrollments</h1>
    <div class="flex items-center space-x-3">
      <input type="text" placeholder="Search students" class="bg-gray-900 text-gray-100 p-2 rounded-md border border-gray-700" />
      <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Export CSV</button>
    </div>
  </div>

  <div class="bg-gray-800 rounded-xl p-6">
    <table class="min-w-full text-left table-auto">
      <thead>
        <tr class="text-sm text-gray-400">
          <th class="p-3">Student</th>
          <th class="p-3">Email</th>
          <th class="p-3">Enrolled</th>
          <th class="p-3">Progress</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-700">
        <tr class="text-gray-100">
          <td class="p-3 flex items-center space-x-3">
            <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center">JR</div>
            <div>
              <div class="font-semibold">Jaya Rao</div>
              <div class="text-sm text-gray-400">India</div>
            </div>
          </td>
          <td class="p-3 text-gray-300">jaya@example.com</td>
          <td class="p-3 text-gray-300">Aug 10, 2025</td>
          <td class="p-3">
            <div class="w-48 bg-gray-700 rounded-full h-3 overflow-hidden">
              <div class="h-3 rounded-full bg-indigo-500" style="width:60%"></div>
            </div>
          </td>
          <td class="p-3">
            <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">View</button>
          </td>
        </tr>

        <tr class="text-gray-100">
          <td class="p-3 flex items-center space-x-3">
            <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center">MK</div>
            <div>
              <div class="font-semibold">Maya Khan</div>
              <div class="text-sm text-gray-400">UK</div>
            </div>
          </td>
          <td class="p-3 text-gray-300">maya@example.com</td>
          <td class="p-3 text-gray-300">Jul 22, 2025</td>
          <td class="p-3">
            <div class="w-48 bg-gray-700 rounded-full h-3 overflow-hidden">
              <div class="h-3 rounded-full bg-indigo-500" style="width:30%"></div>
            </div>
          </td>
          <td class="p-3">
            <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">View</button>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

    </main>
@endsection
