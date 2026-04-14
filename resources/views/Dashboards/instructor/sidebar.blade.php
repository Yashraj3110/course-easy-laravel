<nav class="space-y-2">
    <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4">Instructor Portal</p>

    @php
        $navItems = [
            ['route' => 'dashboard.instructor.home', 'icon' => 'layout-dashboard', 'label' => 'Dashboard'],
            ['route' => 'dashboard.instructor.courses', 'icon' => 'book-open', 'label' => 'My Courses'],
            ['route' => 'courses.create', 'icon' => 'plus-circle', 'label' => 'Create Course'],
            ['route' => 'instructor.quizzes.index', 'icon' => 'puzzle', 'label' => 'Assignments'],
            ['route' => 'dashboard.instructor.enrollments', 'icon' => 'users', 'label' => 'Enrollments'],
        ];
    @endphp

    @foreach($navItems as $item)
        <a href="{{ route($item['route']) }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs($item['route']) ? 'bg-instructor-purple text-white shadow-lg shadow-instructor-purple/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
            <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5"></i>
            {{ $item['label'] }}
        </a>
    @endforeach

    <div class="h-px bg-gray-800 my-6 mx-3"></div>

    <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4">Reporting</p>
    <a href="{{ route('dashboard.instructor.analytics') }}" 
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs('dashboard.instructor.analytics') ? 'bg-instructor-purple text-white shadow-lg shadow-instructor-purple/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
        <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
        Analytics
    </a>

    <p class="px-3 text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 mb-4 mt-8">Organization</p>
    <a href="{{ route('dashboard.instructor.profile') }}" 
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold transition {{ request()->routeIs('dashboard.instructor.profile') ? 'bg-instructor-purple text-white shadow-lg shadow-instructor-purple/20' : 'text-gray-400 hover:bg-secondary-dark hover:text-white' }}">
        <i data-lucide="user-cog" class="w-5 h-5"></i>
        Profile Settings
    </a>
</nav>

<script>
    if(typeof lucide !== 'undefined') lucide.createIcons();
</script>
