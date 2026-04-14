<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use App\Models\LectureProgress;
use App\Models\QuizAttempt;
use App\Models\Certificate;

class CertificateService
{
    /**
     * Check if a student is eligible for a certificate in a specific course.
     * Requirements:
     * 1. All lectures marked as completed.
     * 2. All quizzes passed with a score of at least 48%.
     */
    public function checkEligibility(User $user, Course $course): bool
    {
        // 1. Check if all lectures are completed
        $totalLectures = $course->lectures()->count();
        $completedLectures = LectureProgress::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->where('completed', true)
            ->count();

        if ($totalLectures === 0 || $completedLectures < $totalLectures) {
            return false;
        }

        // 2. Check if all quizzes are passed with >= 48%
        $quizzes = $course->quizzes;
        foreach ($quizzes as $quiz) {
            $bestAttempt = QuizAttempt::where('user_id', $user->id)
                ->where('quiz_id', $quiz->id)
                ->orderByDesc('score')
                ->first();

            if (!$bestAttempt) {
                return false;
            }

            $percentage = ($bestAttempt->total_marks > 0) 
                ? ($bestAttempt->score / $bestAttempt->total_marks) * 100 
                : 0;

            if ($percentage < 48) {
                return false;
            }
        }

        return true;
    }

    /**
     * Generate a certificate if eligible.
     */
    public function tryGenerate(User $user, Course $course): ?Certificate
    {
        if ($this->checkEligibility($user, $course)) {
            return Certificate::firstOrCreate(
                ['user_id' => $user->id, 'course_id' => $course->id],
                [
                    'certificate_number' => 'CE-' . strtoupper(uniqid()),
                    'issued_at' => now(),
                ]
            );
        }

        return null;
    }
}
