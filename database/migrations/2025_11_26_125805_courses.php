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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // id
            $table->foreignId('tutor_id')->constrained('users')->onDelete('cascade'); // FK to users table
            $table->string('title'); // course title
            $table->text('description')->nullable(); // course description
            $table->decimal('price', 10, 2)->default(0); // course price
            $table->string('category')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft'); // draft/published
            $table->string('thumbnail')->nullable(); // thumbnail image path
            $table->float('rating', 2, 1)->default(0); // rating out of 5
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced'])->default('beginner'); // difficulty
            $table->enum('approval', ['pending', 'approved', 'rejected'])->default('pending'); // approval status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
