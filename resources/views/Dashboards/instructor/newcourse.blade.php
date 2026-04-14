@extends('Dashboards.instructor.dashboard')

@section('Idash')
    <main class="flex-1 p-10 overflow-y-auto space-y-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-white">
                    {{ $mode === 'create' ? 'Create Course' : 'Edit Course' }}
                </h1>
                <p class="text-gray-400 text-sm mt-1">
                    Build your course step by step
                </p>
            </div>

            <a href="{{ url()->previous() }}" class="px-4 py-2 rounded-xl bg-gray-800 text-gray-300 hover:bg-gray-700">
                ← Back
            </a>
        </div>

        <!-- STEPPER -->
        <div class="bg-gray-900/70 border border-gray-700 rounded-2xl p-6">
            <div class="flex items-center justify-between text-sm">

                <div class="flex items-center gap-3 step text-white" data-step-indicator="1">
                    <div class="w-8 h-8 rounded-full bg-instructor-purple flex items-center justify-center">1</div>
                    Course
                </div>

                <div class="flex-1 h-px bg-gray-700 mx-2"></div>

                <div class="flex items-center gap-3 step text-gray-400" data-step-indicator="2">
                    <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center">2</div>
                    Modules
                </div>

                <div class="flex-1 h-px bg-gray-700 mx-2"></div>

                <div class="flex items-center gap-3 step text-gray-400" data-step-indicator="3">
                    <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center">3</div>
                    Requirements
                </div>

                <div class="flex-1 h-px bg-gray-700 mx-2"></div>

                <div class="flex items-center gap-3 step text-gray-400" data-step-indicator="4">
                    <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center">4</div>
                    Review
                </div>

            </div>

        </div>

        <!-- FORM -->
        <form id="courseWizardForm" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <input type="hidden" id="course_id" value="{{ $course->id ?? '' }}">
            <input type="hidden" id="form_mode" value="{{ $mode }}">

            <!-- STEP 1 : COURSE -->
            <div class="wizard-step" data-step="1">
                <div class="max-w-3xl mx-auto bg-gray-900/70 border border-gray-700 rounded-2xl p-6 space-y-5">

                    <h3 class="text-lg font-semibold text-white border-b border-gray-700 pb-3">
                        📘 Course Details
                    </h3>

                    <input name="title" value="{{ $course->title ?? '' }}" placeholder="Course Title"
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700">

                    <textarea name="description" rows="3"
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700">{{ $course->description ?? '' }}</textarea>

                    <div class="grid grid-cols-2 gap-4">
                        <input type="number" name="price" value="{{ $course->price ?? '' }}" placeholder="Price"
                            class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700">

                        <select name="difficulty"
                            class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700">
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <select name="category"
                            class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700
               focus:ring-2 focus:ring-instructor-purple outline-none">

                            <option value="">Select Category</option>

                            <optgroup label="Development">
                                <option value="web-development">Web Development</option>
                                <option value="mobile-development">Mobile App Development</option>
                                <option value="software-engineering">Software Engineering</option>
                                <option value="game-development">Game Development</option>
                            </optgroup>

                            <optgroup label="Data & AI">
                                <option value="data-science">Data Science</option>
                                <option value="machine-learning">Machine Learning</option>
                                <option value="artificial-intelligence">Artificial Intelligence</option>
                                <option value="data-analysis">Data Analysis</option>
                            </optgroup>

                            <optgroup label="IT & Cloud">
                                <option value="cloud-computing">Cloud Computing</option>
                                <option value="devops">DevOps</option>
                                <option value="cyber-security">Cyber Security</option>
                                <option value="networking">Networking</option>
                            </optgroup>

                            <optgroup label="Design">
                                <option value="ui-ux-design">UI / UX Design</option>
                                <option value="graphic-design">Graphic Design</option>
                                <option value="web-design">Web Design</option>
                            </optgroup>

                            <optgroup label="Business">
                                <option value="digital-marketing">Digital Marketing</option>
                                <option value="entrepreneurship">Entrepreneurship</option>
                                <option value="project-management">Project Management</option>
                                <option value="product-management">Product Management</option>
                            </optgroup>

                            <optgroup label="Academics">
                                <option value="computer-science">Computer Science</option>
                                <option value="engineering">Engineering</option>
                                <option value="mathematics">Mathematics</option>
                                <option value="physics">Physics</option>
                            </optgroup>

                        </select>

                        <select name="status"
                            class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700
               focus:ring-2 focus:ring-instructor-purple outline-none">
                            <option value="draft" {{ (isset($course) && $course->status === 'draft') ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ (isset($course) && $course->status === 'published') ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>


                    <input type="file" name="thumbnail"
                        class="block w-full text-sm text-gray-400
                              file:mr-4 file:py-2.5 file:px-4
                              file:rounded-xl file:border-0
                              file:bg-instructor-purple/20 file:text-instructor-purple">
                </div>
            </div>

            <!-- STEP 2 : MODULES + LECTURES -->
            <div class="wizard-step hidden" data-step="2">
                <div class="max-w-3xl mx-auto bg-gray-900/70 border border-gray-700 rounded-2xl p-6 space-y-5">

                    <div class="flex justify-between items-center border-b border-gray-700 pb-3">
                        <h3 class="text-lg font-semibold text-white">
                            📦 Modules & Lectures
                        </h3>

                        <button type="button" onclick="addModule()"
                            class="px-4 py-2 bg-instructor-purple/20 text-instructor-purple rounded-xl hover:bg-instructor-purple/30">
                            + Add Module
                        </button>
                    </div>

                    <div id="modulesContainer" class="space-y-5">
                        @if($mode === 'edit' && $course->modules)
                            @foreach($course->modules as $mIndex => $module)
                                <div class="module-item bg-gray-800/60 border border-gray-700 rounded-xl p-5 space-y-4" data-module-index="{{ $mIndex }}">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-white font-semibold">📦 Module</h4>
                                        <button type="button" onclick="this.closest('.module-item').remove()" class="text-red-400 text-sm">Remove</button>
                                    </div>
                                    <input name="modules[{{ $mIndex }}][title]" value="{{ $module->title }}" placeholder="Module title" class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700">
                                    <textarea name="modules[{{ $mIndex }}][description]" placeholder="Module description" class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700">{{ $module->description }}</textarea>
                                    <div class="pl-4 border-l border-gray-600 space-y-3 lectures-container">
                                        @foreach($module->lectures as $lIndex => $lecture)
                                            <div class="lecture-item bg-gray-900/70 border border-gray-700 rounded-lg p-4 space-y-2">
                                                <div class="flex justify-between">
                                                    <h5 class="text-white text-sm font-semibold">🎬 Lecture</h5>
                                                    <button type="button" onclick="this.closest('.lecture-item').remove()" class="text-red-400 text-xs">Remove</button>
                                                </div>
                                                <input name="modules[{{ $mIndex }}][lectures][{{ $lIndex }}][title]" value="{{ $lecture->title }}" placeholder="Lecture title" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700">
                                                <input name="modules[{{ $mIndex }}][lectures][{{ $lIndex }}][video_url]" value="{{ $lecture->video_url }}" placeholder="YouTube URL" class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700">
                                                <label class="flex items-center gap-2 text-gray-400 text-xs">
                                                    <input type="checkbox" name="modules[{{ $mIndex }}][lectures][{{ $lIndex }}][is_preview]" {{ $lecture->is_preview ? 'checked' : '' }}> Preview
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" onclick="addLecture(this)" class="px-3 py-2 text-sm bg-instructor-purple/20 text-instructor-purple rounded-lg">+ Add Lecture</button>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <p class="text-xs text-gray-400">
                        Add lectures inside each module.
                    </p>
                </div>
            </div>

            <!-- STEP 3 : REVIEW -->
            <div class="wizard-step hidden" data-step="3">
                <div class="max-w-3xl mx-auto bg-gray-900/70 border border-gray-700 rounded-2xl p-6 space-y-3">

                    <h3 class="text-lg font-semibold text-white border-b border-gray-700 pb-3">
                        ✅ Review & Save
                    </h3>

                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>✔ Course information completed</li>
                        <li>✔ Modules added</li>
                        <li>✔ Lectures added</li>
                    </ul>

                    <p class="text-xs text-gray-400 mt-3">
                        You can edit everything later.
                    </p>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="flex justify-between items-center border-t border-gray-700 pt-6">

                <button type="button" onclick="prevStep()"
                    class="px-6 py-2 bg-gray-800 text-gray-300 rounded-xl hover:bg-gray-700">
                    Back
                </button>

                <div class="flex gap-3">
                    <button type="button" onclick="nextStep()" id="nextBtn"
                        class="px-6 py-2 bg-instructor-purple text-white rounded-xl hover:bg-instructor-purple/90">
                        Next
                    </button>

                    <button type="submit" id="submitBtn"
                        class="hidden px-6 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700">
                        Save Course
                    </button>
                </div>

            </div>

        </form>

    </main>
@endsection

@push('scriptsdash')
    <script>
        let currentStep = 1;
        const totalSteps = 3;

        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        function showStep() {
            document.querySelectorAll('.wizard-step').forEach(s => s.classList.add('hidden'));
            document.querySelector(`.wizard-step[data-step="${currentStep}"]`)?.classList.remove('hidden');

            document.querySelectorAll('.step').forEach((el, i) => {
                const circle = el.querySelector('div');
                el.classList.toggle('text-white', i + 1 <= currentStep);
                el.classList.toggle('text-gray-400', i + 1 > currentStep);
                circle.classList.toggle('bg-instructor-purple', i + 1 <= currentStep);
                circle.classList.toggle('bg-gray-700', i + 1 > currentStep);
            });

            nextBtn.classList.toggle('hidden', currentStep === totalSteps);
            submitBtn.classList.toggle('hidden', currentStep !== totalSteps);
        }

        function nextStep() {
            if (currentStep < totalSteps) currentStep++, showStep();
        }

        function prevStep() {
            if (currentStep > 1) currentStep--, showStep();
        }

        /* MODULES + LECTURES */
        let moduleCounter = {{ $course ? $course->modules->count() : 0 }};

        function addModule() {
            const mIdx = moduleCounter++;
            document.getElementById('modulesContainer').insertAdjacentHTML('beforeend', `
                <div class="module-item bg-gray-800/60 border border-gray-700 rounded-xl p-5 space-y-4" data-module-index="${mIdx}">
                    <div class="flex justify-between items-center">
                        <h4 class="text-white font-semibold">📦 Module</h4>
                        <button type="button" onclick="this.closest('.module-item').remove()"
                            class="text-red-400 text-sm">Remove</button>
                    </div>

                    <input name="modules[${mIdx}][title]" placeholder="Module title"
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700">

                    <textarea name="modules[${mIdx}][description]" placeholder="Module description"
                        class="w-full px-4 py-2.5 rounded-xl bg-gray-800 text-white border border-gray-700"></textarea>

                    <div class="pl-4 border-l border-gray-600 space-y-3 lectures-container"></div>

                    <button type="button" onclick="addLecture(this)"
                        class="px-3 py-2 text-sm bg-instructor-purple/20 text-instructor-purple rounded-lg">
                        + Add Lecture
                    </button>
                </div>
            `);
        }

        function addLecture(btn) {
            const moduleItem = btn.closest('.module-item');
            const mIdx = moduleItem.getAttribute('data-module-index');
            const container = moduleItem.querySelector('.lectures-container');
            const lIdx = container.children.length;

            container.insertAdjacentHTML('beforeend', `
                <div class="lecture-item bg-gray-900/70 border border-gray-700 rounded-lg p-4 space-y-2">
                    <div class="flex justify-between">
                        <h5 class="text-white text-sm font-semibold">🎬 Lecture</h5>
                        <button type="button" onclick="this.closest('.lecture-item').remove()"
                            class="text-red-400 text-xs">Remove</button>
                    </div>

                    <input name="modules[${mIdx}][lectures][${lIdx}][title]" placeholder="Lecture title"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700">

                    <input name="modules[${mIdx}][lectures][${lIdx}][video_url]" placeholder="YouTube URL"
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white border border-gray-700">

                    <label class="flex items-center gap-2 text-gray-400 text-xs">
                        <input type="checkbox" name="modules[${mIdx}][lectures][${lIdx}][is_preview]"> Preview
                    </label>
                </div>
            `);
        }

        /* FORM SUBMISSION */
        document.getElementById('courseWizardForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const mode = document.getElementById('form_mode').value;
            const courseId = document.getElementById('course_id').value;
            const formData = new FormData(this);

            const url = mode === 'create' ? '/instructor/courses' : `/instructor/courses/${courseId}`;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(res => {
                if(res.status) {
                    window.location.href = "{{ route('dashboard.instructor.courses') }}";
                } else {
                    alert(res.message || 'Error occurred');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Connection error');
            });
        });

        document.addEventListener('DOMContentLoaded', showStep);
    </script>
@endpush
