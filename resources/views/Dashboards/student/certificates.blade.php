@extends('Dashboards.student.dashboard')

@section('Sdash')
    <!-- 2. My Certificates Section (New Content) -->
    <section class="w-full p-6 sm:p-8 bg-secondary-dark rounded-2xl shadow-xl border border-gray-700">
        <h2 class="text-3xl font-bold mb-8 text-white flex items-center gap-3">
            <i data-lucide="award" class="w-7 h-7 text-accent-gold"></i> My Certificates
        </h2>

        <!-- Certificates Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($certs as $cert)
                <div class="bg-tertiary-dark rounded-xl border border-gray-700 p-6 text-center shadow-lg hover:shadow-xl transition duration-300 hover:scale-[1.02]">
                    <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center rounded-full bg-accent-gold/20">
                        <i data-lucide="award" class="w-10 h-10 text-accent-gold"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-1">{{ $cert->course->title }}</h3>
                    <p class="text-gray-400 text-sm mb-1">Number: {{ $cert->certificate_number }}</p>
                    <p class="text-gray-400 text-sm mb-3">Issued on: {{ $cert->issued_at->format('M d, Y') }}</p>
                    <a href="{{ route('student.certificate.download', $cert) }}" 
                       target="_blank"
                       class="inline-flex items-center justify-center gap-2 mt-2 bg-accent-blue text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-600 transition shadow-md">
                        <i data-lucide="eye" class="w-4 h-4"></i> View / Print
                    </a>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-tertiary-dark rounded-xl border border-dashed border-gray-700">
                     <p class="text-gray-500">You haven't earned any certificates yet. Complete a course to earn one!</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
