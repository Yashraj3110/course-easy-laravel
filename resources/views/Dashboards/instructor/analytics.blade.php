@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-100">Analytics & Insights</h1>
    <div class="text-sm text-gray-300">Date range:
      <select class="ml-2 bg-gray-900 text-gray-100 p-2 rounded border border-gray-700">
        <option>Last 7 days</option>
        <option>Last 30 days</option>
        <option>Last 90 days</option>
      </select>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-gray-800 rounded-xl p-6">
      <h4 class="text-sm text-gray-300">Total Revenue</h4>
      <div class="mt-3 text-2xl font-bold text-green-400">$2,480</div>
      <div class="text-xs text-gray-400 mt-1">+12% from last period</div>
    </div>

    <div class="bg-gray-800 rounded-xl p-6">
      <h4 class="text-sm text-gray-300">New Students</h4>
      <div class="mt-3 text-2xl font-bold text-indigo-400">324</div>
      <div class="text-xs text-gray-400 mt-1">+8% from last period</div>
    </div>

    <div class="bg-gray-800 rounded-xl p-6">
      <h4 class="text-sm text-gray-300">Avg. Completion</h4>
      <div class="mt-3 text-2xl font-bold text-yellow-400">42%</div>
      <div class="text-xs text-gray-400 mt-1">Based on enrolled students</div>
    </div>
  </div>

  <!-- Simple static chart placeholders -->
  <div class="bg-gray-800 rounded-xl p-6">
    <h3 class="text-lg text-gray-100 font-semibold">Student Growth</h3>
    <div class="mt-4 h-48 bg-gray-900 rounded flex items-center justify-center text-gray-500">
      Chart placeholder — add chart library for dynamic visuals
    </div>
  </div>
</div>

    </main>
@endsection
