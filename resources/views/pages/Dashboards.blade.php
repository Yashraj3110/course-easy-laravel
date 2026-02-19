<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Dashboard | CourseEasy</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/image/image.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .float {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .modal {
            display: none;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black min-h-screen flex items-center justify-center">

    <!-- Main Container -->
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h1 class="text-6xl font-extrabold mb-6 tracking-tight">
            <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-transparent bg-clip-text">
                Course
            </span>
            <span class="text-gray-200">Easy</span>
        </h1>

        <p class="text-gray-300 text-lg mb-12 tracking-wide">Select your role to access your dashboard</p>

        <!-- Three Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Student -->
            <button onclick="openModal('studentModal')"
                class="float group p-10 rounded-3xl bg-white/10 backdrop-blur-xl border border-blue-600/30
                hover:border-blue-400/70 hover:shadow-blue-500/30 hover:shadow-2xl hover:scale-[1.06]
                transition-all duration-500 cursor-pointer w-full">

                <div class="flex justify-center mb-4">
                    <i data-lucide="graduation-cap" class="w-14 h-14 text-blue-400 group-hover:text-blue-300"></i>
                </div>

                <h3 class="text-3xl font-bold text-blue-300 mb-3">Student</h3>
                <p class="text-gray-300 text-sm">Login to access your learning dashboard.</p>
            </button>

            <!-- Instructor -->
            <button onclick="openModal('instructorModal')"
                class="float group p-10 rounded-3xl bg-white/10 backdrop-blur-xl border border-purple-600/30
                hover:border-purple-400/70 hover:shadow-purple-500/30 hover:shadow-2xl hover:scale-[1.06]
                transition-all duration-500 cursor-pointer w-full">

                <div class="flex justify-center mb-4">
                    <i data-lucide="book-open-check" class="w-14 h-14 text-purple-400 group-hover:text-purple-300"></i>
                </div>

                <h3 class="text-3xl font-bold text-purple-300 mb-3">Instructor</h3>
                <p class="text-gray-300 text-sm">Login or register as instructor.</p>
            </button>

            <!-- Admin -->
            <button onclick="openModal('adminModal')"
                class="float group p-10 rounded-3xl bg-white/10 backdrop-blur-xl border border-red-600/30
                hover:border-red-400/70 hover:shadow-red-500/30 hover:shadow-2xl hover:scale-[1.06]
                transition-all duration-500 cursor-pointer w-full">

                <div class="flex justify-center mb-4">
                    <i data-lucide="shield-check" class="w-14 h-14 text-red-400 group-hover:text-red-300"></i>
                </div>

                <h3 class="text-3xl font-bold text-red-300 mb-3">Admin</h3>
                <p class="text-gray-300 text-sm">Admin login access.</p>
            </button>

        </div>
    </div>


    <!-- STUDENT LOGIN MODAL -->
    <div id="studentModal"
        class="modal hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center">

        <div class="bg-gray-800 p-8 rounded-2xl w-full max-w-md border border-blue-500/40">
            <h2 class="text-3xl text-blue-300 font-bold mb-6 text-center">Student Login</h2>

            <form method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <input type="password" name="password" placeholder="Password"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">
                    Login
                </button>
            </form>

            <button onclick="closeModal('studentModal')" class="text-gray-400 hover:text-white block mx-auto mt-4">
                Close
            </button>
        </div>
    </div>


    <!-- INSTRUCTOR LOGIN MODAL -->
    <div id="instructorModal"
        class="modal hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center">

        <div class="bg-gray-800 p-8 rounded-2xl w-full max-w-md border border-purple-500/40">
            <h2 class="text-3xl text-purple-300 font-bold mb-6 text-center">Instructor Login</h2>

            <form  method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <input type="password" name="password" placeholder="Password"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg">Login</button>
            </form>

            <p class="text-purple-300 text-center mt-4">
                No account?
                <button onclick="switchModal('instructorModal','registerInstructorModal')" class="underline">
                    Register here
                </button>
            </p>

            <button onclick="closeModal('instructorModal')" class="text-gray-400 hover:text-white block mx-auto mt-4">
                Close
            </button>
        </div>
    </div>


    <!-- INSTRUCTOR REGISTER MODAL -->
    <div id="registerInstructorModal"
        class="modal hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center">

        <div class="bg-gray-800 p-8 rounded-2xl w-full max-w-md border border-purple-500/40">
            <h2 class="text-3xl text-purple-300 font-bold mb-6 text-center">Instructor Registration</h2>

            <form  method="POST">
                @csrf

                <input type="text" name="name" placeholder="Full Name"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <input type="email" name="email" placeholder="Email"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <input type="password" name="password" placeholder="Password"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg">Register</button>
            </form>

            <button onclick="closeModal('registerInstructorModal')"
                class="text-gray-400 hover:text-white block mx-auto mt-4">Close</button>
        </div>
    </div>


    <!-- ADMIN LOGIN MODAL -->
    <div id="adminModal"
        class="modal hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center">

        <div class="bg-gray-800 p-8 rounded-2xl w-full max-w-md border border-red-500/40">

            <h2 class="text-3xl text-red-300 font-bold mb-6 text-center">Admin Login</h2>

            <form  method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <input type="password" name="password" placeholder="Password"
                    class="w-full p-3 bg-gray-700 text-white rounded mb-4">

                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg">Login</button>
            </form>

            <button onclick="closeModal('adminModal')" class="text-gray-400 hover:text-white block mx-auto mt-4">
                Close
            </button>
        </div>
    </div>


    <!-- Scripts -->
    <script>
        lucide.createIcons();

        function openModal(id) {
            document.getElementById(id).style.display = "flex";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }

        function switchModal(closeId, openId) {
            closeModal(closeId);
            openModal(openId);
        }
    </script>

</body>

</html>
