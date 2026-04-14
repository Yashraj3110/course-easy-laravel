<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /* ── Public Course Listing ─────────────────────────────────── */
    public function index(Request $request)
    {
        $query = Course::with('tutor')
            ->where('approval', 'approved')
            ->where('status', 'published');

        if ($s = $request->search) {
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('description', 'like', "%{$s}%");
            });
        }

        if ($cat = $request->category) {
            $query->where('category', $cat);
        }

        if ($diff = $request->difficulty) {
            $query->where('difficulty', $diff);
        }

        if ($request->free) {
            $query->where('price', 0);
        }

        $courses = $query->latest()->paginate(12)->withQueryString();

        $categories = Course::where('approval','approved')
            ->where('status','published')
            ->distinct()->pluck('category')->filter();

        $enrolled_ids = auth()->check() 
            ? auth()->user()->enrollments()->pluck('course_id')->toArray() 
            : [];

        return view('courses.index', compact('courses', 'categories', 'enrolled_ids'));
    }

    /* ── Single Course Detail ──────────────────────────────────── */
    public function show(Course $course)
    {
        if ($course->approval !== 'approved' || $course->status !== 'published') {
            abort(404);
        }

        $course->load([
            'tutor',
            'modules.lectures',
            'quizzes',
        ]);

        $isEnrolled = auth()->check() && $course->isEnrolledBy(auth()->id());
        $totalLectures = $course->lectures()->count();

        return view('courses.show', compact('course', 'isEnrolled', 'totalLectures'));
    }
}
