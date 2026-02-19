<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'module_id',
        'lecture_id',
        'title',
        'description',
        'total_marks',
        'passing_marks',
        'time_limit',
        'is_active',
    ];

    /* ------------------------------------
       RELATIONSHIPS
    ------------------------------------ */

    /**
     * Quiz belongs to a course
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Quiz belongs to a module
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Quiz belongs to a lecture
     */
    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }

    /**
     * Quiz has many questions
     */
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
