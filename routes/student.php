<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/* ── Public: Course Browsing ──────────────────────────────────── */
Route::get('/courses',         [CourseController::class, 'index'])->name('courses');
Route::get('/courses/{course}',[CourseController::class, 'show'])->name('courses.show');

/* ── Authenticated Student Routes ─────────────────────────────── */
Route::middleware(['auth', 'role:student,instructor,admin'])->group(function () {

    // Dashboard
    Route::get('/sdash', [StudentController::class, 'home'])->name('dashboard.student.home');

    // My Courses & Profile
    Route::get('/student/courses',  [StudentController::class, 'myCourses'])->name('dashboard.student.courses');
    Route::get('/certificates',     [StudentController::class, 'certificates'])->name('dashboard.student.certificates');
    Route::get('/student/profile',  [StudentController::class, 'profile'])->name('dashboard.student.profile');
    Route::put('/student/profile',  [StudentController::class, 'update'])->name('student.profile.update');
    Route::get('/settings',         [StudentController::class, 'settings'])->name('dashboard.student.settings');
    Route::get('/discussions',      [DiscussionController::class, 'index'])->name('dashboard.student.discussions');

    // Course Specific Discussions
    Route::get('/courses/{course}/discussions', [DiscussionController::class, 'show'])->name('student.course.discussions');
    Route::post('/courses/{course}/discussions', [DiscussionController::class, 'store'])->name('student.course.discussions.store');
    Route::post('/discussions/{comment}/upvote', [DiscussionController::class, 'upvote'])->name('student.discussion.upvote');

    // Enrollment
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');

    // Course Player
    Route::get('/learn/{course}',   [EnrollmentController::class, 'learn'])->name('student.course.learn');
    Route::post('/learn/{course}/complete/{lecture}',
        [EnrollmentController::class, 'markComplete'])->name('student.lecture.complete');

    // Quiz
    Route::get( '/learn/{course}/quiz/{quiz}',        [QuizController::class, 'show'])->name('student.quiz.show');
    Route::post('/learn/{course}/quiz/{quiz}/submit',  [QuizController::class, 'submit'])->name('student.quiz.submit');
    Route::get( '/learn/{course}/quiz/{quiz}/result/{attempt}',
        [QuizController::class, 'result'])->name('student.quiz.result');
    // Certificates
    Route::get('/certificates/{certificate}/download', [StudentController::class, 'downloadCertificate'])->name('student.certificate.download');
});
