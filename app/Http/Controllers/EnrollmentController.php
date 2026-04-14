<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lecture;
use App\Models\LectureProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /* ── Enroll in a Course ────────────────────────────────────── */
    public function enroll(Course $course)
    {
        $user = Auth::user();

        if ($course->approval !== 'approved') {
            return back()->with('error', 'This course is not available for enrollment.');
        }

        if ($course->isEnrolledBy($user->id)) {
            return redirect()->route('student.course.learn', $course)
                             ->with('info', 'You are already enrolled in this course.');
        }

        Enrollment::create([
            'user_id'     => $user->id,
            'course_id'   => $course->id,
            'amount_paid' => $course->price,
            'enrolled_at' => now(),
        ]);

        return redirect()->route('student.course.learn', $course)
                         ->with('success', 'Enrolled successfully! Start learning.');
    }

    /* ── Course Player ─────────────────────────────────────────── */
    public function learn(Course $course, Request $request)
    {
        $user = Auth::user();

        if (!$course->isEnrolledBy($user->id)) {
            return redirect()->route('courses.show', $course)
                             ->with('error', 'Please enroll first.');
        }

        $course->load(['modules.lectures.studyMaterials', 'quizzes.questions.options']);

        // Pick current lecture
        $lectureId      = $request->get('lecture');
        $firstLecture   = $course->modules->first()?->lectures->first();
        $currentLecture = $lectureId
            ? Lecture::findOrFail($lectureId)
            : $firstLecture;

        // Completed lecture IDs for this student
        $completed = LectureProgress::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->where('completed', true)
            ->pluck('lecture_id')
            ->toArray();

        return view('student.learn', compact('course', 'currentLecture', 'completed'));
    }

    /* ── Mark Lecture Complete ─────────────────────────────────── */
    public function markComplete(Request $request, Course $course, Lecture $lecture)
    {
        $user = Auth::user();

        LectureProgress::updateOrCreate(
            ['user_id' => $user->id, 'course_id' => $course->id, 'lecture_id' => $lecture->id],
            ['completed' => true, 'watched_at' => now()]
        );

        // Recalculate progress %
        $total     = $course->lectures()->count();
        $done      = LectureProgress::where('user_id', $user->id)
                        ->where('course_id', $course->id)->where('completed', true)->count();
        $percent   = $total > 0 ? intval(($done / $total) * 100) : 0;

        $enrollment = Enrollment::where('user_id', $user->id)
                        ->where('course_id', $course->id)->first();
        if ($enrollment) {
            $enrollment->update(['progress_percent' => $percent,
                'completed_at' => $percent === 100 ? now() : null,
                'status'       => $percent === 100 ? 'completed' : 'active']);
        }

        // Auto-issue certificate if eligible
        $certService = new \App\Services\CertificateService();
        $certService->tryGenerate($user, $course);

        return response()->json(['progress' => $percent, 'done' => true]);
    }
}
