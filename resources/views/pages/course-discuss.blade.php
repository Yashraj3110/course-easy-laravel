@extends('layouts.app')

@section('content')
    <header
        class="bg-secondary-light dark:bg-secondary-dark shadow-lg border-b border-gray-200 dark:border-gray-700 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap justify-between items-center gap-2">
            <h1 id="lecture-title"
                class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white tracking-wide text-center sm:text-left">
                Advanced React & Next.js Development
            </h1>

            <a href="{{ route('course.details') }}"
                class="text-accent-blue dark:text-accent-gold hover:text-indigo-600 dark:hover:text-yellow-400 font-semibold transition duration-200 flex items-center gap-1 text-sm sm:text-base">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Course
            </a>
        </div>
    </header>
    <div class="container mx-auto px-6">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-10 grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- Left Sidebar -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">

                    <!-- Search & Filter Card -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-gray-700">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            <i data-lucide="search" class="w-5 h-5 text-indigo-500"></i>
                            Search Discussions
                        </h2>

                        <input type="text" placeholder="Search by keyword..."
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg 
                           bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">

                        <h3
                            class="text-md font-semibold text-gray-700 dark:text-gray-300 mt-5 mb-3 flex items-center gap-2">
                            <i data-lucide="filter" class="w-4 h-4 text-indigo-500"></i>
                            Filters
                        </h3>
                        <div class="space-y-3">
                            <button
                                class="w-full py-2 bg-indigo-100 dark:bg-gray-700 text-indigo-700 dark:text-indigo-300 
                                   rounded-lg font-medium hover:bg-indigo-200 dark:hover:bg-gray-600 transition">
                                Most Recent
                            </button>
                            <button
                                class="w-full py-2 bg-indigo-100 dark:bg-gray-700 text-indigo-700 dark:text-indigo-300 
                                   rounded-lg font-medium hover:bg-indigo-200 dark:hover:bg-gray-600 transition">
                                Most Answered
                            </button>
                            <button
                                class="w-full py-2 bg-indigo-100 dark:bg-gray-700 text-indigo-700 dark:text-indigo-300 
                                   rounded-lg font-medium hover:bg-indigo-200 dark:hover:bg-gray-600 transition">
                                Unanswered
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Main Discussion Area -->
            <div class="lg:col-span-2 space-y-10">
                <!-- Ask a Question -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-100 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-5 flex items-center gap-2">
                        <i data-lucide="message-square" class="w-6 h-6 text-indigo-500"></i>
                        Start a Discussion
                    </h2>

                    <form class="space-y-4">
                        <input type="text" placeholder="Enter your question title"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg 
                           text-gray-800 dark:text-gray-100 bg-white dark:bg-gray-900 
                           focus:ring-indigo-500 focus:border-indigo-500">

                        <textarea rows="4" placeholder="Describe your question or problem..."
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg 
                           text-gray-800 dark:text-gray-100 bg-white dark:bg-gray-900 
                           focus:ring-indigo-500 focus:border-indigo-500"></textarea>

                        <button type="button"
                            class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg 
                           hover:bg-indigo-700 transition duration-300 shadow-md hover:shadow-lg flex items-center gap-2">
                            <i data-lucide="send" class="w-5 h-5"></i> Post Question
                        </button>
                    </form>
                </div>

                <!-- Example Discussion Threads -->
                <div class="space-y-6">

                    <!-- Discussion 1 -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-md hover:shadow-lg transition hover:-translate-y-1">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                How do I calculate molarity in Lecture 5 example?
                            </h3>
                            <span class="text-sm text-gray-500 dark:text-gray-400">2 days ago</span>
                        </div>

                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            I’m confused about how the solution was derived in the practice example from Lecture 5. Can
                            someone
                            explain?
                        </p>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                                <i data-lucide="user" class="w-4 h-4 text-indigo-500"></i> <span>Riya Sharma</span>
                                <span
                                    class="px-2 py-0.5 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded text-xs">Student</span>
                            </div>

                            <button
                                class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline flex items-center gap-1">
                                <i data-lucide="corner-down-right" class="w-4 h-4"></i> 3 Replies
                            </button>
                        </div>
                    </div>

                    <!-- Discussion 2 -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-md hover:shadow-lg transition hover:-translate-y-1">

                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                Is there a downloadable summary for Module 2?
                            </h3>
                            <span class="text-sm text-gray-500 dark:text-gray-400">4 days ago</span>
                        </div>

                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            I’d love a quick PDF summary of Module 2 topics. It helps in revision. Any idea if it’s
                            available?
                        </p>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                                <i data-lucide="user" class="w-4 h-4 text-indigo-500"></i> <span>Instructor</span>
                                <span
                                    class="px-2 py-0.5 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded text-xs">Instructor</span>
                            </div>

                            <!-- Reply toggle button -->
                            <button type="button"
                                class="toggle-replies text-sm text-indigo-600 dark:text-indigo-400 hover:underline flex items-center gap-1"
                                data-target="replies-1">
                                <i data-lucide="corner-down-right" class="w-4 h-4"></i> 1 Reply
                            </button>
                        </div>

                        <!-- Hidden replies section -->
                        <div id="replies-1"
                            class="hidden mt-5 pl-5 border-l-2 border-indigo-400 dark:border-indigo-600 space-y-4">

                            <!-- Example reply -->
                            <div class="bg-gray-50 dark:bg-gray-900/60 rounded-xl p-4">
                                <div class="flex justify-between">
                                    <p class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                                        Yes! You can download the module summary from the “Resources” tab in your course
                                        dashboard.
                                    </p>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Instructor • 2 days ago</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Empty State Example -->
                <div class="text-center py-20 text-gray-500 dark:text-gray-400">
                    <i data-lucide="message-circle" class="w-10 h-10 mx-auto mb-3 text-gray-400"></i>
                    <p class="text-lg">No more discussions yet. Be the first to ask something!</p>
                </div>
            </div>
        </div>

        <!-- Floating Back to Top Button -->
        <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" id="backToTop"
            class="fixed bottom-20 right-6 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-700
           transition hidden z-40">
            <i data-lucide="arrow-up"></i>
        </button>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            document.querySelectorAll('.toggle-replies').forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');
                    const replies = document.getElementById(targetId);

                    // Toggle visibility
                    replies.classList.toggle('hidden');

                    // Optional: change button text dynamically
                    const isVisible = !replies.classList.contains('hidden');
                    button.innerHTML = isVisible ?
                        `<i data-lucide="chevron-up" class="w-4 h-4"></i> Hide Replies` :
                        `<i data-lucide="corner-down-right" class="w-4 h-4"></i> 1 Reply`;

                    lucide.createIcons(); // refresh icons
                });
            });
        });
        document.addEventListener('scroll', () => {
            const btn = document.getElementById('backToTop');
            btn.classList.toggle('hidden', window.scrollY < 300);
        });
        lucide.createIcons();
    </script>
@endsection
