@extends('Dashboards.student.dashboard')

@section('Sdash')
  

<main class="flex-1 p-10 overflow-y-auto">

    <header class="flex justify-between items-center mb-12">
        <h2 class="text-4xl font-light text-white">Hello, <span class="font-bold">{{ Auth::user()->name }}</span>. Ready to learn?</h2>
        <div class="flex items-center space-x-6">
            <div class="relative">
                <input type="text" placeholder="Search lessons, projects..."
                    class="py-2 pl-10 pr-4 bg-secondary-dark border border-gray-700/50 rounded-full focus:ring-1 focus:ring-accent-gold focus:border-accent-gold text-sm text-gray-300 w-72 transition duration-300 shadow-inner-dark">
                <svg class="icon absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                </svg>
            </div>
            <button
                class="relative p-2 rounded-full text-gray-300 hover:text-white hover:bg-gray-700/50 transition duration-300">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 005.454-1.332 2.38 2.38 0 011.371 2.766c-.318 1.054-1.164 1.83-2.222 2.079-1.284.275-2.585.503-3.897.676-1.56.208-3.13.317-4.717.317h-.732c-1.587 0-3.157-.109-4.717-.317-1.312-.173-2.613-.401-3.897-.676-1.058-.249-1.904-1.025-2.222-2.079a2.38 2.38 0 011.371-2.766c1.037-.52 2.113-.974 3.207-1.332M9 13.5a3 3 0 110-6 3 3 0 010 6zm6.375 0a3 3 0 110-6 3 3 0 010 6z">
                    </path>
                </svg>
                <span
                    class="absolute top-1 right-1 block h-2.5 w-2.5 rounded-full ring-2 ring-primary-dark bg-red-500"></span>
            </button>
        </div>
    </header>

    <section class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-12">

        <div
            class="lg:col-span-3 p-8 bg-secondary-dark rounded-2xl shadow-xl border border-gray-700/50 flex items-center justify-between">
            <div class="flex-grow">
                <p class="text-lg font-medium text-gray-400 mb-2">My Learning Streak</p>
                <div class="flex items-baseline space-x-2 mb-4">
                    <span class="text-6xl font-extrabold text-accent-gold">27</span>
                    <span class="text-2xl text-gray-400">Days</span>
                </div>
                <div class="w-full bg-gray-700 rounded-full h-2">
                    <div class="h-2 rounded-full bg-accent-gold" style="width: 90%"></div>
                </div>
                <p class="text-sm text-gray-400 mt-2">Almost reached your monthly goal! Keep it up.</p>
            </div>
            <button
                class="ml-8 py-3 px-8 bg-accent-gold text-primary-dark font-bold rounded-full hover:bg-yellow-500 shadow-lg transition duration-300 transform hover:scale-[1.02]">
                Continue Course
            </button>
        </div>

        <div class="p-6 bg-secondary-dark rounded-2xl shadow-xl border border-gray-700/50">
            <h3 class="text-xl font-semibold text-white mb-4">📅 Upcoming Tasks</h3>
            <ul class="space-y-4">
                <li class="flex items-start space-x-3 text-sm">
                    <div class="w-2 h-2 mt-1.5 rounded-full bg-red-500 flex-shrink-0"></div>
                    <div>
                        <p class="font-medium text-white">Data Viz: **Module 4 Quiz**</p>
                        <p class="text-xs text-gray-400">Due **Today** at 4:00 PM</p>
                    </div>
                </li>
                <li class="flex items-start space-x-3 text-sm">
                    <div class="w-2 h-2 mt-1.5 rounded-full bg-accent-blue flex-shrink-0"></div>
                    <div>
                        <p class="font-medium text-white">UI/UX: **Wireframe Submission**</p>
                        <p class="text-xs text-gray-400">Due Wednesday, Nov 12</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="mb-12">
        <h3 class="text-2xl font-bold text-white mb-6">📚 My Learning Path</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            <div
                class="bg-secondary-dark rounded-xl overflow-hidden shadow-xl border border-gray-700/50 transition duration-300 ring-2 ring-accent-gold/50">
                <div class="h-32 bg-gray-700/50 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 font-light">CODE</span>
                </div>
                <div class="p-5">
                    <h4 class="text-lg font-bold text-white mb-1">Advanced Python Programming</h4>
                    <p class="text-sm text-gray-400 mb-4">Instructor: Dr. Maya Patel</p>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 mb-2">
                        <div class="h-1.5 rounded-full bg-accent-gold transition-all duration-500" style="width: 75%">
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-xs text-gray-400">
                        <span>**75%** Complete</span>
                        <button class="text-accent-gold font-medium hover:underline">Open Lesson &rarr;</button>
                    </div>
                </div>
            </div>

            <div
                class="bg-secondary-dark rounded-xl overflow-hidden shadow-xl border border-gray-700/50 hover:ring-2 hover:ring-accent-blue/50 transition duration-300">
                <div class="h-32 bg-gray-700/50 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 font-light">DESIGN</span>
                </div>
                <div class="p-5">
                    <h4 class="text-lg font-bold text-white mb-1">Foundational UI/UX Principles</h4>
                    <p class="text-sm text-gray-400 mb-4">Instructor: Alex Lee</p>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 mb-2">
                        <div class="h-1.5 rounded-full bg-accent-blue transition-all duration-500" style="width: 30%">
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-xs text-gray-400">
                        <span>**30%** Complete</span>
                        <button class="text-accent-blue font-medium hover:underline">Open Course &rarr;</button>
                    </div>
                </div>
            </div>

            <div class="bg-secondary-dark rounded-xl overflow-hidden shadow-xl border border-gray-700/50 opacity-70">
                <div class="h-32 bg-gray-700/50 flex items-center justify-center">
                    <span class="text-4xl text-gray-500 font-light">MARKET</span>
                </div>
                <div class="p-5">
                    <h4 class="text-lg font-bold text-white mb-1">Introduction to SEO Strategy</h4>
                    <p class="text-sm text-gray-400 mb-4">Instructor: Sarah Chen</p>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 mb-2">
                        <div class="h-1.5 rounded-full bg-green-500" style="width: 100%"></div>
                    </div>
                    <div class="flex justify-between items-center text-xs text-gray-400">
                        <span>**Completed**</span>
                        <button class="text-green-500 font-medium hover:underline">View Certificate &rarr;</button>
                    </div>
                </div>
            </div>

            <div
                class="p-5 bg-gray-800/50 border border-dashed border-gray-700 rounded-xl flex flex-col items-center justify-center text-center text-gray-500 hover:bg-gray-700/30 transition duration-300 cursor-pointer">
                <svg class="icon w-8 h-8 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">Explore New Courses</span>
            </div>
        </div>
    </section>

    <section>
        <h3 class="text-2xl font-bold text-white mb-6">🎯 Skills to Master Next</h3>
        <div class="flex space-x-6 overflow-x-auto pb-4">

            <div
                class="flex-shrink-0 w-72 p-5 bg-secondary-dark rounded-xl shadow-lg border border-gray-700/50 hover:shadow-2xl hover:border-accent-gold/50 transition duration-300 cursor-pointer">
                <p class="text-sm text-accent-gold mb-1 font-semibold">Related to Python</p>
                <h4 class="text-xl font-bold text-white mb-2">Machine Learning Basics</h4>
                <p class="text-sm text-gray-400 mb-3">Learn to build predictive models using Scikit-learn.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500">4.9 ⭐ (8.2k reviews)</span>
                    <button class="text-accent-blue font-semibold text-sm hover:text-white">Enroll &rarr;</button>
                </div>
            </div>

            <div
                class="flex-shrink-0 w-72 p-5 bg-secondary-dark rounded-xl shadow-lg border border-gray-700/50 hover:shadow-2xl hover:border-accent-blue/50 transition duration-300 cursor-pointer">
                <p class="text-sm text-accent-blue mb-1 font-semibold">New in Catalog</p>
                <h4 class="text-xl font-bold text-white mb-2">Mastering React & Redux</h4>
                <p class="text-sm text-gray-400 mb-3">Build modern, scalable front-end applications.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500">4.7 ⭐ (5.1k reviews)</span>
                    <button class="text-accent-blue font-semibold text-sm hover:text-white">Enroll &rarr;</button>
                </div>
            </div>

            <div
                class="flex-shrink-0 w-72 p-5 bg-secondary-dark rounded-xl shadow-lg border border-gray-700/50 hover:shadow-2xl hover:border-accent-gold/50 transition duration-300 cursor-pointer">
                <p class="text-sm text-accent-gold mb-1 font-semibold">For Career Growth</p>
                <h4 class="text-xl font-bold text-white mb-2">Professional Project Management</h4>
                <p class="text-sm text-gray-400 mb-3">Master Agile and Scrum methodologies.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-gray-500">4.6 ⭐ (12k reviews)</span>
                    <button class="text-accent-blue font-semibold text-sm hover:text-white">Enroll &rarr;</button>
                </div>
            </div>

        </div>
    </section>

</main>
@endsection

