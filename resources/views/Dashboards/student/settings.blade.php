@extends('Dashboards.student.dashboard')

@section('Sdash')
    <div class="p-6 text-gray-200">
        <h2 class="text-2xl font-semibold mb-6">⚙️ Account Settings</h2>

        <!-- USER INFO CARD -->
        <div class="bg-gray-800 p-6 rounded-xl flex items-center justify-between mb-6">

            <div class="flex items-center space-x-4">
                <img src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : asset('default_profile.png') }}"
                    class="w-20 h-20 rounded-full object-cover">

                <div>
                    <h3 class="text-xl font-semibold text-white">{{ auth()->user()->name }}</h3>
                    <p class="text-gray-400">{{ auth()->user()->email }}</p>
                    <p class="text-gray-400">{{ auth()->user()->phone ?? 'No phone added' }}</p>
                </div>
            </div>

            <button id="editProfileBtn" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white transition">
                Edit Profile
            </button>
        </div>

        <!-- EDIT FORM (hidden by default) -->
        <div id="editProfileForm" class="hidden">
            <div class="bg-gray-800 p-6 rounded-xl space-y-6">

                <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Photo -->
                    <div>
                        <label class="text-sm text-gray-400">Profile Photo</label>
                        <input type="file" name="photo"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Full Name</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Phone Number</label>
                        <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Gender</label>
                        <select name="gender"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                            <option value="">Select</option>
                            <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="other" {{ auth()->user()->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Date of Birth</label>
                        <input type="date" name="dob" value="{{ auth()->user()->dob }}"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Bio</label>
                        <textarea name="bio" class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">{{ auth()->user()->bio }}</textarea>
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">New Password</label>
                        <input type="password" name="password"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                    </div>

                    <div>
                        <label class="text-sm text-gray-400">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                            class="mt-2 bg-gray-900 border border-gray-700 rounded-lg p-2 w-full text-gray-200">
                    </div>

                    <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-white mt-4">
                        Save Changes
                    </button>
                </form>

            </div>
        </div>

        <!-- DANGER ZONE -->
        <div class="mt-8 bg-gray-800 p-6 rounded-xl">
            <h3 class="text-lg font-semibold text-red-400 mb-2">Danger Zone</h3>
            <p class="text-gray-400 mb-3">Delete your account and all related data permanently.</p>
            <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-white transition">
                Delete Account
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const editBtn = document.getElementById('editProfileBtn');
        const form = document.getElementById('editProfileForm');
        const cancelBtn = document.getElementById('cancelEdit');

        editBtn.onclick = () => form.classList.remove('hidden');
        cancelBtn.onclick = () => form.classList.add('hidden');
    </script>
@endpush
