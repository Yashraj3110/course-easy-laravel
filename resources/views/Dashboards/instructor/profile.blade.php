@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

        <form action="{{ route('instructor.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-100">Profile Settings</h1>
                    @if (session('success'))
                        <div class="p-3 bg-green-600 text-white rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif


                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save Profile</button>
                </div>

                <div class="bg-gray-800 rounded-xl p-6 grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="md:col-span-2 space-y-4">

                        <div>
                            <label class="text-sm text-gray-300">Full Name</label>
                            <input name="name"
                                class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3"
                                value="{{ old('name', $user->name) }}" />
                        </div>

                        <div>
                            <label class="text-sm text-gray-300">Phone</label>
                            <input name="phone"
                                class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3"
                                value="{{ old('phone', $user->phone) }}" />
                        </div>

                        <div>
                            <label class="text-sm text-gray-300">Gender</label>
                            <select name="gender"
                                class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3">
                                <option value="" disabled>Select gender</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-sm text-gray-300">Date of Birth</label>
                            <input type="date" name="dob"
                                class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3"
                                value="{{ old('dob', $user->dob) }}" />
                        </div>

                        <div>
                            <label class="text-sm text-gray-300">Bio</label>
                            <textarea name="bio" class="mt-2 w-full bg-gray-900 text-gray-100 rounded-md border border-gray-700 p-3 h-32">{{ old('bio', $user->bio) }}</textarea>
                        </div>

                    </div>

                    <aside class="bg-gray-900 rounded-lg p-4 space-y-4">
                        <div class="flex flex-col items-center">

                            @if ($user->photo)
                                <img src="{{ asset($user->photo) }}" class="w-28 h-28 rounded-full object-cover mb-3">
                            @else
                                <div
                                    class="w-28 h-28 bg-gray-700 rounded-full mb-3 flex items-center justify-center text-white">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                            @endif

                            <input type="file" name="photo" class="text-gray-300">
                        </div>

                        <div>
                            <h4 class="text-sm text-gray-300">Public Profile</h4>
                            <p class="text-xs text-gray-400 mt-1">This is what students will see on your profile page.</p>
                        </div>
                    </aside>

                </div>
            </div>

        </form>


    </main>
@endsection
