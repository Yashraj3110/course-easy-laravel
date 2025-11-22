@extends('Layouts.app')

@section('content')
    <header class="bg-secondary-light dark:bg-secondary-dark shadow-lg border-b border-gray-200 dark:border-gray-700 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex flex-wrap justify-between items-center gap-2">
            <h1 id="lecture-title"
                class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white tracking-wide text-center sm:text-left">
                Lecture 1: Introduction to Atomic Structure
            </h1>

            <a href="{{ route('course.details') }}"
                class="text-accent-blue dark:text-accent-gold hover:text-indigo-600 dark:hover:text-yellow-400 font-semibold transition duration-200 flex items-center gap-1 text-sm sm:text-base">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Course
            </a>
        </div>
    </header>

    <div class="container mx-auto px-4 sm:px-6">
        <main class="mx-auto p-4 sm:p-6 grid grid-cols-1 lg:grid-cols-4 gap-6 sm:gap-8 mt-6">

            <!-- 🎥 Video + Controls -->
            <div class="lg:col-span-3 space-y-4">
                <div class="bg-black rounded-2xl sm:rounded-3xl overflow-hidden shadow-2xl">
                    <div class="aspect-video">
                        <iframe id="youtube-player" class="w-full h-full"
                            src="https://www.youtube.com/embed/SRY_EWFbb1g?rel=0&modestbranding=1&controls=1"
                            title="Lecture Video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- ✅ Lecture Navigation -->
                <div
                    class="flex flex-col sm:flex-row justify-between gap-3 sm:gap-0 p-4 bg-secondary-light dark:bg-secondary-dark rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg-light dark:shadow-lg-dark">
                    <button onclick="prevLecture()"
                        class="w-full sm:w-auto px-5 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white font-semibold rounded-xl hover:bg-gray-400 dark:hover:bg-gray-700 transition duration-200 flex justify-center items-center gap-2 disabled:opacity-50"
                        disabled>
                        <i data-lucide="chevron-left" class="w-5 h-5"></i> Previous
                    </button>
                    <button onclick="nextLecture()"
                        class="w-full sm:w-auto px-5 py-2 bg-accent-blue text-white font-semibold rounded-xl hover:bg-indigo-600 transition duration-200 flex justify-center items-center gap-2 disabled:opacity-50">
                        Next <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- 📚 Collapsible Sidebar (Course Content) -->
            <div
                class="lg:col-span-1 bg-secondary-light dark:bg-secondary-dark rounded-3xl shadow-lg-light dark:shadow-lg-dark p-5 border border-gray-200 dark:border-gray-700/50">

                <details class="lg:hidden mb-4" open>
                    <summary
                        class="text-lg font-bold mb-2 flex justify-between items-center text-accent-blue dark:text-accent-gold cursor-pointer">
                        Course Content
                        <i data-lucide="chevron-down" class="w-5 h-5 transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div id="module-list-mobile"
                        class="space-y-3 max-h-[60vh] overflow-y-auto pr-2 custom-scroll mt-2 text-sm">
                        <details open>
                            <summary class="text-base font-semibold text-gray-600 dark:text-gray-400">
                                Module 1: Basics of Atomic Structure
                            </summary>
                            <ul class="space-y-2 py-2">
                                <li><button
                                        onclick="loadLecture('SRY_EWFbb1g', 'Lecture 1: Introduction to Atomic Structure', this)"
                                        class="lecture-btn w-full text-left px-4 py-3 rounded-xl transition duration-200">Lecture
                                        1: Introduction</button></li>
                                <li><button onclick="loadLecture('AbCdEfGhIjk', 'Lecture 2: Subatomic Particles', this)"
                                        class="lecture-btn w-full text-left px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition">Lecture
                                        2: Subatomic Particles</button></li>
                            </ul>
                        </details>

                        <details data-module-id="2">
                            <summary class="text-base font-semibold text-gray-600 dark:text-gray-400">
                                Module 2: Quantum Theory
                            </summary>
                            <ul class="space-y-2 py-2">
                                <li><button onclick="loadLecture('QwErTy12345', 'Lecture 4: Quantum Numbers', this)"
                                        class="lecture-btn w-full text-left px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition duration-200">Lecture
                                        4: Quantum Numbers</button></li>
                                <li><button onclick="loadLecture('LmNoPqRsTu', 'Lecture 5: Orbitals and Shapes', this)"
                                        class="lecture-btn w-full text-left px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition duration-200">Lecture
                                        5: Orbitals and Shapes</button></li>
                            </ul>
                        </details>
                        <p class="text-gray-500 dark:text-gray-400 text-center py-2">Expand modules to view lectures.</p>
                    </div>
                </details>

                <!-- Shown only on large screens -->
                <div id="module-list"
                    class="hidden lg:block space-y-4 max-h-[75vh] overflow-y-auto pr-2 custom-scroll text-sm">
                    <details open>
                        <summary class="text-base font-semibold text-gray-600 dark:text-gray-400">
                            Module 1: Basics of Atomic Structure
                        </summary>
                        <ul class="space-y-2 py-2">
                            <li><button
                                    onclick="loadLecture('SRY_EWFbb1g', 'Lecture 1: Introduction to Atomic Structure', this)"
                                    class="lecture-btn w-full text-left px-4 py-3 rounded-xl transition duration-200">Lecture
                                    1: Introduction</button></li>
                            <li><button onclick="loadLecture('AbCdEfGhIjk', 'Lecture 2: Subatomic Particles', this)"
                                    class="lecture-btn w-full text-left px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition">Lecture
                                    2: Subatomic Particles</button></li>
                        </ul>
                    </details>

                    <details data-module-id="2">
                        <summary class="text-base font-semibold text-gray-600 dark:text-gray-400">
                            Module 2: Quantum Theory
                        </summary>
                        <ul class="space-y-2 py-2">
                            <li><button onclick="loadLecture('QwErTy12345', 'Lecture 4: Quantum Numbers', this)"
                                    class="lecture-btn w-full text-left px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition duration-200">Lecture
                                    4: Quantum Numbers</button></li>
                            <li><button onclick="loadLecture('LmNoPqRsTu', 'Lecture 5: Orbitals and Shapes', this)"
                                    class="lecture-btn w-full text-left px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition duration-200">Lecture
                                    5: Orbitals and Shapes</button></li>
                        </ul>
                    </details>


                    <!-- Other modules ... -->
                </div>
            </div>
        </main>

        <!-- 📘 Lecture Info & Buttons -->
        <section
            class="mx-auto bg-secondary-light dark:bg-secondary-dark rounded-3xl shadow-lg-light dark:shadow-lg-dark mt-6 mb-10 p-6 sm:p-8 border border-gray-200 dark:border-gray-700/50">
            <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                        <i data-lucide="book-open-text" class="w-5 h-5 text-accent-blue dark:text-accent-gold"></i>
                        Current Lecture
                    </h3>
                    <p id="lecture-description"
                        class="text-sm sm:text-base text-gray-600 dark:text-gray-400 max-w-3xl leading-relaxed"></p>
                </div>

                <div class="flex flex-wrap gap-3 sm:gap-4 pt-1">
                    <button
                        class="px-4 sm:px-5 py-2 bg-accent-gold text-gray-900 dark:text-primary-dark font-semibold rounded-xl hover:bg-yellow-500 transition duration-200 flex items-center gap-2 text-sm sm:text-base">
                        <i data-lucide="download" class="w-5 h-5"></i> Download Resources
                    </button>
                    <button onclick="toggleNotesSidebar()"
                        class="px-4 sm:px-5 py-2 bg-accent-blue text-white font-semibold rounded-xl hover:bg-indigo-600 transition duration-200 flex items-center gap-2 text-sm sm:text-base">
                        <i data-lucide="clipboard-list" class="w-5 h-5"></i> View/Save Notes
                    </button>
                </div>
            </div>
        </section>

        <!-- 🗒️ Notes Sidebar -->
        <div id="notes-sidebar"
            class="fixed top-0 right-0 w-72 sm:w-80 h-full bg-secondary-light dark:bg-secondary-dark shadow-2xl border-l border-gray-200 dark:border-gray-700 z-50 transform translate-x-full sidebar-transition p-6">
            <div class="flex justify-between items-center mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">
                <h3 class="text-lg sm:text-xl font-bold text-accent-blue dark:text-accent-gold flex items-center gap-2">
                    <i data-lucide="clipboard-list" class="w-6 h-6"></i> My Lecture Notes
                </h3>
                <button onclick="toggleNotesSidebar()"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-white transition duration-200">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mb-4">Notes are auto-saved for the current
                lecture.</p>

            <textarea id="note-input"
                class="w-full h-64 p-3 bg-primary-light dark:bg-primary-dark border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-gray-200 focus:ring-accent-gold focus:border-accent-gold resize-none"
                placeholder="Start typing your personal notes here..."></textarea>

            <button
                class="mt-4 w-full py-2 bg-accent-gold text-gray-900 dark:text-primary-dark font-semibold rounded-xl hover:bg-yellow-500 transition duration-200">
                Save Notes (Local)
            </button>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        tailwind.config = {
            // Configure Tailwind to respect the 'dark' class on the HTML element
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        // Light Mode Base Colors (Default)
                        'primary-light': '#f8fafc', // Light background (slate-50)
                        'secondary-light': '#ffffff', // Card/Sidebar background

                        // Dark Mode Base Colors (Used with 'dark:' prefix)
                        'primary-dark': '#0f172a', // Deep navy-blue (Background)
                        'secondary-dark': '#1e293b', // Lighter for cards/sidebar

                        // Accent Colors (Used in both themes, but styled differently)
                        'accent-gold': '#facc15', // Primary CTA/Highlight
                        'accent-blue': '#6366f1', // Primary brand color (Indigo)
                        'active-light': '#e0e7ff', // Light theme active state (indigo-100)
                    },
                    boxShadow: {
                        'lg-dark': '0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.1)',
                        'lg-light': '0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03)',
                    }
                }
            }
        }
    </script>
    <script>
        lucide.createIcons();

        // Theme Toggle Logic
        const html = document.documentElement;
        const toggleButton = document.getElementById('theme-toggle');

        function updateThemeIcon() {
            const icon = toggleButton.querySelector('.theme-icon');
            if (html.classList.contains('dark')) {
                icon.setAttribute('data-lucide', 'moon');
            } else {
                icon.setAttribute('data-lucide', 'sun');
            }
            lucide.createIcons(); // Re-render the icon
        }

        toggleButton.addEventListener('click', () => {
            html.classList.toggle('dark');
            updateThemeIcon();
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });

        // Set initial theme based on local storage or system preference
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        }
        updateThemeIcon();


        // Existing Course Player Logic (Modified to include theme update)
        const lectures = [{
                id: 'SRY_EWFbb1g',
                title: 'Lecture 1: Introduction to Atomic Structure',
                desc: 'In this lecture, we introduce the core concept of atomic structure — covering subatomic particles and the progression of early atomic models.'
            },
            {
                id: 'AbCdEfGhIjk',
                title: 'Lecture 2: Subatomic Particles',
                desc: 'A detailed look at protons, neutrons, and electrons, including their properties and role in determining an elements identity.'
            },
            {
                id: 'ZyXwVuTsRq',
                title: 'Lecture 3: Atomic Models',
                desc: 'Tracing the history of atomic theory from Dalton to Bohr and the modern quantum mechanical model.'
            },
            {
                id: 'QwErTy12345',
                title: 'Lecture 4: Quantum Numbers',
                desc: 'Understanding the four quantum numbers (n, l, ml, ms) and their significance in defining electron states.'
            },
            {
                id: 'LmNoPqRsTu',
                title: 'Lecture 5: Orbitals and Shapes',
                desc: 'Visualizing and comprehending the shapes of s, p, and d orbitals.'
            },
            {
                id: 'UiOpAsDfGh',
                title: 'Lecture 6: Aufbau Principle',
                desc: 'Learning the rules for filling atomic orbitals with electrons, starting from the lowest energy levels.'
            },
            {
                id: 'JkLzXcVbNm',
                title: 'Lecture 7: Hund’s Rule',
                desc: 'Applying Hund’s rule of maximum multiplicity to correctly write electronic configurations.'
            },
        ];

        let currentLectureIndex = 0;
        const lectureBtnElements = document.querySelectorAll('.lecture-btn');
        const prevButton = document.querySelector('button[onclick="prevLecture()"]');
        const nextButton = document.querySelector('button[onclick="nextLecture()"]');

        function updateNavigationButtons() {
            prevButton.disabled = currentLectureIndex === 0;
            nextButton.disabled = currentLectureIndex === lectures.length - 1;
        }

        function loadLecture(videoId, title, btn = null) {
            const player = document.getElementById('youtube-player');

            // 1. Load Video and Update Titles
            player.src = `https://www.youtube.com/embed/${videoId}?rel=0&modestbranding=1&controls=1&autoplay=1`;
            document.getElementById('lecture-title').innerText = title;
            document.title = `${title} | CourseEasy`;

            // 2. Update Description & Index
            const lectureData = lectures.find(l => l.id === videoId);
            if (lectureData) {
                document.getElementById('lecture-description').innerText = lectureData.desc;
                currentLectureIndex = lectures.findIndex(l => l.id === videoId);
            }

            // 3. Update Active State and Collapsable Modules
            let targetBtn = btn;
            if (!targetBtn) {
                targetBtn = Array.from(lectureBtnElements).find(b => b.onclick.toString().includes(videoId));
            }

            lectureBtnElements.forEach(b => {
                b.classList.remove('active-lecture');
                b.classList.remove('bg-accent-blue');
                b.classList.add('text-gray-700', 'hover:bg-gray-100', 'dark:text-gray-300',
                    'dark:hover:bg-gray-700/50');
            });

            if (targetBtn) {
                // Apply active styles
                targetBtn.classList.add('active-lecture');
                targetBtn.classList.remove('text-gray-700', 'hover:bg-gray-100', 'dark:text-gray-300',
                    'dark:hover:bg-gray-700/50');

                // Ensure parent module is open
                const parentDetails = targetBtn.closest('details');
                document.querySelectorAll('details').forEach(d => {
                    if (d !== parentDetails) {
                        d.open = false;
                    }
                });
                if (parentDetails) {
                    parentDetails.open = true;
                }

                // Scroll to active lecture
                const contentContainer = document.querySelector('.custom-scroll');
                if (contentContainer) {
                    contentContainer.scrollTop = targetBtn.offsetTop - contentContainer.offsetTop - 50;
                }
            }

            // 4. Update Navigation and Notes 
            updateNavigationButtons();
            document.getElementById('note-input').value = `Notes for ${title} will be loaded/saved here.`;
        }

        function nextLecture() {
            if (currentLectureIndex < lectures.length - 1) {
                const next = lectures[currentLectureIndex + 1];
                loadLecture(next.id, next.title);
            }
        }

        function prevLecture() {
            if (currentLectureIndex > 0) {
                const prev = lectures[currentLectureIndex - 1];
                loadLecture(prev.id, prev.title);
            }
        }

        function toggleNotesSidebar() {
            const sidebar = document.getElementById('notes-sidebar');
            sidebar.classList.toggle('translate-x-full');
        }

        // Initial load
        document.addEventListener('DOMContentLoaded', () => {
            const initialLecture = lectures[0];
            const initialBtn = document.querySelector('.lecture-btn');
            loadLecture(initialLecture.id, initialLecture.title, initialBtn);
        });
    </script>
@endpush
