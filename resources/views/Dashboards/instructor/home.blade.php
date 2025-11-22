@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">

        <header class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-light text-white">Instructor Portal, <span class="font-bold">Dr. Patel</span></h2>
            <div class="flex items-center space-x-6">
                <input type="text" placeholder="Search my courses..."
                    class="py-2 pl-4 pr-4 bg-secondary-dark border border-gray-700/50 rounded-full focus:ring-1 focus:ring-accent-gold focus:border-accent-gold text-sm text-gray-300 w-64 transition duration-300">
                <button
                    class="relative p-2 rounded-full text-gray-300 hover:text-white hover:bg-gray-700/50 transition duration-300">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.332 2.38 2.38 0 011.371 2.766c-.318 1.054-1.164 1.83-2.222 2.079-1.284.275-2.585.503-3.897.676-1.56.208-3.13.317-4.717.317h-.732c-1.587 0-3.157-.109-4.717-.317-1.312-.173-2.613-.401-3.897-.676-1.058-.249-1.904-1.025-2.222-2.079a2.38 2.38 0 011.371-2.766c1.037-.52 2.113-.974 3.207-1.332M9 13.5a3 3 0 110-6 3 3 0 010 6zm6.375 0a3 3 0 110-6 3 3 0 010 6z">
                        </path>
                    </svg>
                </button>
            </div>
        </header>

        <section class="mb-12">
            <h3 class="text-2xl font-bold text-white mb-6">📊 Performance Overview (Last 30 Days)</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Net Revenue</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-extrabold text-accent-green">$8,450</span>
                        <span class="text-sm font-semibold text-accent-green flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            +12.5%
                        </span>
                    </div>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">New Enrollments</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-extrabold text-accent-blue">215</span>
                        <span class="text-sm font-semibold text-accent-blue flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            +5.1%
                        </span>
                    </div>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Avg. Rating</p>
                    <span class="text-3xl font-extrabold text-accent-gold flex items-center space-x-2">
                        <span>4.8</span>
                        <span class="text-2xl">⭐</span>
                    </span>
                    <p class="text-sm text-gray-500 mt-1">2,300 Total Reviews</p>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Action Needed</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-extrabold text-accent-red">12</span>
                        <button class="text-sm font-semibold text-accent-red hover:underline">View Messages</button>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Unanswered Student Q&A</p>
                </div>
            </div>
        </section>

        <section>
            <h3 class="text-2xl font-bold text-white mb-6">📝 My Active Courses (3)</h3>

            <div class="bg-secondary-dark rounded-xl shadow-xl overflow-hidden border border-gray-700/50">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700/50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                Course Title
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                Enrollments
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                Last Updated
                            </th>
                            <th scope="col" class="px-6 py-4 text-sm font-medium text-gray-400 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700/50">
                        <tr class="hover:bg-gray-700/30 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-white font-medium">Advanced Python Programming</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent-green/20 text-accent-green">
                                    Published
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">1,540</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-400">2 days ago</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                <a href="#" class="text-accent-blue hover:text-white">Edit</a>
                                <a href="#" class="text-accent-gold hover:text-white">Analytics</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-700/30 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-white font-medium">Foundational UI/UX Principles
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent-gold/20 text-accent-gold">
                                    Draft
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">N/A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-400">Just now</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                <a href="#" class="text-accent-blue hover:text-white">Build</a>
                                <a href="#" class="text-accent-gold hover:text-white">Preview</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-700/30 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-white font-medium">Advanced Data Science Project
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-600 text-gray-200">
                                    Pending Review
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">550</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-400">1 week ago</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                <a href="#" class="text-accent-blue hover:text-white">Details</a>
                                <a href="#" class="text-accent-red hover:text-white">Withdraw</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="mt-12">
            <h3 class="text-2xl font-bold text-white mb-6">🛠️ Instructor Tools</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50 hover:border-accent-blue transition duration-300 cursor-pointer">
                    <h4 class="text-xl font-bold text-white mb-2">Q&A Management</h4>
                    <p class="text-sm text-gray-400 mb-3">Filter and respond to student questions across all courses
                        efficiently.</p>
                    <a href="#" class="text-accent-blue hover:text-white font-semibold text-sm">Go to Inbox
                        &rarr;</a>
                </div>

                <div
                    class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50 hover:border-accent-gold transition duration-300 cursor-pointer">
                    <h4 class="text-xl font-bold text-white mb-2">Publishing Checklist</h4>
                    <p class="text-sm text-gray-400 mb-3">Ensure your new course meets all quality standards before
                        submission.</p>
                    <a href="#" class="text-accent-gold hover:text-white font-semibold text-sm">View Guide
                        &rarr;</a>
                </div>

                <div
                    class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50 hover:border-accent-green transition duration-300 cursor-pointer">
                    <h4 class="text-xl font-bold text-white mb-2">Marketing & Promotions</h4>
                    <p class="text-sm text-gray-400 mb-3">Create coupons and run promotional campaigns for your courses.
                    </p>
                    <a href="#" class="text-accent-green hover:text-white font-semibold text-sm">Manage Promos
                        &rarr;</a>
                </div>
            </div>
        </section>

    </main>
@endsection
