@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto">
        <div class="space-y-6">

            {{-- Page Header --}}
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-accent-gold">My Courses</h1>

                <a href="{{ route('courses.create') }}"
                    class="px-5 py-3 bg-accent-gold text-primary-dark font-bold rounded-xl hover:bg-yellow-500">
                    New Course
                </a>

            </div>

            {{-- Courses Grid --}}
            {{-- Courses Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($courses as $course)
                    <div
                        class="bg-secondary-dark/40 rounded-2xl overflow-hidden border border-gray-700/50 shadow-xl
                   hover:shadow-2xl hover:scale-[1.01] transition-transform duration-200">

                        {{-- Thumbnail --}}
                        <div class="h-40 bg-gray-800">
                            <img src="{{ $course->thumbnail ? asset($course->thumbnail) : 'https://source.unsplash.com/random/800x600?education' }}"
                                class="w-full h-full object-cover opacity-90 hover:opacity-100 transition" />
                        </div>


                        <div class="p-5 space-y-3">
                            {{-- Title --}}
                            <h3 class="text-xl font-semibold text-accent-gold">
                                {{ $course->title }}
                            </h3>

                            {{-- Description --}}
                            <p class="text-gray-400 text-sm line-clamp-2">
                                {{ $course->description }}
                            </p>

                            {{-- Meta --}}
                            <div class="flex items-center justify-between text-sm text-gray-400">
                                <span>₹{{ number_format($course->price) }}</span>
                                <span class="capitalize">{{ $course->difficulty }}</span>
                            </div>

                            {{-- Status --}}
                            <div class="text-xs text-gray-500">
                                Status:
                                <span class="capitalize font-medium">
                                    {{ $course->status }}
                                </span>
                            </div>

                            {{-- Actions --}}
                            <div class="pt-4 flex justify-between">
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="px-3 py-2 text-sm bg-accent-blue/20 border border-accent-blue/50
          rounded-lg text-accent-blue hover:bg-accent-blue/30 transition">
                                    Edit
                                </a>



                                <a href=""
                                    class="px-3 py-2 text-sm bg-gray-700/40 border border-gray-600
                               rounded-lg hover:bg-gray-700/60 transition">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-400 py-16">
                        No courses created yet.
                    </div>
                @endforelse

            </div>

        </div>



    </main>
@endsection

@push('scriptsdash')
    <script>
        let formMode = 'edit'; // default

        
        // ---------- SUBMIT ----------
        document.getElementById('editCourseForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let courseId = document.getElementById('course_id').value;
            let formData = new FormData(this);

            let url = formMode === 'create' ?
                `/instructor/courses` :
                `/instructor/courses/${courseId}`;

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(res => {
                    if (res.status) {
                        location.reload();
                    }
                });
        });
    </script>
@endpush
