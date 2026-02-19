<nav class="space-y-2" x-data="{
    courseOpen: @json(request()->routeIs('dashboard.instructor.courses') ||
            request()->routeIs('dashboard.instructor.newcourses') ||
            request()->routeIs('dashboard.instructor.curriculam')),

}">

    <!-- Dashboard -->
    <a href="{{ route('dashboard.instructor.home') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
       {{ request()->routeIs('dashboard.instructor.home')
           ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
           : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M3 12l9-9 9 9" />
            <path d="M4 10v10h6V14h4v6h6V10" />
        </svg>

        <span>Dashboard</span>
    </a>

    <!-- COURSES DROPDOWN -->
    <!-- COURSES DROPDOWN -->
    <button @click="courseOpen = !courseOpen"
        class="flex justify-between w-full p-3 rounded-xl text-gray-300 hover:bg-gray-700/40">

        <span class="flex items-center space-x-3">

            <!-- Book Icon -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                <path d="M4 4.5A2.5 2.5 0 0 1 6.5 7H20" />
                <path d="M6.5 7v10" />
                <path d="M20 4v16" />
            </svg>

            <span>Courses</span>
        </span>

        <!-- Dropdown Arrow -->
        <svg :class="courseOpen ? 'rotate-180' : ''" class="w-5 h-5 transition-transform" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M6 9l6 6 6-6" />
        </svg>
    </button>

    <!-- DROPDOWN LINKS -->
    <div x-show="courseOpen" x-collapse class="pl-10 space-y-1 text-gray-400">

        <!-- My Courses -->
        <a href="{{ route('dashboard.instructor.courses') }}"
            class="flex items-center space-x-2 py-1 transition 
        {{ request()->routeIs('dashboard.instructor.courses') ? 'text-accent-gold font-semibold' : 'hover:text-white' }}">

            <!-- Small dot icon -->
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8">
                <circle cx="4" cy="4" r="3" />
            </svg>

            <span>My Courses</span>
        </a>

        

        <!-- Curriculum -->
        <a href="{{ route('dashboard.instructor.curriculum') }}"
            class="flex items-center space-x-2 py-1 transition 
        {{ request()->routeIs('dashboard.instructor.curriculum') ? 'text-accent-gold font-semibold' : 'hover:text-white' }}">

            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 8 8">
                <circle cx="4" cy="4" r="3" />
            </svg>

            <span>Quiz</span>
        </a>
    </div>


    <!-- Enrollments -->
    <a href="{{ route('dashboard.instructor.enrollments') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
        {{ request()->routeIs('dashboard.instructor.enrollments')
            ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
            : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M4 6h16M4 12h16M4 18h10" />
        </svg>

        <span>Enrollments</span>
    </a>

    <!-- Assignments -->
    <a href="{{ route('instructor.quizzes.index') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
        {{ request()->routeIs('instructor.quizzes.index')
            ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
            : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M4 4h16v16H4z" />
            <path d="M8 8h8M8 12h4" />
        </svg>

        <span>Assignments</span>
    </a>

    <!-- Messages -->
    <a href="{{ route('dashboard.instructor.messages') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
        {{ request()->routeIs('dashboard.instructor.messages')
            ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
            : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M3 5h18v12H5l-2 2z" />
        </svg>

        <span>Messages</span>
    </a>

    <!-- Reviews -->
    <a href="{{ route('dashboard.instructor.reviews') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
        {{ request()->routeIs('dashboard.instructor.reviews')
            ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
            : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M12 3l2.5 5 5.5.8-4 4 1 5.5L12 16l-5 2.8 1-5.6-4-4 5.5-.8L12 3z" />
        </svg>

        <span>Reviews</span>
    </a>

    <div class="h-px bg-gray-700/50 my-4"></div>

    <!-- ANALYTICS DROPDOWN -->


    <a href="{{ route('dashboard.instructor.analytics') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
        {{ request()->routeIs('dashboard.instructor.analytics')
            ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
            : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M4 14h3V6H4v8zm6 0h3V3h-3v11zm6 0h3V9h-3v5z" />
        </svg>

        <span>Analytics</span>
    </a>

    <!-- Profile Settings -->
    <a href="{{ route('dashboard.instructor.profile') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
        {{ request()->routeIs('dashboard.instructor.profile')
            ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
            : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <circle cx="12" cy="8" r="4" />
            <path d="M4 20v-1a7 7 0 0114 0v1" />
        </svg>

        <span>Profile Settings</span>
    </a>

    <!-- Account Settings -->
    <a href="{{ route('dashboard.instructor.account') }}"
        class="flex items-center space-x-3 p-3 rounded-xl transition
        {{ request()->routeIs('dashboard.instructor.account')
            ? 'bg-accent-blue/20 text-accent-gold ring-2 ring-accent-blue/60 font-semibold'
            : 'text-gray-300 hover:bg-gray-700/40 hover:text-white' }}">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <rect x="3" y="4" width="18" height="14" rx="2" />
            <path d="M7 8h10" />
        </svg>

        <span>Account Settings</span>
    </a>

</nav>
