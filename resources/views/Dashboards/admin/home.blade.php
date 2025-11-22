@extends('Dashboards.admin.dashboard')

@section('Adash')
    <main class="flex-1 p-10 overflow-y-auto">

        <header class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-light text-white">Admin Control, <span class="font-bold">CEO</span></h2>
            <div class="flex items-center space-x-6">
                <button
                    class="py-2 px-4 bg-accent-blue text-white font-semibold rounded-full hover:bg-indigo-600 transition duration-300 flex items-center space-x-2">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Quick Action</span>
                </button>
            </div>
        </header>

        <section class="mb-12">
            <h3 class="text-2xl font-bold text-white mb-6">⚙️ System & User Health</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Total Users</p>
                    <span class="text-4xl font-extrabold text-accent-blue">145,890</span>
                    <p class="text-sm text-gray-500 mt-1">↗ 1,200 this week</p>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">New Instructors</p>
                    <span class="text-4xl font-extrabold text-accent-gold">14</span>
                    <p class="text-sm text-gray-500 mt-1">Pending Approval</p>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Course Approvals</p>
                    <span class="text-4xl font-extrabold text-accent-gold">22</span>
                    <p class="text-sm text-gray-500 mt-1">Pending Review</p>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Server Health</p>
                    <div class="flex items-center space-x-3">
                        <span class="text-4xl font-extrabold text-accent-green">99.9%</span>
                        <span
                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent-green/20 text-accent-green">
                            Operational
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Average Uptime (30d)</p>
                </div>
            </div>
        </section>

        <section class="mb-12">
            <h3 class="text-2xl font-bold text-white mb-6">💰 Financial Summary</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Platform Revenue (MTD)</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-extrabold text-accent-green">$98,345</span>
                        <span class="text-sm font-semibold text-accent-green">+8.5%</span>
                    </div>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Instructor Payouts</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-extrabold text-white">$42,100</span>
                        <button class="text-sm font-semibold text-accent-gold hover:underline">Run Payouts</button>
                    </div>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <p class="text-lg font-medium text-gray-400 mb-1">Refund Rate (30d)</p>
                    <div class="flex items-end justify-between">
                        <span class="text-3xl font-extrabold text-accent-red">2.1%</span>
                        <span class="text-sm font-semibold text-accent-red">↑ 0.3%</span>
                    </div>
                </div>
            </div>
        </section>


        <section class="mb-12">
            <h3 class="text-2xl font-bold text-white mb-6">✅ Pending Actions</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <h4 class="text-xl font-bold text-white mb-4">New Course Review Queue (15)</h4>
                    <ul class="space-y-3 divide-y divide-gray-700/50">
                        <li class="pt-3 flex justify-between items-center">
                            <span class="text-sm text-white">**Web Dev:** Modern JavaScript Frameworks</span>
                            <a href="#" class="text-accent-blue hover:text-white text-sm font-medium">Review
                                &rarr;</a>
                        </li>
                        <li class="pt-3 flex justify-between items-center">
                            <span class="text-sm text-white">**Art:** Advanced Digital Painting Techniques</span>
                            <a href="#" class="text-accent-blue hover:text-white text-sm font-medium">Review
                                &rarr;</a>
                        </li>
                        <li class="pt-3 flex justify-between items-center">
                            <span class="text-sm text-white">**Business:** Financial Modeling with Excel</span>
                            <a href="#" class="text-accent-blue hover:text-white text-sm font-medium">Review
                                &rarr;</a>
                        </li>
                    </ul>
                </div>

                <div class="p-6 bg-secondary-dark rounded-xl shadow-xl border border-gray-700/50">
                    <h4 class="text-xl font-bold text-white mb-4">Support & Moderation</h4>
                    <div class="space-y-4">
                        <div class="p-4 bg-gray-700/50 rounded-lg">
                            <p class="text-sm font-medium text-white flex justify-between">
                                Open Support Tickets: <span class="text-accent-gold font-bold">45</span>
                            </p>
                            <a href="#" class="text-xs text-accent-blue hover:underline">View Ticket Queue</a>
                        </div>
                        <div class="p-4 bg-gray-700/50 rounded-lg">
                            <p class="text-sm font-medium text-white flex justify-between">
                                Banned Accounts (30d): <span class="text-accent-red font-bold">8</span>
                            </p>
                            <a href="#" class="text-xs text-accent-red hover:underline">Manage Bans & Reports</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="p-6">
            <h1 class="text-2xl font-semibold text-white mb-4">Summary</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Total Users -->
                <div class="p-5 bg-gray-800/50 rounded-xl border border-gray-700/50">
                    <h2 class="text-gray-300">Total Users</h2>
                    <p class="text-3xl font-bold text-accent-gold mt-2">12,540</p>
                </div>

                <!-- Pending Approvals -->
                <div class="p-5 bg-gray-800/50 rounded-xl border border-gray-700/50">
                    <h2 class="text-gray-300">Pending Content</h2>
                    <p class="text-3xl font-bold text-accent-blue mt-2">34</p>
                </div>

            </div>

        </div>

    </main>
@endsection
