<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lecture_progress', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete();

            $table->foreignId('lecture_id')
                ->constrained('lectures')
                ->cascadeOnDelete();

            $table->boolean('completed')->default(false);
            $table->timestamp('watched_at')->nullable();

            $table->timestamps();

            $table->unique(['user_id', 'course_id', 'lecture_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lecture_progress');
    }
};
