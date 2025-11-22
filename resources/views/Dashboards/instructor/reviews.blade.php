@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-100">Reviews & Ratings</h1>
    <div class="text-sm text-gray-300">Overall Rating: <span class="font-semibold text-yellow-400 ml-2">4.5</span></div>
  </div>

  <div class="bg-gray-800 rounded-xl p-6 space-y-4">
    <div class="flex items-center justify-between">
      <div>
        <h3 class="text-lg text-gray-100 font-semibold">Student Reviews</h3>
        <p class="text-sm text-gray-400">Recent feedback from students</p>
      </div>
      <div>
        <button class="px-3 py-2 bg-gray-700 text-gray-100 rounded">Export</button>
      </div>
    </div>

    <div class="space-y-4">
      <div class="p-4 bg-gray-900 rounded">
        <div class="flex items-start justify-between">
          <div>
            <div class="font-semibold text-gray-100">Priya Sharma <span class="text-sm text-gray-400">• 5 stars</span></div>
            <div class="text-sm text-gray-300 mt-1">Excellent course — very practical and well structured.</div>
          </div>
          <div class="text-sm text-gray-400">Oct 03, 2025</div>
        </div>
      </div>

      <div class="p-4 bg-gray-900 rounded">
        <div class="flex items-start justify-between">
          <div>
            <div class="font-semibold text-gray-100">Liam Nguyen <span class="text-sm text-gray-400">• 4 stars</span></div>
            <div class="text-sm text-gray-300 mt-1">Great content, but could use more examples.</div>
          </div>
          <div class="text-sm text-gray-400">Sep 21, 2025</div>
        </div>
      </div>
    </div>
  </div>
</div>

    </main>
@endsection
