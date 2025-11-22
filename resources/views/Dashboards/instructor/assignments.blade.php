@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">
<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-100">Assignments & Submissions</h1>
    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Create Assignment</button>
  </div>

  <div class="bg-gray-800 rounded-xl p-6 space-y-4">
    <div class="flex items-start justify-between">
      <div>
        <h3 class="text-lg font-semibold text-gray-100">Assignment: Build a Portfolio</h3>
        <p class="text-sm text-gray-400">Due: Sep 30, 2025 • Submissions: 12</p>
      </div>
      <div class="text-sm text-gray-300">Status: Open</div>
    </div>

    <div class="overflow-auto">
      <table class="min-w-full text-left table-auto">
        <thead>
          <tr class="text-sm text-gray-400">
            <th class="p-3">Student</th>
            <th class="p-3">Submitted On</th>
            <th class="p-3">File</th>
            <th class="p-3">Grade</th>
            <th class="p-3">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
          <tr class="text-gray-100">
            <td class="p-3">Ravi Patel</td>
            <td class="p-3">Oct 1, 2025</td>
            <td class="p-3">portfolio.zip</td>
            <td class="p-3">—</td>
            <td class="p-3 flex space-x-2">
              <button class="px-3 py-1 bg-indigo-500 text-white rounded">View</button>
              <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">Grade</button>
            </td>
          </tr>

          <tr class="text-gray-100">
            <td class="p-3">Sara Lopez</td>
            <td class="p-3">Oct 2, 2025</td>
            <td class="p-3">link</td>
            <td class="p-3">85</td>
            <td class="p-3 flex space-x-2">
              <button class="px-3 py-1 bg-indigo-500 text-white rounded">View</button>
              <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">Edit Grade</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


    </main>
@endsection
