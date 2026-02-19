<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | QUIZZES
        |--------------------------------------------------------------------------
        */
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->foreignId('module_id')
                ->constrained('modules')
                ->cascadeOnDelete();

            $table->foreignId('lecture_id')
                ->constrained('lectures')
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description')->nullable();

            $table->integer('total_marks')->default(0);
            $table->integer('passing_marks')->default(0);
            $table->integer('time_limit')->nullable(); // minutes

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | QUIZ QUESTIONS
        |--------------------------------------------------------------------------
        */
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('quiz_id')
                ->constrained('quizzes')
                ->cascadeOnDelete();

            $table->string('question');
            $table->unsignedTinyInteger('correct_option'); // 1–4
            $table->integer('marks')->default(1);
            $table->integer('order')->default(0);

            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | QUIZ OPTIONS (4 PER QUESTION)
        |--------------------------------------------------------------------------
        */
        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id();

            $table->foreignId('quiz_question_id')
                ->constrained('quiz_questions')
                ->cascadeOnDelete();

            $table->string('option_text');
            $table->unsignedTinyInteger('option_number'); // 1–4

            $table->timestamps();

            // Ensures only one option number per question
            $table->unique(['quiz_question_id', 'option_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_options');
        Schema::dropIfExists('quiz_questions');
        Schema::dropIfExists('quizzes');
    }
};
