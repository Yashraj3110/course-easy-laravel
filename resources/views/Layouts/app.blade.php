<!DOCTYPE html>
<html id="html" lang="en" class="scroll-smooth transition-colors duration-300">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Easy | Modern Online Learning</title>

    <!-- Tailwind with dark mode enabled -->
    <script>
        window.tailwind = {
            config: {
                darkMode: 'class',
            }
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Custom Font & Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .blink {
            animation: blink 1s infinite;
        }

        @keyframes blink {

            0%,
            50%,
            100% {
                opacity: 1;
            }

            25%,
            75% {
                opacity: 0;
            }
        }

        .animate-spin-slow {
            animation: spin 4s linear infinite;
        }

        pre {
            white-space: pre-wrap;
        }
    </style>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        /* Utility class for robust modal display before transition starts */
        .show-modal {
            display: flex !important;
        }

        /* Custom scrollbar styling for dark mode */
        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #4f46e5;
            border-radius: 4px;
        }

        body::-webkit-scrollbar-track {
            background: #1f2937;
        }
    </style>
</head>



<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-300">

    @include('pages.navbar')



    <main>
        @yield('content')
    </main>

    @include('pages.footer')

    @stack('scripts')

</body>

</html>
