@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-10 md:py-10 ">
        <!-- Course Header -->

        <section
            class="mx-auto mb-12 flex flex-col md:flex-row items-center md:items-start md:space-x-8 p-6 bg-white dark:bg-gray-800 rounded-3xl shadow-2xl shadow-blue-500/10 dark:shadow-blue-500/20 border border-gray-100 dark:border-gray-700">

            <!-- Circular Image (Left) -->
            <div class="flex-shrink-0 mb-6 md:mb-0">
                <img id="course-image" src="https://course-easy.vercel.app/static/media/won.88d6e07ca458c65902da.jpg"
                    alt="Course visual identity"
                    class="w-40 h-40 md:w-48 md:h-48 rounded-full object-cover border-8 border-white dark:border-gray-900 ring-4 ring-blue-500 ring-offset-4 ring-offset-gray-50 dark:ring-offset-gray-900 transform transition duration-500 hover:scale-105 shadow-xl">
            </div>

            <!-- Course Text Details (Right) -->
            <div class="flex-grow text-center md:text-left">
                <span id="course-category"
                    class="inline-block text-sm font-semibold px-4 py-1 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-400 transition-colors duration-300 mb-3">
                    Development
                </span>
                <h1 id="course-title"
                    class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-2 leading-tight">
                    Advanced React & Next.js Development
                </h1>
                <p id="course-description-short" class="text-lg text-gray-600 dark:text-gray-400 mb-4">
                    Master modern web development by deeply integrating React Hooks, Server Components, and the App Router
                    in Next.js.
                </p>

                <div
                    class="flex flex-wrap justify-center md:justify-start items-center space-x-6 text-gray-700 dark:text-gray-300 pt-2 border-t border-gray-100 dark:border-gray-700">
                    <span class="flex items-center font-bold text-lg text-yellow-500">
                        <i data-lucide="star" class="w-5 h-5 fill-yellow-500 mr-1"></i>
                        <span id="course-rating">4.8</span>
                    </span>
                    <span class="text-base text-gray-500 dark:text-gray-400">
                        <span id="course-students">12,450</span> Students
                    </span>
                    <span class="flex items-center text-base text-gray-500 dark:text-gray-400">
                        <i data-lucide="user-check" class="w-5 h-5 mr-1 text-blue-500"></i>
                        Instructor: <span id="course-instructor" class="font-medium text-gray-900 dark:text-white ml-1">Jane
                            Doe</span>
                    </span>
                </div>
            </div>
        </section>

        <!-- Main Content Grid -->
        <div class="lg:grid lg:grid-cols-3 lg:gap-12 mt-12">

            <!-- Left Column: Course Details & Curriculum -->
            <div class="lg:col-span-2 space-y-10">

                <!-- Detailed Description -->
                <section class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl border-t-4 border-blue-500">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">What you'll learn</h2>
                    <p id="course-description-full" class="text-gray-600 dark:text-gray-400 leading-relaxed text-lg">
                        Dive deep into the new Next.js architecture, focusing on server-side rendering, client-side
                        interactions, and advanced caching patterns. You will build and deploy three full-stack
                        applications,
                        mastering authentication, data mutation using Server Actions, and optimizing for Core Web
                        Vitals.
                    </p>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 text-gray-700 dark:text-gray-300 text-base">
                        <li class="flex items-start">
                            <i data-lucide="check-circle"
                                class="w-5 h-5 text-blue-500 fill-blue-100 dark:fill-blue-900 mr-2 mt-1 flex-shrink-0"></i>
                            Master React Server and Client Component architecture.
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check-circle"
                                class="w-5 h-5 text-blue-500 fill-blue-100 dark:fill-blue-900 mr-2 mt-1 flex-shrink-0"></i>
                            Implement robust authentication using NextAuth.
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check-circle"
                                class="w-5 h-5 text-blue-500 fill-blue-100 dark:fill-blue-900 mr-2 mt-1 flex-shrink-0"></i>
                            Build full-stack applications with Server Actions.
                        </li>
                        <li class="flex items-start">
                            <i data-lucide="check-circle"
                                class="w-5 h-5 text-blue-500 fill-blue-100 dark:fill-blue-900 mr-2 mt-1 flex-shrink-0"></i>
                            Optimize performance and deploy to Vercel/AWS.
                        </li>
                    </ul>
                </section>

                <!-- Course Requirements -->
                <section class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Requirements</h2>
                    <ul id="course-requirements" class="space-y-3 text-gray-600 dark:text-gray-400">
                        <!-- Requirements populated by JS -->
                    </ul>
                </section>

                <!-- Curriculum -->
                <section class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Course Curriculum</h2>
                    <div id="course-curriculum"
                        class="divide-y divide-gray-100 dark:divide-gray-700 border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden shadow-inner">
                        <!-- Curriculum populated by JS -->
                    </div>
                </section>

            </div>

            <!-- Right Column: Sticky Enrollment Card -->
            <div class="lg:col-span-1 mt-10 lg:mt-0">
                <div
                    class="lg:sticky lg:top-24 bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-2xl border border-gray-100 dark:border-gray-700">
                    <div class="text-3xl font-extrabold text-gray-900 dark:text-white mb-4 flex items-end">
                        <span class="text-5xl text-blue-600 dark:text-blue-400">$<span id="course-price">99.99</span></span>
                        <span class="text-xl text-gray-500 dark:text-gray-400 ml-2">/ lifetime access</span>
                    </div>

                    <button id="enroll-button"
                        class="w-full bg-blue-600 text-white font-extrabold text-lg py-4 rounded-xl hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-[1.01] shadow-lg shadow-blue-500/40 dark:shadow-blue-700/40 mb-5">
                        Enroll Now
                    </button>

                    <p class="text-center text-sm text-gray-500 dark:text-gray-400 mb-6">30-Day Money-Back Guarantee</p>

                    <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300 mb-3">This course includes:</h3>

                    <ul class="space-y-3 text-gray-600 dark:text-gray-400">
                        <li class="flex items-center">
                            <i data-lucide="video" class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0"></i>
                            <span id="course-hours" class="font-semibold text-gray-800 dark:text-white mr-1">45
                                hours</span> of
                            on-demand video
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="book-open" class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0"></i>
                            <span id="course-modules" class="font-semibold text-gray-800 dark:text-white mr-1">10</span>
                            Modules
                            & Projects
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="download" class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0"></i>
                            Downloadable code and resources
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="award" class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0"></i>
                            Certificate of Completion
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="calendar-check" class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0"></i>
                            Last Updated: <span id="course-last-updated"
                                class="font-semibold text-gray-800 dark:text-white ml-1">October 2025</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <!-- === JAVASCRIPT LOGIC === -->
    <script>
        // Initialize lucide icons
        lucide.createIcons();

        // --- Dummy Course Data ---
        const courseData = {
            id: 1,
            title: "Advanced React & Next.js Development",
            category: "Development",
            difficulty: "Advanced",
            rating: 4.8,
            students: "12,450",
            instructor: "Jane Doe",
            color: "blue",
            price: 99.99,
            hours: 45,
            modules: 10,
            lastUpdated: "October 2025",
            description: "Dive deep into the new Next.js architecture, focusing on server-side rendering, client-side interactions, and advanced caching patterns. You will build and deploy three full-stack applications, mastering authentication, data mutation using Server Actions, and optimizing for Core Web Vitals.",
            requirements: [
                "Solid understanding of JavaScript (ES6+)",
                "Familiarity with React fundamentals (components, state, props)",
                "Basic knowledge of Node.js and npm/yarn",
                "Experience with modern CSS (Tailwind/Sass is a bonus)",
                "A strong desire to build amazing things!"
            ],
            curriculum: [{
                    title: "Module 1: Next.js Fundamentals & Setup",
                    duration: "3 hrs",
                    topics: ["Introduction to App Router", "Project Initialization",
                        "Folder Structure Best Practices"
                    ]
                },
                {
                    title: "Module 2: Server & Client Components Deep Dive",
                    duration: "5 hrs",
                    topics: ["Understanding Component Boundaries", "Fetching Data on the Server",
                        "When to use 'use client'"
                    ]
                },
                {
                    title: "Module 3: Data Fetching and Caching",
                    duration: "6 hrs",
                    topics: ["Server Actions and Mutations", "Revalidation Techniques",
                        "Working with third-party APIs"
                    ]
                },
                {
                    title: "Module 4: Authentication with NextAuth",
                    duration: "7 hrs",
                    topics: ["Setting up Providers", "Protected Routes", "Role-Based Access Control"]
                },
                {
                    title: "Module 5: Project 1: Full-Stack E-Commerce Platform",
                    duration: "10 hrs",
                    topics: ["Database Integration (Prisma)", "Payment Gateways (Stripe)", "Deployment"]
                },
                {
                    title: "Module 6: Performance & Deployment",
                    duration: "5 hrs",
                    topics: ["Image Optimization", "Metadata and SEO", "Route Handlers",
                        "Vercel Deployment Pipeline"
                    ]
                },
            ]
        };

        /**
         * Renders the course data into the page elements.
         */
        function renderCourseDetails(data) {
            // Update Header Section
            document.getElementById('course-title').textContent = data.title;
            document.getElementById('course-rating').textContent = data.rating;
            document.getElementById('course-students').textContent = data.students;
            document.getElementById('course-instructor').textContent = data.instructor;

            // Update Description Section
            document.getElementById('course-description-full').textContent = data.description;

            // Update Enrollment Card
            document.getElementById('course-price').textContent = data.price.toFixed(2);
            document.getElementById('course-hours').textContent = `${data.hours} hours`;
            document.getElementById('course-modules').textContent = `${data.modules}`;
            document.getElementById('course-last-updated').textContent = data.lastUpdated;

            // Render Requirements
            const reqList = document.getElementById('course-requirements');
            reqList.innerHTML = data.requirements.map(req => `
                <li class="flex items-start">
                    <i data-lucide="circle-dot" class="w-4 h-4 text-blue-500 mr-3 mt-1 flex-shrink-0"></i>
                    ${req}
                </li>
            `).join('');

            // Render Curriculum
            const curriculumList = document.getElementById('course-curriculum');
            curriculumList.innerHTML = data.curriculum.map((module, index) => `
                <details class="group p-4 transition duration-200 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                    <summary class="flex justify-between items-center font-semibold text-gray-900 dark:text-white">
                        <div class="flex items-center">
                            <i data-lucide="chevron-right" class="w-5 h-5 mr-3 text-blue-500 transition-transform duration-300 group-open:rotate-90"></i>
                            Module ${index + 1}: ${module.title}
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">${module.duration}</span>
                    </summary>
                    <ul class="ml-8 mt-3 space-y-2 text-gray-600 dark:text-gray-400 border-l border-gray-200 dark:border-gray-600 pl-4 py-1">
                        ${module.topics.map(topic => `
                                                <li class="flex items-center text-sm">
                                                    <i data-lucide="play-circle" class="w-4 h-4 mr-2 text-green-500 flex-shrink-0"></i>
                                                    ${topic}
                                                </li>
                                            `).join('')}
                    </ul>
                </details>
            `).join('');

            // Re-render lucide icons after adding new HTML
            lucide.createIcons();
        }

        // --- Message Box Functionality ---
        const messageBox = document.getElementById('messageBox');
        const messageText = document.getElementById('messageText');

        function showMessage(message, duration = 3000) {
            messageText.querySelector('span').textContent = message;
            messageBox.classList.remove('hidden');

            // Re-create icons for the message box
            lucide.createIcons({
                attr: 'data-lucide',
                parent: messageBox
            });

            setTimeout(() => {
                messageBox.classList.add('hidden');
            }, duration);
        }

        // --- Event Listeners ---
        document.getElementById('enroll-button').addEventListener('click', (e) => {
            e.preventDefault();
            showMessage(`Successfully added "${courseData.title}" to your cart!`);
        });

        // --- Initialization ---
        window.onload = () => {
            renderCourseDetails(courseData);
        };
    </script>
@endpush
