@extends('Dashboards.student.dashboard')

@section('Sdash')
    <!-- 2. My Certificates Section (New Content) -->
    <section class="w-full p-6 sm:p-8 bg-secondary-dark rounded-2xl shadow-xl border border-gray-700">
        <h2 class="text-3xl font-bold mb-8 text-white flex items-center gap-3">
            <i data-lucide="award" class="w-7 h-7 text-accent-gold"></i> My Certificates
        </h2>

        <!-- Certificates Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Certificate Card 1: Full Stack Development -->
            <div
                class="bg-tertiary-dark rounded-xl border border-gray-700 p-6 text-center shadow-lg hover:shadow-xl transition duration-300 hover:scale-[1.02]">
                <!-- Icon replaced with Lucide -->
                <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center rounded-full bg-accent-gold/20">
                    <i data-lucide="award" class="w-10 h-10 text-accent-gold"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-1">Full Stack Development</h3>
                <p class="text-gray-400 text-sm mb-3">Completed on: Oct 20, 2025</p>
                <a href="#"
                    class="inline-flex items-center justify-center gap-2 mt-2 bg-accent-blue text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition shadow-md">
                    <i data-lucide="download" class="w-4 h-4"></i> View Certificate
                </a>
            </div>

            <!-- Certificate Card 2: UI/UX Design Mastery -->
            <div
                class="bg-tertiary-dark rounded-xl border border-gray-700 p-6 text-center shadow-lg hover:shadow-xl transition duration-300 hover:scale-[1.02]">
                <!-- Icon replaced with Lucide -->
                <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center rounded-full bg-accent-gold/20">
                    <i data-lucide="award" class="w-10 h-10 text-accent-gold"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-1">UI/UX Design Mastery</h3>
                <p class="text-gray-400 text-sm mb-3">Completed on: Nov 2, 2025</p>
                <a href="#"
                    class="inline-flex items-center justify-center gap-2 mt-2 bg-accent-blue text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition shadow-md">
                    <i data-lucide="download" class="w-4 h-4"></i> View Certificate
                </a>
            </div>

            <!-- Certificate Card 3: Data Science with Python -->
            <div
                class="bg-tertiary-dark rounded-xl border border-gray-700 p-6 text-center shadow-lg hover:shadow-xl transition duration-300 hover:scale-[1.02]">
                <!-- Icon replaced with Lucide -->
                <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center rounded-full bg-accent-gold/20">
                    <i data-lucide="award" class="w-10 h-10 text-accent-gold"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-1">Data Science with Python</h3>
                <p class="text-gray-400 text-sm mb-3">Completed on: Sep 15, 2025</p>
                <a href="#"
                    class="inline-flex items-center justify-center gap-2 mt-2 bg-accent-blue text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition shadow-md">
                    <i data-lucide="download" class="w-4 h-4"></i> View Certificate
                </a>
            </div>
        </div>
    </section>
@endsection
