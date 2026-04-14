@extends('Dashboards.student.dashboard')

@section('Sdash')
<main class="flex-1 p-8 lg:p-12 overflow-y-auto">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-black text-white mb-10 flex items-center gap-3">
            <i data-lucide="settings" class="text-accent-blue"></i> Account Settings
        </h2>

        <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
            @csrf
            @method('PUT')

            <!-- Account Branding -->
            <div class="bg-secondary-dark rounded-[2.5rem] p-10 border border-gray-700/50 shadow-2xl">
                <h3 class="text-xl font-black text-white mb-8 border-b border-gray-800 pb-4">Personal Profile</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Photo Upload -->
                    <div class="md:col-span-2 flex items-center gap-8 mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6366f1&color=fff&size=100" 
                             class="w-20 h-20 rounded-3xl border-2 border-gray-700">
                        <div>
                            <label class="block text-xs font-black uppercase text-gray-500 tracking-widest mb-2">Profile Photo</label>
                            <input type="file" name="photo" class="text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-accent-blue file:text-white hover:file:bg-indigo-600 transition">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest px-1">Full Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" required
                            class="w-full bg-gray-900 border-0 rounded-2xl p-4 text-white focus:ring-2 focus:ring-accent-blue transition">
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest px-1">Phone Number</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" placeholder="+1 (555) 000-0000"
                            class="w-full bg-gray-900 border-0 rounded-2xl p-4 text-white focus:ring-2 focus:ring-accent-blue transition">
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest px-1">Gender</label>
                        <select name="gender" class="w-full bg-gray-900 border-0 rounded-2xl p-4 text-white focus:ring-2 focus:ring-accent-blue transition appearance-none">
                            <option value="">Select Gender</option>
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest px-1">Date of Birth</label>
                        <input type="date" name="dob" value="{{ $user->dob }}"
                            class="w-full bg-gray-900 border-0 rounded-2xl p-4 text-white focus:ring-2 focus:ring-accent-blue transition">
                    </div>

                    <div class="md:col-span-2 space-y-1">
                        <label class="text-[10px] font-black uppercase text-gray-500 tracking-widest px-1">Bio (About You)</label>
                        <textarea name="bio" rows="4" placeholder="Tell us about yourself..."
                            class="w-full bg-gray-900 border-0 rounded-2xl p-4 text-white focus:ring-2 focus:ring-accent-blue transition">{{ $user->bio }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Privacy & Security -->
            <div class="bg-secondary-dark rounded-[2.5rem] p-10 border border-gray-700/50 shadow-2xl">
                <h3 class="text-xl font-black text-white mb-8 border-b border-gray-800 pb-4">Security</h3>
                <div class="flex items-center justify-between p-6 bg-gray-900 rounded-3xl border border-gray-800">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-red-500/10 rounded-2xl">
                            <i data-lucide="shield-alert" class="text-red-500"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Advanced Protection</h4>
                            <p class="text-xs text-gray-500">Ensure your account is using the latest security protocols.</p>
                        </div>
                    </div>
                    <button type="button" class="text-xs font-black bg-gray-800 hover:bg-gray-700 px-5 py-2 rounded-xl transition">ENABLED</button>
                </div>
            </div>

            <div class="flex justify-end pt-6">
                <button type="submit" class="bg-accent-blue hover:bg-indigo-600 text-white font-black px-12 py-5 rounded-3xl shadow-2xl shadow-accent-blue/40 transform active:scale-95 transition-all">
                    SAVE CHANGES
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
