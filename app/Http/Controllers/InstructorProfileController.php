<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
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

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'difficulty'  => 'required|in:beginner,intermediate,advanced',
            'status'      => 'required|in:draft,published',
            'thumbnail'   => 'nullable|image|max:2048',
        ]);

        // ✅ THUMBNAIL UPLOAD (public/uploads/courses)
        if ($request->hasFile('thumbnail')) {

            // delete old thumbnail if exists
            if ($course->thumbnail && file_exists(public_path($course->thumbnail))) {
                unlink(public_path($course->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/courses'), $filename);

            $data['thumbnail'] = 'uploads/courses/' . $filename;
        }

        $course->update($data);

        return response()->json(['status' => true]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'difficulty'  => 'required|in:beginner,intermediate,advanced',
            'status'      => 'required|in:draft,published',
            'thumbnail'   => 'nullable|image|max:2048',
        ]);

        $data['tutor_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/courses'), $filename);
            $data['thumbnail'] = 'uploads/courses/' . $filename;
        }

        Course::create($data);

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
            $quiz->load('lecture.module.course')
        );
    }
}
