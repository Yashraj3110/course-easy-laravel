@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-100">Curriculum & Lessons</h1>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Add Section</button>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 space-y-6">
                <!-- Section 1 -->
                <div class="border border-gray-700 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-indigo-600 rounded-md flex items-center justify-center text-white font-semibold">
                                1</div>
                            <div>
                                <h3 class="text-lg text-gray-100 font-semibold">Introduction to Course</h3>
                                <p class="text-sm text-gray-400">3 lessons &middot; 20 minutes</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">Edit</button>
                            <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">Add Lesson</button>
                        </div>
                    </div>

                    <div class="mt-4 space-y-3">
                        <!-- Lesson item -->
                        <div class="flex items-center justify-between bg-gray-900 p-3 rounded">
                            <div class="flex items-center space-x-3">
                                <span class="text-sm text-gray-300">1.1</span>
                                <div>
                                    <div class="text-sm text-gray-100 font-semibold">Welcome & Course Overview</div>
                                    <div class="text-xs text-gray-400">Video • 6:20</div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="text-sm text-gray-300">Edit</button>
                                <button class="text-sm text-gray-300">Delete</button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between bg-gray-900 p-3 rounded">
                            <div class="flex items-center space-x-3">
                                <span class="text-sm text-gray-300">1.2</span>
                                <div>
                                    <div class="text-sm text-gray-100 font-semibold">How to Navigate the Course</div>
                                    <div class="text-xs text-gray-400">Article • 3 min</div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="text-sm text-gray-300">Edit</button>
                                <button class="text-sm text-gray-300">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="border border-gray-700 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-indigo-600 rounded-md flex items-center justify-center text-white font-semibold">
                                2</div>
                            <div>
                                <h3 class="text-lg text-gray-100 font-semibold">Core Concepts</h3>
                                <p class="text-sm text-gray-400">5 lessons &middot; 2 hours</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">Edit</button>
                            <button class="px-3 py-1 bg-gray-700 text-gray-100 rounded">Add Lesson</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
