<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /* ── Show Quiz ─────────────────────────────────────────────── */
    public function show(Course $course, Quiz $quiz)
    {
        $user = Auth::user();

        if (!$course->isEnrolledBy($user->id)) {
            return redirect()->route('courses.show', $course)->with('error', 'Enroll first.');
        }

        $quiz->load('questions.options');
        $previousAttempt = QuizAttempt::where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)->latest()->first();

        return view('student.quiz', compact('course', 'quiz', 'previousAttempt'));
    }

    /* ── Submit Quiz ───────────────────────────────────────────── */
    public function submit(Request $request, Course $course, Quiz $quiz)
    {
        $user    = Auth::user();
        $quiz->load('questions.options');

        $answers     = $request->input('answers', []);
        $score       = 0;
        $totalMarks  = 0;

        foreach ($quiz->questions as $question) {
            $totalMarks += $question->marks;
            $selected = $answers[$question->id] ?? null;
            if ((int) $selected === (int) $question->correct_option) {
                $score += $question->marks;
            }
        }

        $passed = $score >= $quiz->passing_marks;

        $attempt = QuizAttempt::create([
            'user_id'      => $user->id,
            'quiz_id'      => $quiz->id,
            'course_id'    => $course->id,
            'score'        => $score,
            'total_marks'  => $totalMarks,
            'passed'       => $passed,
            'answers'      => $answers,
            'submitted_at' => now(),
        ]);

        // Auto-issue certificate if eligible
        $certService = new \App\Services\CertificateService();
        $certService->tryGenerate($user, $course);

        return redirect()->route('student.quiz.result', [$course, $quiz, $attempt])
                         ->with('success', $passed ? '🎉 Congratulations! You passed!' : '😞 You did not pass. Try again.');
    }

    /* ── Quiz Result ───────────────────────────────────────────── */
    public function result(Course $course, Quiz $quiz, QuizAttempt $attempt)
    {
        $quiz->load('questions.options');
        return view('student.quiz-result', compact('course', 'quiz', 'attempt'));
    }
}
