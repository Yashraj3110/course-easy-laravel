<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Dashboard | CourseEasy</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/image/image.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Floating Cards Animation */
        .float {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>

    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen flex items-center justify-center">

    <!-- Center Container -->
    <div class="max-w-5xl mx-auto px-6 text-center">

        <!-- Logo -->
        <h1 class="text-6xl font-extrabold mb-6 tracking-tight">
            <span
                class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 
                 text-transparent bg-clip-text">
                Course
            </span>
            <span class="text-gray-200">Easy</span>
        </h1>


        <p class="text-gray-300 text-lg mb-12 tracking-wide">
            Select your role to access your dashboard
        </p>


        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Student -->
            <a href="{{ route('dashboard.student.home') }}"
                class="float group p-10 rounded-3xl
                bg-white/10 backdrop-blur-xl border border-blue-600/30
                hover:border-blue-400/70 hover:shadow-blue-500/30
                hover:shadow-2xl hover:scale-[1.06]
                transition-all duration-500 cursor-pointer">

                <div class="flex justify-center mb-4">
                    <i data-lucide="graduation-cap" class="w-14 h-14 text-blue-400 group-hover:text-blue-300"></i>
                </div>

                <h3 class="text-3xl font-bold text-blue-300 mb-3">
                    Student
                </h3>
                <p class="text-gray-300 text-sm">
                    Student dashboard to learn, track progress, and access your courses.
                </p>

            </a>

            <!-- Instructor -->
            <a href="{{ route('dashboard.instructor.home') }}"
                class="float group p-10 rounded-3xl
                bg-white/10 backdrop-blur-xl border border-purple-600/30
                hover:border-purple-400/70 hover:shadow-purple-500/30
                hover:shadow-2xl hover:scale-[1.06]
                transition-all duration-500 cursor-pointer">

                <div class="flex justify-center mb-4">
                    <i data-lucide="book-open-check" class="w-14 h-14 text-purple-400 group-hover:text-purple-300"></i>
                </div>

                <h3 class="text-3xl font-bold text-purple-300 mb-3">
                    Instructor
                </h3>
                <p class="text-gray-300 text-sm">
                    Instructor dashboard to manage courses, lessons, and student activity.
                </p>

            </a>

            <!-- Admin -->
            <a href="{{ route('dashboard.admin.home') }}"
                class="float group p-10 rounded-3xl
                bg-white/10 backdrop-blur-xl border border-red-600/30
                hover:border-red-400/70 hover:shadow-red-500/30
                hover:shadow-2xl hover:scale-[1.06]
                transition-all duration-500 cursor-pointer">

                <div class="flex justify-center mb-4">
                    <i data-lucide="shield-check" class="w-14 h-14 text-red-400 group-hover:text-red-300"></i>
                </div>

                <h3 class="text-3xl font-bold text-red-300 mb-3">
                    Admin
                </h3>
                <p class="text-gray-300 text-sm">
                    Admin dashboard to manage users, courses, payments, and platform settings.
                </p>

            </a>

        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>
