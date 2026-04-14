@extends('Dashboards.instructor.dashboard')

@section('Idash')
<main class="flex-1 p-10 overflow-y-auto bg-primary-dark">
    <div class="space-y-6">

        <!-- Header -->
        <header class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-4xl font-light text-white">Quiz <span class="font-bold text-instructor-purple italic">Assignments</span></h2>
                <p class="text-gray-400 mt-2">Create and manage self-assessment quizzes for your students.</p>
            </div>
            <div class="flex items-center space-x-4">
                <button onclick="openCreateQuizModal()" class="py-4 px-8 bg-instructor-purple text-white font-black rounded-2xl hover:bg-opacity-90 shadow-xl shadow-instructor-purple/20 transition transform active:scale-95 flex items-center gap-2 uppercase tracking-widest text-xs">
                    <i data-lucide="plus-circle" class="w-5 h-5"></i>
                    New Quiz
                </button>
            </div>
        </header>

        <!-- Quiz Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($quizzes as $quiz)
                <div class="bg-secondary-dark rounded-[2.5rem] border border-gray-700/50 shadow-2xl overflow-hidden group hover:border-instructor-purple/30 transition-all duration-500">
                    <div class="p-8 space-y-5">
                        <div class="flex justify-between items-start">
                             <div class="p-4 bg-instructor-purple/10 rounded-2xl border border-instructor-purple/20">
                                <i data-lucide="help-circle" class="text-instructor-purple w-6 h-6"></i>
                            </div>
                            <span class="px-3 py-1 bg-primary-dark/50 rounded-full text-[10px] font-black uppercase tracking-widest {{ $quiz->is_active ? 'text-green-500' : 'text-gray-500' }} border border-white/5">
                                {{ $quiz->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-white group-hover:text-instructor-purple transition-colors line-clamp-1">
                            {{ $quiz->title }}
                        </h3>

                        <div class="space-y-2">
                             <p class="text-[10px] font-black text-gray-600 uppercase tracking-widest">Linked Content</p>
                             <div class="flex items-center gap-2">
                                <span class="bg-gray-800 text-gray-300 text-[10px] font-bold px-2 py-0.5 rounded border border-gray-700 truncate max-w-[150px]">{{ $quiz->course->title ?? '-' }}</span>
                                <i data-lucide="chevron-right" class="w-3 h-3 text-gray-700"></i>
                                <span class="bg-gray-800 text-gray-300 text-[10px] font-bold px-2 py-0.5 rounded border border-gray-700 truncate max-w-[150px]">{{ $quiz->lecture->title ?? '-' }}</span>
                             </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-800">
                             <span class="text-xs font-bold text-gray-500 flex items-center gap-1">
                                <i data-lucide="layers" class="w-3 h-3"></i>
                                {{ $quiz->questions_count ?? $quiz->questions()->count() }} Questions
                             </span>
                             <button onclick="openEditQuizModal({{ $quiz->id }})" class="p-3 bg-instructor-purple/10 text-instructor-purple rounded-xl hover:bg-instructor-purple hover:text-white transition">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                             </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center opacity-30">
                    <i data-lucide="help-circle" class="w-20 h-20 mx-auto mb-6"></i>
                    <h2 class="text-2xl font-black uppercase tracking-[0.3em] mb-2 text-white">No Quizzes Created</h2>
                    <p class="text-gray-400">Assess student learning with interactive quizzes.</p>
                </div>
            @endforelse
        </div>
    </div>
</main>

<!-- ================= QUIZ MODAL ================= -->
<div id="quizModal" class="fixed inset-0 z-[60] hidden flex items-center justify-center bg-primary-dark/90 backdrop-blur-xl p-6">
    <div class="w-full max-w-4xl bg-secondary-dark rounded-[3rem] border border-gray-700 shadow-2xl flex flex-col max-h-[90vh]">
        <!-- Header -->
        <div class="flex justify-between items-center p-8 border-b border-gray-800">
            <div>
                <h2 id="quizModalTitle" class="text-2xl font-black text-white uppercase tracking-tight">Create Quiz</h2>
                <p class="text-xs text-gray-500 mt-1">Configure your questions and correct answers.</p>
            </div>
            <button onclick="closeQuizModal()" class="p-3 bg-red-500/10 text-red-500 rounded-2xl hover:bg-red-500 hover:text-white transition">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Form -->
        <form id="quizForm" class="flex-1 overflow-y-auto custom-scrollbar p-8 space-y-10">
            @csrf
            <input type="hidden" name="quiz_id" id="quiz_id">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 block">General Information</label>
                        <input name="title" id="quiz_title" placeholder="Enter Quiz Title" 
                               class="w-full px-6 py-4 bg-primary-dark border border-gray-700 rounded-2xl text-white focus:ring-2 focus:ring-instructor-purple outline-none">
                    </div>
                    <textarea name="description" id="quiz_description" rows="3" placeholder="Enter Quiz Description..." 
                              class="w-full px-6 py-4 bg-primary-dark border border-gray-700 rounded-2xl text-white focus:ring-2 focus:ring-instructor-purple outline-none"></textarea>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 block">Lecture Attachment</label>
                        <select name="lecture_id" id="lecture_id" class="w-full px-6 py-4 bg-primary-dark border border-gray-700 rounded-2xl text-white focus:ring-2 focus:ring-instructor-purple outline-none">
                            <option value="">Select Target Lecture</option>
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
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-primary-dark rounded-2xl border border-gray-700">
                        <input type="checkbox" name="is_active" id="quiz_active" value="1" class="w-5 h-5 accent-instructor-purple">
                        <span class="text-sm font-bold text-gray-300">Set as Active (Make visible to students)</span>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-black text-white uppercase tracking-tight">Questions & Logic</h3>
                    <button type="button" onclick="addQuestion()" class="flex items-center gap-2 px-5 py-2 bg-instructor-purple/10 text-instructor-purple font-black rounded-xl hover:bg-instructor-purple hover:text-white transition uppercase text-[10px]">
                        <i data-lucide="plus" class="w-4 h-4"></i> Add Question
                    </button>
                </div>

                <div id="questionsContainer" class="space-y-6"></div>
            </div>
        </form>

        <!-- Footer -->
        <div class="p-8 border-t border-gray-800 flex justify-end gap-4 bg-primary-dark/30">
            <button type="button" onclick="closeQuizModal()" class="px-8 py-4 text-xs font-black text-gray-500 uppercase tracking-widest hover:text-white transition">Cancel</button>
            <button type="submit" form="quizForm" class="px-10 py-4 bg-instructor-purple text-white font-black rounded-2xl hover:bg-opacity-90 shadow-xl shadow-instructor-purple/30 transition uppercase text-xs">Save Assessment</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let quizMode = 'create';
const modal = document.getElementById('quizModal');
const form = document.getElementById('quizForm');
const qContainer = document.getElementById('questionsContainer');

function openCreateQuizModal() {
    quizMode = 'create';
    form.reset();
    document.getElementById('quiz_id').value = '';
    qContainer.innerHTML = '';
    document.getElementById('quizModalTitle').innerText = 'Create New Quiz';
    modal.classList.remove('hidden');
    lucide.createIcons();
}

function openEditQuizModal(id) {
    quizMode = 'edit';
    qContainer.innerHTML = '';

    fetch(`/instructor/quizzes/${id}/fetch`)
        .then(res => res.json())
        .then(q => {
            document.getElementById('quiz_id').value = q.id;
            document.getElementById('quiz_title').value = q.title;
            document.getElementById('quiz_description').value = q.description ?? '';
            document.getElementById('lecture_id').value = q.lecture_id;
            document.getElementById('quiz_active').checked = q.is_active;

            q.questions.forEach(question => addQuestion(question));

            document.getElementById('quizModalTitle').innerText = 'Update Quiz';
            modal.classList.remove('hidden');
            lucide.createIcons();
        });
}

function closeQuizModal() {
    modal.classList.add('hidden');
}

function addQuestion(q = {}) {
    const uid = Date.now() + Math.random().toString(36).substring(7);

    qContainer.insertAdjacentHTML('beforeend', `
        <div class="bg-primary-dark border border-gray-800 rounded-[2rem] p-8 space-y-6 relative group overflow-hidden">
            <div class="absolute top-0 right-0 p-2 opacity-0 group-hover:opacity-100 transition">
                <button type="button" onclick="this.closest('.bg-primary-dark').remove()" class="p-3 bg-red-500/10 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition">
                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                </button>
            </div>
            
            <div>
                <label class="text-[10px] font-black text-gray-600 uppercase tracking-widest mb-2 block">Question Content</label>
                <input name="questions[${uid}][question]" value="${q.question ?? ''}" placeholder="Ask a question..." 
                       class="w-full px-6 py-4 bg-secondary-dark border border-gray-700 rounded-2xl text-white focus:ring-2 focus:ring-instructor-purple outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                ${[1,2,3,4].map(i => {
                    let optText = '';
                    if(q.options) {
                        const optObj = q.options.find(o => o.option_number == i);
                        optText = optObj ? optObj.option_text : '';
                    }
                    return `
                    <div class="flex items-center gap-4 bg-secondary-dark/50 p-4 rounded-2xl border border-gray-800 focus-within:border-instructor-purple/50 transition">
                        <div class="relative">
                            <input type="radio" name="questions[${uid}][correct_option]" value="${i}" ${q.correct_option == i ? 'checked' : ''} 
                                   class="w-5 h-5 accent-instructor-purple relative z-10 cursor-pointer">
                            <div class="absolute inset-0 bg-instructor-purple/10 rounded-full scale-150 animate-pulse opacity-0 peer-checked:opacity-100"></div>
                        </div>
                        <input name="questions[${uid}][options][${i}]" value="${optText}" placeholder="Option ${i}" 
                               class="bg-transparent border-none text-white text-sm focus:ring-0 w-full font-medium">
                    </div>
                    `
                }).join('')}
            </div>
        </div>
    `);
    lucide.createIcons();
}

form.addEventListener('submit', function (e) {
    e.preventDefault();

    const url = quizMode === 'create'
        ? '/instructor/quizzes/store'
        : `/instructor/quizzes/${document.getElementById('quiz_id').value}/update`;

    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerText;
    submitBtn.innerText = 'SAVING...';
    submitBtn.disabled = true;

    fetch(url, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: new FormData(this)
    })
    .then(res => res.json())
    .then(res => {
        if (res.status) {
            location.reload();
        } else {
            alert(res.message ?? 'Failed to save quiz');
            submitBtn.innerText = originalText;
            submitBtn.disabled = false;
        }
    })
    .catch(err => {
        console.error(err);
        alert('Server connection failed');
        submitBtn.innerText = originalText;
        submitBtn.disabled = false;
    });
});
</script>
@endpush
