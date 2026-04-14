<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\QuizOption;
use App\Models\QuizQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Instructor
        $instructor = User::updateOrCreate(
            ['email' => 'instructor@gmail.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('password'),
                'role' => 'instructor',
                'is_approved' => true,
                'bio' => 'Senior Web Developer with 10+ years of experience in Full-stack development.'
            ]
        );

        // 2. Create Course (Approved)
        $course = Course::create([
            'tutor_id' => $instructor->id,
            'title' => 'Advanced Laravel 11 Mastery',
            'description' => 'Master the latest features of Laravel 11, including the new directory structure, streamlined configuration, and advanced Eloquent patterns.',
            'category' => 'web-development',
            'difficulty' => 'advanced',
            'price' => 49.99,
            'approval' => 'approved',
            'status' => 'published',
            'thumbnail' => null,
        ]);

        // 3. Create Module 1
        $module1 = Module::create([
            'course_id' => $course->id,
            'title' => 'Getting Started with Laravel 11',
            'description' => 'Understanding the core changes in Laravel 11.',
            'order' => 1,
        ]);

        // 4. Create Lecture 1
        $lecture1 = Lecture::create([
            'course_id' => $course->id,
            'module_id' => $module1->id,
            'title' => 'The New Directory Structure',
            'description' => 'A deep dive into the minimalist directory structure of Laravel 11.',
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Placeholder
            'order' => 1,
            'is_preview' => true,
        ]);

        // 5. Create Quiz for Lecture 1
        $quiz = Quiz::create([
            'course_id' => $course->id,
            'module_id' => $module1->id,
            'lecture_id' => $lecture1->id,
            'title' => 'Chapter 1 Assessment',
            'description' => 'Test your knowledge on the new directory structure.',
            'total_marks' => 2,
            'passing_marks' => 1,
            'is_active' => true,
        ]);

        // Question 1
        $q1 = QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => 'Which file is the principal entry point for the new configuration in Laravel 11?',
            'correct_option' => 1,
            'marks' => 1,
        ]);

        QuizOption::create(['quiz_question_id' => $q1->id, 'option_text' => 'bootstrap/app.php', 'option_number' => 1]);
        QuizOption::create(['quiz_question_id' => $q1->id, 'option_text' => 'config/app.php', 'option_number' => 2]);
        QuizOption::create(['quiz_question_id' => $q1->id, 'option_text' => 'public/index.php', 'option_number' => 3]);
        QuizOption::create(['quiz_question_id' => $q1->id, 'option_text' => 'routes/web.php', 'option_number' => 4]);

        // Question 2
        $q2 = QuizQuestion::create([
            'quiz_id' => $quiz->id,
            'question' => 'Where are the default middleware files located in Laravel 11?',
            'correct_option' => 4,
            'marks' => 1,
        ]);

        QuizOption::create(['quiz_question_id' => $q2->id, 'option_text' => 'app/Http/Middleware', 'option_number' => 1]);
        QuizOption::create(['quiz_question_id' => $q2->id, 'option_text' => 'config/middleware.php', 'option_number' => 2]);
        QuizOption::create(['quiz_question_id' => $q2->id, 'option_text' => 'bootstrap/middleware.php', 'option_number' => 3]);
        QuizOption::create(['quiz_question_id' => $q2->id, 'option_text' => 'Internalized within the framework (Customizable in bootstrap/app.php)', 'option_number' => 4]);

        // 6. Another Course
        Course::create([
            'tutor_id' => $instructor->id,
            'title' => 'Tailwind CSS for UI Designers',
            'description' => 'Learn how to build stunning, responsive user interfaces quickly using the utility-first CSS framework.',
            'category' => 'design',
            'difficulty' => 'beginner',
            'price' => 0,
            'approval' => 'approved',
            'status' => 'published',
        ]);
    }
}
