<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion - {{ $certificate->course->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Inter:wght@400;700&family=Great+Vibes&display=swap');
        
        body { font-family: 'Inter', sans-serif; }
        .serif { font-family: 'Cinzel', serif; }
        .signature { font-family: 'Great+Vibes', cursive; }
        
        @media print {
            .no-print { display: none; }
            body { margin: 0; padding: 0; }
            .cert-container { 
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">

    <!-- Control Buttons -->
    <div class="no-print mb-8 flex gap-4">
        <button onclick="window.print()" class="bg-indigo-600 text-white px-8 py-3 rounded-2xl font-black shadow-xl shadow-indigo-600/30 hover:bg-indigo-700 transition flex items-center gap-3">
            <i data-lucide="printer"></i>
            PRINT / DOWNLOAD PDF
        </button>
        <a href="{{ route('dashboard.student.certificates') }}" class="bg-white text-gray-700 px-8 py-3 rounded-2xl font-black shadow-lg hover:bg-gray-50 transition border flex items-center gap-3">
            <i data-lucide="arrow-left"></i>
            BACK TO DASHBOARD
        </a>
    </div>

    <!-- Certificate Container -->
    <div class="cert-container relative w-full max-w-5xl aspect-[1.414/1] bg-white shadow-2xl rounded-sm border-[20px] border-double border-indigo-900 overflow-hidden">
        
        <!-- Ornate Background Pattern -->
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <div class="absolute inset-0" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        </div>

        <!-- Corner Accents -->
        <div class="absolute top-0 left-0 w-32 h-32 border-t-8 border-l-8 border-indigo-900/20 m-4 rounded-tl-3xl"></div>
        <div class="absolute top-0 right-0 w-32 h-32 border-t-8 border-r-8 border-indigo-900/20 m-4 rounded-tr-3xl"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 border-b-8 border-l-8 border-indigo-900/20 m-4 rounded-bl-3xl"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 border-b-8 border-r-8 border-indigo-900/20 m-4 rounded-br-3xl"></div>

        <div class="relative z-10 h-full flex flex-col items-center text-center px-16 py-12">
            
            <!-- Logo area -->
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white">
                        <i data-lucide="graduation-cap" class="w-8 h-8"></i>
                    </div>
                </div>
                <h2 class="serif text-2xl font-black text-indigo-900 tracking-widest">COURSEEASY</h2>
            </div>

            <h1 class="serif text-5xl font-bold text-gray-900 mb-4 tracking-tighter">CERTIFICATE OF COMPLETION</h1>
            <p class="text-gray-500 uppercase tracking-[0.4em] mb-12 text-sm font-bold">This is to certify that</p>

            <div class="relative mb-8">
                <h2 class="signature text-7xl text-indigo-600 mb-2">{{ $certificate->user->name }}</h2>
                <div class="w-80 h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent mx-auto"></div>
            </div>

            <p class="text-gray-600 text-lg max-w-2xl leading-relaxed mb-12">
                Has successfully completed the comprehensive training program for
                <span class="block text-2xl font-black text-gray-900 mt-2 serif uppercase tracking-tight">
                    {{ $certificate->course->title }}
                </span>
                including all requisite modules, practical assignments, and assessments.
            </p>

            <div class="w-full flex justify-between items-end mt-auto pb-8">
                <!-- Instructor Signature -->
                <div class="text-center">
                    <div class="signature text-4xl text-gray-700 border-b border-gray-300 px-6 pb-1 mb-2">
                        {{ $certificate->course->tutor->name }}
                    </div>
                    <p class="text-[10px] font-black uppercase text-gray-400">Course Instructor</p>
                </div>

                <!-- Seal -->
                <div class="relative">
                    <div class="w-24 h-24 bg-yellow-500 rounded-full flex items-center justify-center shadow-lg border-4 border-yellow-300">
                        <div class="border-2 border-dashed border-white/50 w-20 h-20 rounded-full flex items-center justify-center">
                             <i data-lucide="award" class="w-12 h-12 text-white"></i>
                        </div>
                    </div>
                    <!-- Seal Text -->
                    <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 whitespace-nowrap text-[8px] font-black bg-indigo-900 text-white px-2 py-0.5 rounded">
                        OFFICIAL SEAL
                    </div>
                </div>

                <!-- Date & ID -->
                <div class="text-right">
                    <div class="text-sm font-bold text-gray-700 border-b border-gray-300 px-6 pb-1 mb-2">
                        {{ $certificate->issued_at->format('F d, Y') }}
                    </div>
                    <p class="text-[10px] font-black uppercase text-gray-400">Date Issued</p>
                    <p class="text-[8px] mt-2 font-mono text-gray-400">Verification ID: {{ $certificate->certificate_number }}</p>
                </div>
            </div>

            <!-- Verification Link Footer -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-[9px] text-gray-400 font-medium">
                Verify this certificate at: courseeasy.com/verify/{{ $certificate->certificate_number }}
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
