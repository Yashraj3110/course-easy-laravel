<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_id', 'title', 'description', 'price',
        'category', 'status', 'thumbnail', 'rating',
        'difficulty', 'approval',
    ];

    // ── Relationships ──────────────────────────────────────────────────

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withPivot('status', 'progress_percent', 'enrolled_at')
                    ->withTimestamps();
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function comments()
    {
        return $this->hasMany(CourseComment::class)->latest();
    }

    // ── Helpers ────────────────────────────────────────────────────────

    public function isEnrolledBy(int $userId): bool
    {
        return $this->enrollments()->where('user_id', $userId)->exists();
    }

    public function totalLectures(): int
    {
        return $this->lectures()->count();
    }

    public function totalDuration(): int
    {
        return (int) $this->lectures()->sum('duration');
    }

    public function getApprovalBadgeAttribute(): string
    {
        return match ($this->approval) {
            'approved' => 'success',
            'rejected' => 'danger',
            default    => 'warning',
        };
    }
}
