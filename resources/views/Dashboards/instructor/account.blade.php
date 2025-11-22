@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-100">Account Settings</h1>
    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save Changes</button>
  </div>

  <div class="bg-gray-800 rounded-xl p-6 space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="text-sm text-gray-300">Email</label>
        <input class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3" value="youremail@example.com" />
      </div>

      <div>
        <label class="text-sm text-gray-300">Password</label>
        <input type="password" class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3" placeholder="••••••••" />
        <p class="text-xs text-gray-400 mt-2">Leave blank to keep current password.</p>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <h4 class="text-sm text-gray-300">Two-factor Authentication</h4>
        <p class="text-xs text-gray-400 mt-1">Enhance the security of your account.</p>
        <div class="mt-3">
          <button class="px-3 py-2 bg-gray-700 text-gray-100 rounded">Enable 2FA</button>
        </div>
      </div>

      <div>
        <h4 class="text-sm text-gray-300">Notifications</h4>
        <div class="mt-3 space-y-2 text-sm text-gray-300">
          <label class="flex items-center space-x-3">
            <input type="checkbox" checked class="rounded bg-gray-900" />
            <span>Email notifications for new students</span>
          </label>
          <label class="flex items-center space-x-3">
            <input type="checkbox" checked class="rounded bg-gray-900" />
            <span>Messages & Q&A alerts</span>
          </label>
        </div>
      </div>
    </div>

    <div class="pt-4 border-t border-gray-700">
      <h4 class="text-sm text-gray-300">Danger Zone</h4>
      <div class="mt-3 flex items-center justify-between">
        <div class="text-sm text-gray-400">Delete your account permanently</div>
        <button class="px-3 py-2 bg-red-600 text-white rounded">Delete Account</button>
      </div>
    </div>
  </div>
</div>

    </main>
@endsection
