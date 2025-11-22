@extends('Layouts.app')

@section('content')
  <header
        class="bg-secondary-light dark:bg-secondary-dark shadow-lg border-b border-gray-200 dark:border-gray-700 ">
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
    <div class="max-w-7xl mx-auto p-6 lg:p-10">


        <!-- Header -->
        <header class="mb-10 pt-4 border-b border-gray-300 dark:border-gray-700 pb-4">
            <h1 class="text-4xl font-extrabold text-accent-blue dark:text-accent-gold mb-2 flex items-center gap-3">
                <i data-lucide="trello" class="w-10 h-10"></i> Course Assessment Dashboard
            </h1>
            <p class="text-lg text-gray-500 dark:text-gray-400">Track your progress and access your course completion
                certificate.</p>
        </header>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- A. Quiz Section (lg:col-span-2) -->
            <div class="lg:col-span-2 space-y-10">

                <!-- Active Quiz Card -->
                <div
                    class="bg-white dark:bg-gray-900 rounded-3xl p-8 shadow-lg dark:shadow-xl
 border border-gray-200 dark:border-gray-700 transition-colors duration-300">

                    <h2
                        class="text-3xl font-bold mb-6 border-b border-gray-200 dark:border-gray-700 pb-3 text-gray-700 dark:text-gray-200 flex items-center gap-2">
                        <i data-lucide="pen-tool" class="w-6 h-6 text-accent-blue dark:text-yellow-400"></i>
                        Module 3 Quiz: Electronic Configuration
                    </h2>

                    <form id="module-quiz-form" class="space-y-6">

                        <!-- Question 1 -->
                        <div
                            class="p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
                            <p class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">
                                1. What does the Aufbau Principle primarily dictate in quantum chemistry?
                            </p>
                            <div class="space-y-3">

                                <!-- Option -->
                                <label class="quiz-option block relative cursor-pointer">
                                    <input type="radio" name="q1" value="a" class="absolute opacity-0 peer">
                                    <span
                                        class="option-label block w-full p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl transition-all duration-200
                                   hover:bg-indigo-50 dark:hover:bg-gray-700
                                   peer-checked:bg-accent-blue dark:peer-checked:bg-yellow-400
                                   peer-checked:text-white dark:peer-checked:text-gray-900
                                   text-gray-800 dark:text-gray-200">
                                        The maximum number of electrons per shell ($2n^2$)
                                    </span>
                                </label>

                                <label class="quiz-option block relative cursor-pointer">
                                    <input type="radio" name="q1" value="b" class="absolute opacity-0 peer">
                                    <span
                                        class="option-label block w-full p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl transition-all duration-200
                                   hover:bg-indigo-50 dark:hover:bg-gray-700
                                   peer-checked:bg-accent-blue dark:peer-checked:bg-yellow-400
                                   peer-checked:text-white dark:peer-checked:text-gray-900
                                   text-gray-800 dark:text-gray-200">
                                        The magnetic spin orientation of electrons
                                    </span>
                                </label>

                                <label class="quiz-option block relative cursor-pointer">
                                    <input type="radio" name="q1" value="c" class="absolute opacity-0 peer">
                                    <span
                                        class="option-label block w-full p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl transition-all duration-200
                                   hover:bg-indigo-50 dark:hover:bg-gray-700
                                   peer-checked:bg-accent-blue dark:peer-checked:bg-yellow-400
                                   peer-checked:text-white dark:peer-checked:text-gray-900
                                   text-gray-800 dark:text-gray-200">
                                        The order of filling orbitals with electrons (Correct)
                                    </span>
                                </label>

                                <label class="quiz-option block relative cursor-pointer">
                                    <input type="radio" name="q1" value="d" class="absolute opacity-0 peer">
                                    <span
                                        class="option-label block w-full p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl transition-all duration-200
                                   hover:bg-indigo-50 dark:hover:bg-gray-700
                                   peer-checked:bg-accent-blue dark:peer-checked:bg-yellow-400
                                   peer-checked:text-white dark:peer-checked:text-gray-900
                                   text-gray-800 dark:text-gray-200">
                                        The shape of electron orbitals (s, p, d)
                                    </span>
                                </label>

                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div
                            class="p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 transition-colors duration-300">
                            <p class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">
                                2. According to Hund's Rule, when filling degenerate orbitals, what is maximized?
                            </p>
                            <div class="space-y-3">

                                <label class="quiz-option block relative cursor-pointer">
                                    <input type="radio" name="q2" value="a" class="absolute opacity-0 peer">
                                    <span
                                        class="option-label block w-full p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl transition-all duration-200
                                   hover:bg-indigo-50 dark:hover:bg-gray-700
                                   peer-checked:bg-accent-blue dark:peer-checked:bg-yellow-400
                                   peer-checked:text-white dark:peer-checked:text-gray-900
                                   text-gray-800 dark:text-gray-200">
                                        The total principal quantum number ($n$)
                                    </span>
                                </label>

                                <label class="quiz-option block relative cursor-pointer">
                                    <input type="radio" name="q2" value="b" class="absolute opacity-0 peer">
                                    <span
                                        class="option-label block w-full p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl transition-all duration-200
                                   hover:bg-indigo-50 dark:hover:bg-gray-700
                                   peer-checked:bg-accent-blue dark:peer-checked:bg-yellow-400
                                   peer-checked:text-white dark:peer-checked:text-gray-900
                                   text-gray-800 dark:text-gray-200">
                                        The total number of paired electrons
                                    </span>
                                </label>

                                <label class="quiz-option block relative cursor-pointer">
                                    <input type="radio" name="q2" value="c" class="absolute opacity-0 peer">
                                    <span
                                        class="option-label block w-full p-4 border-2 border-gray-300 dark:border-gray-600 rounded-xl transition-all duration-200
                                   hover:bg-indigo-50 dark:hover:bg-gray-700
                                   peer-checked:bg-accent-blue dark:peer-checked:bg-yellow-400
                                   peer-checked:text-white dark:peer-checked:text-gray-900
                                   text-gray-800 dark:text-gray-200">
                                        The total electron spin (Correct)
                                    </span>
                                </label>

                            </div>
                        </div>

                        <!-- Quiz Message -->
                        <div id="quiz-message"
                            class="hidden font-extrabold text-center p-4 rounded-xl transition duration-300"></div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full py-4 bg-accent-gold text-gray-900 font-extrabold text-xl rounded-xl 
                       hover:bg-yellow-500 transition duration-300 shadow-xl shadow-yellow-200/50 
                       dark:shadow-yellow-800/20 flex items-center justify-center gap-3">
                            <i data-lucide="check-square" class="w-6 h-6"></i> Submit Assessment
                        </button>
                    </form>
                </div>

                <!-- Module Navigation -->
                <div class="flex justify-between">
                    <button
                        class="px-6 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200 flex items-center gap-2 disabled:opacity-50"
                        disabled>
                        <i data-lucide="chevrons-left" class="w-5 h-5"></i> Previous Module
                    </button>
                    <button
                        class="px-6 py-2.5 bg-accent-blue text-white font-semibold rounded-xl hover:bg-indigo-600 transition duration-200 flex items-center gap-2">
                        Next Module <i data-lucide="chevrons-right" class="w-5 h-5"></i>
                    </button>
                </div>

            </div>



            <!-- B. Analytics & Certificate Section (lg:col-span-1) -->
            <div class="lg:col-span-1 space-y-10">

                <!-- Overall Summary -->
                <div
                    class="bg-white dark:bg-gray-900 
           rounded-3xl p-6 shadow-lg border border-gray-200 
           dark:border-gray-700 transition-all duration-300">

                    <h3
                        class="text-2xl font-bold mb-4 border-b border-gray-200 dark:border-gray-700 pb-3 
               text-accent-blue dark:text-accent-gold flex items-center gap-2">
                        <i data-lucide="activity" class="w-5 h-5"></i> Overall Progress
                    </h3>

                    <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                        <li
                            class="flex justify-between items-center font-medium border-b border-dashed border-gray-200 dark:border-gray-700 py-1">
                            <span>Modules Completed</span>
                            <span class="text-gray-900 dark:text-gray-100 font-bold">2 / 3</span>
                        </li>
                        <li
                            class="flex justify-between items-center font-medium border-b border-dashed border-gray-200 dark:border-gray-700 py-1">
                            <span>Required Pass Rate</span>
                            <span class="text-gray-900 dark:text-gray-100 font-bold">60%</span>
                        </li>
                        <li class="flex justify-between items-center font-medium py-1">
                            <span>Final Certificate Status</span>
                            <span id="certificate-status-text"
                                class="text-red-500 dark:text-red-400 font-bold flex items-center gap-1">
                                <i data-lucide="x-octagon" class="w-4 h-4"></i> Pending
                            </span>
                        </li>
                    </ul>
                </div>


                <!-- Quiz History Table -->
                <div
                    class="bg-white dark:bg-gray-900 
           rounded-3xl p-6 shadow-lg border border-gray-200 
           dark:border-gray-700 transition-all duration-300">

                    <h3
                        class="text-2xl font-bold mb-4 border-b border-gray-200 dark:border-gray-700 pb-3
               text-gray-700 dark:text-gray-200 flex items-center gap-2">
                        <i data-lucide="bar-chart-3" class="w-5 h-5"></i> Quiz History
                    </h3>

                    <table class="min-w-full border-collapse divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-800/70">
                                <th
                                    class="px-3 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider rounded-tl-xl">
                                    Quiz
                                </th>
                                <th
                                    class="px-3 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                    Score
                                </th>
                                <th
                                    class="px-3 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider rounded-tr-xl">
                                    Attempts
                                </th>
                            </tr>
                        </thead>

                        <tbody id="quiz-results-body"
                            class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Filled dynamically by JS -->
                        </tbody>
                    </table>

                </div>

                <!-- Certificate Section -->
                <div
                    class="bg-white dark:bg-gray-900 
           rounded-3xl p-6 shadow-lg border border-gray-200 
           dark:border-gray-700 transition-all duration-300">

                    <h3
                        class="text-2xl font-bold mb-6 border-b border-gray-200 dark:border-gray-700 pb-3 
               text-accent-blue dark:text-accent-gold flex items-center gap-2">
                        <i data-lucide="award" class="w-6 h-6"></i> Your Certificate
                    </h3>

                    <!-- Certificate View -->
                    <div id="certificate-view" class="hidden text-center p-4 rounded-xl">
                        <div
                            class="w-full h-full p-8 flex flex-col justify-center items-center rounded-2xl
                   bg-white dark:bg-gray-800 
                   border-4 border-accent-gold shadow-md dark:shadow-lg 
                   hover:shadow-xl transition-all duration-500">

                            <p class="text-base font-serif text-gray-700 dark:text-gray-300 mb-1 tracking-wide">
                                Certificate of Achievement
                            </p>

                            <h4
                                class="text-4xl sm:text-5xl font-extrabold text-accent-blue dark:text-accent-gold 
                       my-2 font-serif tracking-tight">
                                CourseEasy
                            </h4>

                            <p class="text-sm italic text-gray-600 dark:text-gray-400">is proudly presented to</p>

                            <h5
                                class="text-2xl sm:text-3xl font-serif font-bold italic my-3 
                       border-b-4 border-accent-gold px-6 text-gray-800 dark:text-gray-100">
                                Learner Name
                            </h5>

                            <p class="text-base text-gray-600 dark:text-gray-300">
                                For successfully completing the course
                            </p>

                            <h5 class="text-lg sm:text-xl font-extrabold mt-2 text-gray-800 dark:text-gray-100">
                                Atomic Structure & Quantum Theory
                            </h5>

                            <button
                                class="mt-6 px-6 py-2 bg-accent-blue text-white text-base font-semibold rounded-full 
                       hover:bg-indigo-600 dark:hover:bg-accent-gold dark:hover:text-gray-900 
                       shadow-md hover:shadow-xl transition-all">
                                Download PDF
                            </button>
                        </div>
                    </div>

                    <!-- Pending Certificate -->
                    <div id="certificate-pending"
                        class="text-center p-6 text-gray-600 dark:text-gray-400 rounded-2xl 
               bg-gray-50 dark:bg-gray-800/70 border border-gray-200 dark:border-gray-700 transition-all">
                        <i data-lucide="lock" class="w-10 h-10 mx-auto mb-3 text-red-500 dark:text-red-400"></i>
                        <p class="font-semibold text-lg text-gray-700 dark:text-gray-200">Certificate Locked</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Pass all modules (M1, M2, M3) to unlock your final certification.
                        </p>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <!-- JavaScript Logic -->
    <script>
        lucide.createIcons();

        // --- MOCK DATA & ANSWERS ---

        // Results are stored locally to simulate progress updates
        let MOCK_QUIZ_RESULTS = [{
                id: 1,
                title: 'M1: Atomic Structure',
                score: 85,
                status: 'Passed',
                attempts: 1
            },
            {
                id: 2,
                title: 'M2: Quantum Theory',
                score: 72,
                status: 'Passed',
                attempts: 2
            },
            // M3 is the active quiz on the screen, simulated as not yet passed
            {
                id: 3,
                title: 'M3: Configuration',
                score: 0,
                status: 'Pending',
                attempts: 0
            },
        ];

        const MOCK_QUIZ_ANSWERS = {
            q1: 'c', // The order of filling orbitals with electrons (Aufbau)
            q2: 'c' // The total electron spin (Hund's Rule)
        };

        const PASS_SCORE = 60;

        // --- QUIZ & ANALYTICS LOGIC ---

        /**
         * Renders the quiz results table and updates the certificate status.
         */
        function renderQuizAnalytics() {
            const resultsBody = document.getElementById('quiz-results-body');
            const statusText = document.getElementById('certificate-status-text');
            const certView = document.getElementById('certificate-view');
            const certPending = document.getElementById('certificate-pending');

            resultsBody.innerHTML = ''; // Clear existing
            let allPassed = true;

            MOCK_QUIZ_RESULTS.forEach(result => {
                const isPassed = result.score >= PASS_SCORE;
                if (!isPassed) {
                    allPassed = false;
                }
                const statusClass = isPassed ? 'text-green-600 dark:text-green-400' :
                    'text-red-600 dark:text-red-400';

                const row = document.createElement('tr');
                row.classList.add(
                    'hover:bg-gray-50',
                    'dark:hover:bg-gray-700/50',
                    'transition',
                    'duration-100'
                );

                row.innerHTML = `
    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
        ${result.title}
    </td>
    <td class="px-3 py-4 whitespace-nowrap text-sm font-bold ${
        isPassed ? 'text-accent-blue dark:text-accent-gold' : statusClass
    }">
        ${result.score}%
    </td>
    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
        ${result.attempts}
    </td>
`;

                resultsBody.appendChild(row);
            });

            // Update Certificate Status
            statusText.classList.remove('text-red-500', 'text-green-600', 'dark:text-green-400');
            statusText.innerHTML = '';

            if (allPassed) {
                statusText.classList.add('text-green-600', 'dark:text-green-400');
                statusText.innerHTML = `<i data-lucide="badge-check" class="w-4 h-4"></i> Earned`;

                certPending.classList.add('hidden');
                certView.classList.remove('hidden');
            } else {
                statusText.classList.add('text-red-500');
                statusText.innerHTML = `<i data-lucide="x-octagon" class="w-4 h-4"></i> Pending`;

                certView.classList.add('hidden');
                certPending.classList.remove('hidden');
            }

            lucide.createIcons();
        }

        /**
         * Handles the quiz submission and scores the result.
         * @param {Event} e 
         */
        document.getElementById('module-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = e.target;
            const messageBox = document.getElementById('quiz-message');

            const q1Answer = form.elements['q1'] ? form.elements['q1'].value : null;
            const q2Answer = form.elements['q2'] ? form.elements['q2'].value : null;

            if (!q1Answer || !q2Answer) {
                messageBox.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100',
                    'text-red-800', 'dark:bg-red-800', 'dark:text-red-100');
                messageBox.classList.add('bg-yellow-100', 'text-yellow-800', 'dark:bg-yellow-800',
                    'dark:text-yellow-100');
                messageBox.innerHTML = 'Please answer all questions before submitting.';
                return;
            }

            let correctCount = 0;
            if (q1Answer === MOCK_QUIZ_ANSWERS.q1) correctCount++;
            if (q2Answer === MOCK_QUIZ_ANSWERS.q2) correctCount++;

            const totalQuestions = Object.keys(MOCK_QUIZ_ANSWERS).length;
            const score = Math.round((correctCount / totalQuestions) * 100);
            const isPassed = score >= PASS_SCORE;

            // Find and update the mock M3 result
            const m3Index = MOCK_QUIZ_RESULTS.findIndex(r => r.id === 3);
            if (m3Index !== -1) {
                // Only update score if the new score is higher than the previous one
                if (score > MOCK_QUIZ_RESULTS[m3Index].score) {
                    MOCK_QUIZ_RESULTS[m3Index].score = score;
                }
                MOCK_QUIZ_RESULTS[m3Index].attempts = (MOCK_QUIZ_RESULTS[m3Index].attempts || 0) + 1;
                MOCK_QUIZ_RESULTS[m3Index].status = isPassed ? 'Passed' : 'Failed';
            }


            messageBox.classList.remove('hidden', 'bg-yellow-100', 'text-yellow-800', 'dark:bg-yellow-800',
                'dark:text-yellow-100');

            if (isPassed) {
                messageBox.classList.add('bg-green-100', 'text-green-800', 'dark:bg-green-800',
                    'dark:text-green-100');
                messageBox.innerHTML = `Success! You scored ${score}%. Quiz Passed!`;
            } else {
                messageBox.classList.add('bg-red-100', 'text-red-800', 'dark:bg-red-800', 'dark:text-red-100');
                messageBox.innerHTML = `Keep trying! You scored ${score}%. You need ${PASS_SCORE}% to pass.`;
            }

            // After submission, re-render analytics
            renderQuizAnalytics();
        });


        // --- INITIALIZATION ---

        document.addEventListener('DOMContentLoaded', () => {
            // Check for system dark mode preference on initial load
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            }
            renderQuizAnalytics();
        });
    </script>
@endpush
