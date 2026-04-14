<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = [
        'user_id', 'quiz_id', 'course_id',
        'score', 'total_marks', 'passed', 'answers',
        'started_at', 'submitted_at',
    ];

    protected $casts = [
        'answers'      => 'array',
        'passed'       => 'boolean',
        'started_at'   => 'datetime',
        'submitted_at' => 'datetime',
    ];

    public function user()   { return $this->belongsTo(User::class); }
    public function quiz()   { return $this->belongsTo(Quiz::class); }
    public function course() { return $this->belongsTo(Course::class); }
}
