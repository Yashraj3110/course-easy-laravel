<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('course_comments', function (Blueprint $table) {
            $table->foreignId('parent_id')->nullable()->constrained('course_comments')->cascadeOnDelete();
            $table->integer('upvotes')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('course_comments', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id', 'upvotes']);
        });
    }
};
