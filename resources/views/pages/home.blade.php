@extends('layouts.app')

@section('content')
    <section
        class="hero-section relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white overflow-hidden dark:bg-gray-900 dark:from-gray-900 dark:to-gray-800 dark:text-white">

        <div class="container mx-auto px-6 py-20 md:py-32 flex flex-col md:flex-row items-center">

            {{-- If user is logged in --}}
            @auth
                <div class="md:w-1/2 z-10 text-center md:text-left" data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight mb-6 hero-text dark:text-white">
                        Welcome back, {{ Auth::user()->name }}
                        <span class="block text-indigo-200 dark:text-indigo-400 hero-text">
                            Continue your learning journey
                        </span>
                    </h1>
                    <p
                        class="text-base sm:text-lg md:text-xl text-indigo-100 dark:text-gray-400 mb-10 max-w-xl mx-auto md:mx-0 hero-text">
                        Access your dashboard, resume courses, or explore new topics to boost your skills.
                    </p>
                    <a href="{{ route('dashboard.student.home') }}"
                        class="bg-yellow-400 text-gray-900 font-bold px-6 sm:px-8 py-3 rounded-lg text-lg shadow-xl hover:bg-yellow-300 transition-all duration-300 transform hover:scale-105 dark:bg-yellow-500 dark:hover:bg-yellow-400">
                        Go to Dashboard
                    </a>
                </div>
            @endauth

            {{-- If user is NOT logged in --}}
            @guest
                <div class="md:w-1/2 z-10 text-center md:text-left" data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight mb-6 hero-text dark:text-white">
                        Unlock Your Potential.
                        <span class="block text-indigo-200 dark:text-indigo-400 hero-text">Start Learning Today.</span>
                    </h1>
                    <p
                        class="text-base sm:text-lg md:text-xl text-indigo-100 dark:text-gray-400 mb-10 max-w-xl mx-auto md:mx-0 hero-text">
                        Explore thousands of courses from expert instructors. Master new skills, advance your career,
                        and learn anytime, anywhere.
                    </p>
                    <a
                        class="open-signup-modal bg-yellow-400 text-gray-900 font-bold px-6 sm:px-8 py-3 rounded-lg text-lg shadow-xl hover:bg-yellow-300 transition-all duration-300 transform hover:scale-105 animate-bounce hero-text dark:bg-yellow-500 dark:hover:bg-yellow-400">
                        Get Started Free
                    </a>
                </div>
            @endguest

            {{-- Right Side Graphic (common for both) --}}
            <div class="md:w-1/2 relative mt-12 md:mt-0" data-aos="fade-left" data-aos-duration="1200">
                <div
                    class="absolute w-48 h-48 sm:w-64 sm:h-64 bg-white bg-opacity-20 rounded-full -bottom-12 md:-top-16 md:right-16 animate-pulse dark:bg-gray-600 dark:bg-opacity-20">
                </div>
                <div
                    class="absolute w-64 h-64 sm:w-80 sm:h-80 bg-white bg-opacity-10 rounded-full top-0 -left-12 md:left-10 animate-ping dark:bg-gray-600 dark:bg-opacity-10">
                </div>

                @auth
                    <!-- User is logged in -->
                    {{-- <div class="relative z-10 w-full max-w-xs sm:max-w-md mx-auto md:ml-10">
                        <div class="hero-card bg-white dark:bg-gray-700 rounded-2xl shadow-2xl p-6" data-aos="zoom-in"
                            data-aos-duration="1000">
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-10 h-10 bg-indigo-500 rounded-full flex items-center justify-center animate-spin-slow">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m1.586 5.407l-2.122 2.122M15.804 17.02l-2.122-2.122m-5.407-1.586l-2.122-2.122" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 dark:text-gray-100 ml-3 hero-text">Introduction to AI
                                </h4>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 hero-text">Your course progress</p>
                            <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full w-2/5"></div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- SHOW EMPTY STATE -->
                    <div class="relative z-10 w-full max-w-xs sm:max-w-md mx-auto md:ml-10">
                        <div class="hero-card bg-white dark:bg-gray-700 rounded-2xl shadow-xl p-6 text-center"
                            data-aos="zoom-in" data-aos-duration="1000">

                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                No courses enrolled yet
                            </h4>

                            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
                                Start learning by enrolling in your first course.
                            </p>

                            <a href="/courses"
                                class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                                Browse Courses
                            </a>

                        </div>
                    </div>
                @endauth

                {{-- If user is NOT logged in --}}
                @guest

                    <div class="relative z-10 w-full max-w-xs sm:max-w-md mx-auto md:ml-10">
                        <div class="hero-card bg-white dark:bg-gray-700 rounded-2xl shadow-2xl p-6 text-center"
                            data-aos="zoom-in" data-aos-duration="1000">
                            <div class="mb-4">
                                <div
                                    class="w-16 h-16 bg-indigo-500 rounded-full flex items-center justify-center mx-auto mb-3 animate-pulse">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.868v4.264a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 dark:text-gray-100 mb-2">Watch a Demo Lesson</h4>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                                    See how our platform works and what makes learning interactive and fun.
                                </p>
                            </div>
                            <div class="flex justify-center">
                                <button
                                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-all transform hover:scale-105 dark:bg-indigo-700 dark:hover:bg-indigo-600"
                                    onclick="alert('Play demo video...')">
                                    ▶ Watch Now
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            @endguest
        </div>
    </section>


    <section id="courses" class="courses-section py-24 bg-slate-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 courses-text" data-aos="fade-up"
                data-aos-duration="1000">
                Our Popular Courses 🚀
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-12 max-w-2xl mx-auto courses-text" data-aos="fade-up"
                data-aos-duration="1000" data-aos-delay="200">
                Choose from hundreds of courses created by the best instructors in the industry.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="course-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-left transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 dark:shadow-xl dark:hover:shadow-indigo-500/30"
                    data-aos="fade-up" data-aos-duration="1000">
                    <div class="text-indigo-600 dark:text-indigo-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-gray-900 dark:text-white courses-text">Web
                        Development</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 courses-text">Learn HTML, CSS, JavaScript,
                        React,
                        and more to build modern websites.</p>
                    <a href="#"
                        class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline courses-text">Explore
                        Course &rarr;</a>
                </div>
                <div class="course-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-left transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 dark:shadow-xl dark:hover:shadow-indigo-500/30"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="text-indigo-600 dark:text-indigo-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-gray-900 dark:text-white courses-text">Data Science
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 courses-text">Master Python, Machine Learning,
                        and data analysis techniques.</p>
                    <a href="#"
                        class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline courses-text">Explore
                        Course &rarr;</a>
                </div>
                <div class="course-card bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-left transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 dark:shadow-xl dark:hover:shadow-indigo-500/30"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="text-indigo-600 dark:text-indigo-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5.882a17.901 17.901 0 012.865 2.865m2.865 2.865a17.901 17.901 0 012.865 2.865m-8.59 8.59a17.901 17.901 0 01-2.865-2.865m-2.865-2.865a17.901 17.901 0 01-2.865-2.865m8.59-8.59a17.901 17.901 0 012.865-2.865m-2.865 2.865a17.901 17.901 0 01-2.865 2.865m0 0a17.901 17.901 0 01-2.865 2.865" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-gray-900 dark:text-white courses-text">Digital
                        Marketing</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 courses-text">Learn SEO, social media
                        marketing,
                        and content strategies to grow businesses.</p>
                    <a href="#"
                        class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline courses-text">Explore
                        Course &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about-section py-24 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2 w-full" data-aos="fade-right" data-aos-duration="1000">
                <div class="relative h-80 max-w-md mx-auto">
                    <div
                        class="absolute bg-indigo-500 dark:bg-indigo-700 rounded-2xl w-full h-56 top-0 left-0 shadow-lg transform -rotate-3 transition-all duration-300 hover:rotate-0 animate-pulse dark:shadow-indigo-500/50">
                    </div>
                    <div
                        class="absolute bg-purple-500 dark:bg-purple-700 rounded-2xl w-full h-56 top-8 left-4 shadow-lg transform rotate-3 transition-all duration-300 hover:rotate-0 animate-pulse dark:shadow-purple-500/50">
                    </div>
                    <div
                        class="relative bg-white dark:bg-gray-700 rounded-2xl w-full h-56 shadow-2xl p-6 flex flex-col justify-start about-card dark:text-white">
                        <h4 class="font-bold text-gray-900 dark:text-white text-lg mb-2 about-text">Why Course
                            Easy?
                        </h4>
                        <p class="text-gray-800 dark:text-gray-300 font-mono text-sm mt-2 about-text">
                            <span id="typing-text"></span><span class="blink">|</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 mt-20 md:mt-0" data-aos-duration="1000">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 about-text">Why Choose Us?</h2>
                <ul class="space-y-6">
                    <li class="flex items-start" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <div
                            class="flex-shrink-0 text-indigo-600 bg-indigo-50 dark:bg-indigo-900 dark:text-indigo-400 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-5.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white about-text">Expert
                                Instructors</h4>
                            <p class="text-gray-600 dark:text-gray-400 mt-1 about-text">Learn from industry experts
                                who are passionate about teaching.</p>
                        </div>
                    </li>
                    <li class="flex items-start" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div
                            class="flex-shrink-0 text-indigo-600 bg-indigo-50 dark:bg-indigo-900 dark:text-indigo-400 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white about-text">Learn
                                Anytime
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 mt-1 about-text">Our courses are flexible
                                and
                                designed to fit your schedule.</p>
                        </div>
                    </li>
                    <li class="flex items-start" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div
                            class="flex-shrink-0 text-indigo-600 bg-indigo-50 dark:bg-indigo-900 dark:text-indigo-400 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white about-text">
                                Certification
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 mt-1 about-text">Receive recognized
                                certificates to showcase your skills professionally.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <section id="contact"
        class="py-24 bg-gradient-to-r from-purple-600 to-indigo-600 text-white dark:bg-gray-900 dark:from-gray-900 dark:to-gray-800 transition-colors duration-300"
        data-aos="fade-up" data-aos-duration="1200">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-6 contact-text dark:text-white">Start Learning Today!
            </h2>
            <p class="text-lg text-indigo-100 dark:text-gray-400 mb-10 max-w-2xl mx-auto contact-text">
                Join thousands of learners and unlock your potential. Sign up for free and get access to our
                introductory courses.
            </p>
            <a href="#"
                class="open-signup-modal bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg text-lg shadow-xl hover:bg-yellow-300 transition-all duration-300 transform hover:scale-105 animate-bounce contact-text dark:bg-yellow-500 dark:hover:bg-yellow-400">
                Sign Up Now
            </a>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        AOS.init();

        // Typing effect (still works beautifully in dark mode)
        const typingText = document.getElementById('typing-text');
        const words = [
            'Flexible learning at your pace.',
            'Expert instructors from top universities.',
            'Gain practical skills for real-world jobs.',
            'Join a community of learners worldwide.'
        ];
        let i = 0,
            j = 0,
            currentWord = '',
            isDeleting = false;

        function type() {
            if (!typingText) return;
            if (i >= words.length) i = 0;
            currentWord = words[i];
            if (!isDeleting) {
                typingText.textContent = currentWord.slice(0, j + 1);
                j++;
                if (j === currentWord.length) {
                    isDeleting = true;
                    setTimeout(type, 1500);
                    return;
                }
            } else {
                typingText.textContent = currentWord.slice(0, j - 1);
                j--;
                if (j === 0) {
                    isDeleting = false;
                    i++;
                }
            }
            setTimeout(type, isDeleting ? 70 : 120);
        }
        type();
    </script>
@endpush
