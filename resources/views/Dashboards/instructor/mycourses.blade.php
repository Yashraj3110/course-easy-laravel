@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">
        <div class="space-y-6">

            {{-- Page Header --}}
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-accent-gold">My Courses</h1>

                <button
                    class="px-5 py-3 bg-accent-gold text-primary-dark font-bold rounded-xl hover:bg-yellow-500 shadow-xl-gold transition duration-300 transform hover:scale-[1.02] flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>New Course</span>
                </button>
            </div>

            {{-- Courses Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Course Card 1 --}}
                <div
                    class="bg-secondary-dark/40 rounded-2xl overflow-hidden border border-gray-700/50 shadow-xl hover:shadow-2xl hover:scale-[1.01] transition-transform duration-200">

                    <div class="h-40 bg-gray-800">
                        <img src="https://source.unsplash.com/random/800x600?coding"
                            class="w-full h-full object-cover opacity-90 hover:opacity-100 transition" />
                    </div>

                    <div class="p-5 space-y-3">
                        <h3 class="text-xl font-semibold text-accent-gold">
                            Web Development Bootcamp
                        </h3>

                        <p class="text-gray-400 text-sm">
                            Learn HTML, CSS, JS and build real-world projects.
                        </p>

                        <div class="flex items-center justify-between text-sm text-gray-400">
                            <span>215 Students</span>
                            <span>12 Hours</span>
                        </div>

                        <div class="pt-4 flex justify-between">
                            <button
                                class="px-3 py-2 text-sm bg-accent-blue/20 border border-accent-blue/50 rounded-lg text-accent-blue hover:bg-accent-blue/30 transition">Edit</button>
                            <button
                                class="px-3 py-2 text-sm bg-gray-700/40 border border-gray-600 rounded-lg hover:bg-gray-700/60 transition">View</button>
                        </div>
                    </div>

                </div>

                {{-- Course Card 2 --}}
                <div
                    class="bg-secondary-dark/40 rounded-2xl overflow-hidden border border-gray-700/50 shadow-xl hover:shadow-2xl hover:scale-[1.01] transition-transform duration-200">

                    <div class="h-40 bg-gray-800">
                        <img src="https://source.unsplash.com/random/800x600?design"
                            class="w-full h-full object-cover opacity-90 hover:opacity-100 transition" />
                    </div>

                    <div class="p-5 space-y-3">
                        <h3 class="text-xl font-semibold text-accent-gold">
                            UI/UX Fundamentals
                        </h3>

                        <p class="text-gray-400 text-sm">
                            Master user experience design from scratch.
                        </p>

                        <div class="flex items-center justify-between text-sm text-gray-400">
                            <span>180 Students</span>
                            <span>9 Hours</span>
                        </div>

                        <div class="pt-4 flex justify-between">
                            <button
                                class="px-3 py-2 text-sm bg-accent-blue/20 border border-accent-blue/50 rounded-lg text-accent-blue hover:bg-accent-blue/30 transition">Edit</button>
                            <button
                                class="px-3 py-2 text-sm bg-gray-700/40 border border-gray-600 rounded-lg hover:bg-gray-700/60 transition">View</button>
                        </div>
                    </div>

                </div>

                {{-- Course Card 3 --}}
                <div
                    class="bg-secondary-dark/40 rounded-2xl overflow-hidden border border-gray-700/50 shadow-xl hover:shadow-2xl hover:scale-[1.01] transition-transform duration-200">

                    <div class="h-40 bg-gray-800">
                        <img src="https://source.unsplash.com/random/800x600?business"
                            class="w-full h-full object-cover opacity-90 hover:opacity-100 transition" />
                    </div>

                    <div class="p-5 space-y-3">
                        <h3 class="text-xl font-semibold text-accent-gold">
                            Digital Marketing Basics
                        </h3>

                        <p class="text-gray-400 text-sm">
                            Understand SEO, social media, and brand strategy.
                        </p>

                        <div class="flex items-center justify-between text-sm text-gray-400">
                            <span>324 Students</span>
                            <span>11 Hours</span>
                        </div>

                        <div class="pt-4 flex justify-between">
                            <button
                                class="px-3 py-2 text-sm bg-accent-blue/20 border border-accent-blue/50 rounded-lg text-accent-blue hover:bg-accent-blue/30 transition">Edit</button>
                            <button
                                class="px-3 py-2 text-sm bg-gray-700/40 border border-gray-600 rounded-lg hover:bg-gray-700/60 transition">View</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </main>
@endsection
