@extends('Dashboards.instructor.dashboard')

@section('Idash')
<main class="flex-1 p-10 overflow-y-auto">
    <div class="space-y-6">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-accent-gold">My Quizzes</h1>
                <p class="text-sm text-gray-400 mt-1">
                    Create and manage quizzes linked to lectures
                </p>
            </div>

            <button onclick="openCreateQuizModal()"
                class="px-5 py-3 bg-accent-gold text-primary-dark font-bold rounded-xl hover:bg-yellow-500">
                New Quiz
            </button>
        </div>

        <!-- Quiz Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($quizzes as $quiz)
                <div class="bg-secondary-dark/40 rounded-2xl border border-gray-700/50 shadow-xl
                            hover:shadow-2xl hover:scale-[1.01] transition">

                    <div class="p-5 space-y-3">

                        <h3 class="text-xl font-semibold text-accent-gold truncate">
                            {{ $quiz->title }}
                        </h3>

                        <p class="text-sm text-gray-400">
                            Course:
                            <span class="text-gray-300">{{ $quiz->course->title ?? '-' }}</span><br>
                            Lecture:
                            <span class="text-gray-300">{{ $quiz->lecture->title ?? '-' }}</span>
                        </p>

                        <div class="flex items-center justify-between text-sm">
                            <span class="px-2 py-0.5 rounded-full text-xs
                                {{ $quiz->is_active ? 'bg-green-500/20 text-green-400' : 'bg-gray-500/20 text-gray-400' }}">
                                {{ $quiz->is_active ? 'Active' : 'Inactive' }}
                            </span>

                            <span class="text-xs text-gray-400">
                                {{ $quiz->questions_count ?? $quiz->questions()->count() }} Questions
                            </span>
                        </div>

                        <div class="pt-4 flex justify-between">
                            <button onclick="openEditQuizModal({{ $quiz->id }})"
                                class="px-3 py-2 text-sm bg-accent-blue/20 border border-accent-blue/50
                                       rounded-lg text-accent-blue hover:bg-accent-blue/30">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-400 py-16">
                    No quizzes created yet.
                </div>
            @endforelse

        </div>
    </div>
</main>

<!-- ================= QUIZ MODAL ================= -->
<div id="quizModal"
     class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/70 backdrop-blur-sm">

    <div class="w-full max-w-3xl bg-gray-900 rounded-2xl border border-gray-700 shadow-xl
                overflow-y-auto max-h-[90vh]">

        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-700">
            <h2 id="quizModalTitle" class="text-lg font-semibold text-white">Create Quiz</h2>
            <button onclick="closeQuizModal()" class="text-gray-400 hover:text-red-400 text-xl">✕</button>
        </div>

        <!-- Form -->
        <form id="quizForm" class="p-6 space-y-6">
            @csrf
            <input type="hidden" name="quiz_id" id="quiz_id">

            <!-- Quiz Info -->
            <div class="space-y-3">
                <input name="title" id="quiz_title"
                       placeholder="Quiz Title"
                       class="w-full px-4 py-2 rounded-xl bg-gray-800 text-white border border-gray-700">

                <textarea name="description" id="quiz_description" rows="2"
                          placeholder="Quiz Description"
                          class="w-full px-4 py-2 rounded-xl bg-gray-800 text-white border border-gray-700"></textarea>

                <select name="lecture_id" id="lecture_id"
                        class="w-full px-4 py-2 rounded-xl bg-gray-800 text-white border border-gray-700">
                    <option value="">Select Lecture</option>
                    @foreach ($courses as $course)
                        @foreach ($course->modules as $module)
                            <optgroup label="{{ $course->title }} → {{ $module->title }}">
                                @foreach ($module->lectures as $lecture)
                                    <option value="{{ $lecture->id }}">{{ $lecture->title }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    @endforeach
                </select>

                <label class="flex items-center gap-2 text-sm text-gray-400">
                    <input type="checkbox" name="is_active" id="quiz_active" value="1">
                    Active
                </label>
            </div>

            <!-- Questions -->
            <div class="border-t border-gray-700 pt-4 space-y-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-white font-semibold">Questions</h3>
                    <button type="button" onclick="addQuestion()"
                        class="px-4 py-2 bg-indigo-600/20 text-indigo-400 rounded-xl">
                        + Add Question
                    </button>
                </div>

                <div id="questionsContainer" class="space-y-4"></div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-6 border-t border-gray-700">
                <button type="button" onclick="closeQuizModal()"
                        class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl">
                    Cancel
                </button>

                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-xl">
                    Save Quiz
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scriptsdash')
<script>
let quizMode = 'create';

/* ---------- MODAL HANDLING ---------- */
function openCreateQuizModal() {
    quizMode = 'create';
    quizForm.reset();
    quiz_id.value = '';
    questionsContainer.innerHTML = '';
    quizModalTitle.innerText = 'Create Quiz';
    quizModal.classList.remove('hidden');
}

function openEditQuizModal(id) {
    quizMode = 'edit';
    questionsContainer.innerHTML = '';

    fetch(`/instructor/quizzes/${id}/fetch`)
        .then(res => res.json())
        .then(q => {
            quiz_id.value = q.id;
            quiz_title.value = q.title;
            quiz_description.value = q.description ?? '';
            lecture_id.value = q.lecture_id;
            quiz_active.checked = q.is_active;

            q.questions.forEach(question => addQuestion(question));

            quizModalTitle.innerText = 'Edit Quiz';
            quizModal.classList.remove('hidden');
        });
}

function closeQuizModal() {
    quizModal.classList.add('hidden');
}

/* ---------- QUESTIONS ---------- */
function addQuestion(q = {}) {
    const uid = Date.now();

    questionsContainer.insertAdjacentHTML('beforeend', `
        <div class="bg-gray-800 border border-gray-700 rounded-xl p-5 space-y-3">
            <input name="questions[${uid}][question]"
                   value="${q.question ?? ''}"
                   placeholder="Question"
                   class="w-full px-4 py-2 rounded-xl bg-gray-900 text-white">

            ${[1,2,3,4].map(i => `
                <div class="flex items-center gap-3">
                    <input type="radio"
                           name="questions[${uid}][correct_option]"
                           value="${i}"
                           ${q.correct_option == i ? 'checked' : ''}>
                    <input name="questions[${uid}][options][${i}]"
                           value="${q.options?.[i] ?? ''}"
                           placeholder="Option ${i}"
                           class="flex-1 px-4 py-2 rounded-xl bg-gray-900 text-white">
                </div>
            `).join('')}

            <button type="button"
                    onclick="this.closest('div').remove()"
                    class="text-red-400 text-sm">
                Remove Question
            </button>
        </div>
    `);
}

/* ---------- SUBMIT ---------- */
quizForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const url = quizMode === 'create'
        ? '{{ route('instructor.quizzes.store') }}'
        : `/instructor/quizzes/${quiz_id.value}/update`;

    fetch(url, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: new FormData(this)
    })
    .then(res => res.json())
    .then(res => {
        if (res.status) location.reload();
        else alert(res.message ?? 'Failed to save quiz');
    });
});
</script>
@endpush
