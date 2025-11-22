@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-100">Messages & Q&A</h1>
    <div class="text-sm text-gray-300">Inbox • 12 unread</div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left: Conversations -->
    <div class="lg:col-span-1 bg-gray-800 rounded-xl p-4">
      <div class="space-y-3">
        <div class="p-3 rounded hover:bg-gray-700 cursor-pointer">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <div class="w-9 h-9 bg-gray-700 rounded-full flex items-center justify-center text-white">AL</div>
              <div>
                <div class="text-sm font-semibold text-gray-100">Alex Lee</div>
                <div class="text-xs text-gray-400">Question about assignment</div>
              </div>
            </div>
            <div class="text-xs text-gray-400">2d</div>
          </div>
        </div>

        <div class="p-3 rounded hover:bg-gray-700 cursor-pointer">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <div class="w-9 h-9 bg-gray-700 rounded-full flex items-center justify-center text-white">SJ</div>
              <div>
                <div class="text-sm font-semibold text-gray-100">Sam Jones</div>
                <div class="text-xs text-gray-400">Feedback on lecture</div>
              </div>
            </div>
            <div class="text-xs text-gray-400">4d</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right: Conversation view -->
    <div class="lg:col-span-2 bg-gray-800 rounded-xl p-6 flex flex-col h-[60vh]">
      <div class="flex-1 overflow-auto space-y-4 pb-4">
        <div class="flex">
          <div class="bg-gray-700 text-gray-100 p-3 rounded-lg max-w-xs">Hi — quick question about assignment requirements.</div>
        </div>

        <div class="flex justify-end">
          <div class="bg-indigo-600 text-white p-3 rounded-lg max-w-xs">Sure — what do you need clarified?</div>
        </div>

        <div class="flex">
          <div class="bg-gray-700 text-gray-100 p-3 rounded-lg max-w-xs">Should we include external libraries?</div>
        </div>
      </div>

      <div class="pt-4 border-t border-gray-700">
        <div class="flex items-center space-x-3">
          <input type="text" placeholder="Write a reply..." class="flex-1 bg-gray-900 text-gray-100 p-3 rounded-md border border-gray-700" />
          <button class="px-4 py-2 bg-indigo-500 text-white rounded">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

    </main>
@endsection
