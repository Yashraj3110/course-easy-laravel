<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
        'phone', 'bio', 'gender', 'dob', 'photo',
        'is_approved',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ── Role helpers ───────────────────────────────────────────────────
    public function isAdmin()      { return $this->role === 'admin'; }
    public function isInstructor() { return $this->role === 'instructor'; }
    public function isStudent()    { return $this->role === 'student'; }
    public function isApproved()   { return (bool) $this->is_approved; }

    // ── Relationships ──────────────────────────────────────────────────
    public function courses()      { return $this->hasMany(Course::class, 'tutor_id'); }

    public function enrollments()  { return $this->hasMany(Enrollment::class); }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withPivot('status', 'progress_percent', 'enrolled_at')
                    ->withTimestamps();
    }

    public function certificates() { return $this->hasMany(Certificate::class); }
    public function quizAttempts() { return $this->hasMany(QuizAttempt::class); }
    public function progresses()   { return $this->hasMany(LectureProgress::class); }
}
