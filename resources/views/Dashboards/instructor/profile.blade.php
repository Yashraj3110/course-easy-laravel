@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-100">Profile Settings</h1>
    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save Profile</button>
  </div>

  <div class="bg-gray-800 rounded-xl p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2 space-y-4">
      <div>
        <label class="text-sm text-gray-300">Full Name</label>
        <input class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3" value="Alex Instructor" />
      </div>

      <div>
        <label class="text-sm text-gray-300">Headline</label>
        <input class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3" placeholder="e.g., Senior Web Developer & Instructor" />
      </div>

      <div>
        <label class="text-sm text-gray-300">Bio</label>
        <textarea class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3 h-32">Write a short bio that will show on your instructor profile.</textarea>
      </div>

      <div>
        <label class="text-sm text-gray-300">Social Links</label>
        <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-3">
          <input class="bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3" placeholder="Twitter URL" />
          <input class="bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3" placeholder="LinkedIn URL" />
        </div>
      </div>
    </div>

    <aside class="bg-gray-900 rounded-lg p-4 space-y-4">
      <div class="flex flex-col items-center">
        <div class="w-28 h-28 bg-gray-700 rounded-full mb-3 flex items-center justify-center text-white">AI</div>
        <button class="px-3 py-2 bg-gray-700 rounded text-gray-100">Change Photo</button>
      </div>

      <div>
        <h4 class="text-sm text-gray-300">Public Profile</h4>
        <p class="text-xs text-gray-400 mt-1">This is what students will see on your profile page.</p>
      </div>
    </aside>
  </div>
</div>

    </main>
@endsection
