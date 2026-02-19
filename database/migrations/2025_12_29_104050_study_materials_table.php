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
        Schema::create('study_materials', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lecture_id')
                ->constrained('lectures')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('file_path'); // storage path
            $table->string('file_type')->nullable(); // pdf, docx
            $table->integer('file_size')->nullable(); // KB

            $table->boolean('is_downloadable')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_materials');
    }
};
