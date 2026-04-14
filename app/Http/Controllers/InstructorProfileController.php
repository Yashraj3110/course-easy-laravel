<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\Module;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('Dashboards.instructor.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'dob'    => 'nullable|date',
            'bio'    => 'nullable|string',
            'photo'  => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        // BASIC FIELDS
        $user->name   = $request->name;
        $user->phone  = $request->phone;
        $user->gender = $request->gender;
        $user->dob    = $request->dob;
        $user->bio    = $request->bio;

        // PHOTO UPLOAD
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/users/'), $filename);

            $user->photo = 'uploads/users/' . $filename;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }


    public function myCourses()
    {
        $courses = Course::where('tutor_id', Auth::id())
            ->latest()
            ->get();

        return view('Dashboards.instructor.mycourses', compact('courses'));
    }
    public function show(Course $course)
    {
        abort_if($course->tutor_id !== auth()->id(), 403);
        return response()->json($course);
    }


    public function updatecourse(Request $request, Course $course)
    {
        abort_if($course->tutor_id !== auth()->id(), 403);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'difficulty'  => 'required|in:beginner,intermediate,advanced',
            'status'      => 'required|in:draft,published',
            'thumbnail'   => 'nullable|image|max:2048',
            'modules'     => 'nullable|array',
        ]);

        $data = $request->only(['title', 'description', 'price', 'difficulty', 'status']);

        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail && file_exists(public_path($course->thumbnail))) {
                unlink(public_path($course->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $data['thumbnail'] = 'uploads/courses/' . $filename;
        }

        $course->update($data);

        // Sync Modules and Lectures
        if ($request->has('modules')) {
            // Simple approach: Delete old modules/lectures and recreate
            // (In a real app, you'd want to sync by ID to preserve data like progress)
            $course->modules()->each(function($m) {
                $m->lectures()->delete();
                $m->delete();
            });

            foreach ($request->modules as $mIndex => $mData) {
                $module = $course->modules()->create([
                    'title'       => $mData['title'],
                    'description' => $mData['description'] ?? '',
                    'order'       => $mIndex,
                ]);

                if (isset($mData['lectures']) && is_array($mData['lectures'])) {
                    foreach ($mData['lectures'] as $lIndex => $lData) {
                        $module->lectures()->create([
                            'course_id'  => $course->id,
                            'title'      => $lData['title'],
                            'video_url'  => $lData['video_url'] ?? '',
                            'is_preview' => isset($lData['is_preview']),
                            'order'      => $lIndex,
                        ]);
                    }
                }
            }
        }

        return response()->json(['status' => true]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'difficulty'  => 'required|in:beginner,intermediate,advanced',
            'status'      => 'required|in:draft,published',
            'thumbnail'   => 'nullable|image|max:2048',
            'modules'     => 'nullable|array',
        ]);

        $data = $request->only(['title', 'description', 'price', 'difficulty', 'status']);
        $data['tutor_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $data['thumbnail'] = 'uploads/courses/' . $filename;
        }

        $course = Course::create($data);

        if ($request->has('modules')) {
            foreach ($request->modules as $mIndex => $mData) {
                $module = $course->modules()->create([
                    'title'       => $mData['title'],
                    'description' => $mData['description'] ?? '',
                    'order'       => $mIndex,
                ]);

                if (isset($mData['lectures']) && is_array($mData['lectures'])) {
                    foreach ($mData['lectures'] as $lIndex => $lData) {
                        $module->lectures()->create([
                            'course_id'  => $course->id,
                            'title'      => $lData['title'],
                            'video_url'  => $lData['video_url'] ?? '',
                            'is_preview' => isset($lData['is_preview']),
                            'order'      => $lIndex,
                        ]);
                    }
                }
            }
        }

        return response()->json(['status' => true]);
    }

    public function create()
    {
        return view('Dashboards.instructor.newcourse', [
            'mode' => 'create',
            'course' => null
        ]);
    }

    public function course_edit(Course $course)
    {
        // Security: only owner can edit
        if ($course->tutor_id !== auth()->id()) {
            abort(403);
        }

        // Load full structure for edit
        $course->load([
            'modules.lectures.studyMaterials',
            'modules.lectures.quizzes'
        ]);

        return view('Dashboards.instructor.newcourse', [
            'mode'   => 'edit',
            'course' => $course
        ]);
    }


    public function quiz_index()
    {
        // 1️⃣ Get all course IDs owned by this tutor
        $courseIds = Course::where('tutor_id', auth()->id())
            ->pluck('id');

        // 2️⃣ Fetch quizzes linked to those courses
        $quizzes = Quiz::whereIn('course_id', $courseIds)
            ->with([
                'course',
                'module',
                'lecture',
                'questions'
            ])
            ->latest()
            ->get();

        // 3️⃣ Courses for dropdowns (create/edit modal)
        $courses = Course::where('tutor_id', auth()->id())
            ->with('modules.lectures')
            ->get();

        return view('Dashboards.instructor.assignments', compact('quizzes', 'courses'));
    }

    /* -----------------------------
       FETCH SINGLE QUIZ (AJAX)
    ----------------------------- */
    public function quiz_fetch(Quiz $quiz)
    {
        if ($quiz->lecture->module->course->tutor_id !== auth()->id()) {
            abort(403);
        }

        return response()->json(
            $quiz->load('questions.options')
        );
    }

    public function quiz_store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'lecture_id'  => 'required|exists:lectures,id',
            'questions'   => 'required|array|min:1',
        ]);

        $lecture = \App\Models\Lecture::with('module.course')->findOrFail($request->lecture_id);
        if ($lecture->module->course->tutor_id !== auth()->id()) {
            abort(403);
        }

        $quiz = Quiz::create([
            'course_id'     => $lecture->course_id,
            'module_id'     => $lecture->module_id,
            'lecture_id'    => $lecture->id,
            'title'         => $request->title,
            'description'   => $request->description,
            'total_marks'   => 0, // Will update after adding questions
            'passing_marks' => 0,
            'is_active'     => $request->has('is_active'),
        ]);

        $totalMarks = 0;
        foreach ($request->questions as $qData) {
            $question = $quiz->questions()->create([
                'question'       => $qData['question'],
                'correct_option' => $qData['correct_option'],
                'marks'          => 1, // Default marks
            ]);

            $totalMarks += 1;

            foreach ($qData['options'] as $num => $text) {
                $question->options()->create([
                    'option_text'   => $text,
                    'option_number' => $num,
                ]);
            }
        }

        $quiz->update([
            'total_marks'   => $totalMarks,
            'passing_marks' => ceil($totalMarks * 0.5), // 50% passing by default
        ]);

        return response()->json(['status' => true]);
    }

    public function quiz_update(Request $request, Quiz $quiz)
    {
        if ($quiz->lecture->module->course->tutor_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'questions'   => 'required|array|min:1',
        ]);

        $quiz->update([
            'title'       => $request->title,
            'description' => $request->description,
            'is_active'   => $request->has('is_active'),
        ]);

        // Simple sync for questions: delete old and create new
        // A more robust way would be to sync by ID, but this is simpler for now
        $quiz->questions()->each(function($q) {
            $q->options()->delete();
            $q->delete();
        });

        $totalMarks = 0;
        foreach ($request->questions as $qData) {
            $question = $quiz->questions()->create([
                'question'       => $qData['question'],
                'correct_option' => $qData['correct_option'],
                'marks'          => 1,
            ]);

            $totalMarks += 1;

            foreach ($qData['options'] as $num => $text) {
                $question->options()->create([
                    'option_text'   => $text,
                    'option_number' => $num,
                ]);
            }
        }

        $quiz->update([
            'total_marks'   => $totalMarks,
            'passing_marks' => ceil($totalMarks * 0.5),
        ]);

        return response()->json(['status' => true]);
    }
}
