<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'tutor_id',
        'title',
        'description',
        'price',
        'category',
        'status',
        'thumbnail',
        'rating',
        'difficulty',
        'approval',
    ];

    /**
     * Instructor (Tutor) who created the course
     */
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    /**
     * Modules of the course
     */
    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    /**
     * Lectures through modules (optional helper)
     */
    public function lectures()
    {
        return $this->hasManyThrough(
            Lecture::class,
            Module::class,
            'course_id',   // Foreign key on modules table
            'module_id',   // Foreign key on lectures table
            'id',          // Local key on courses table
            'id'           // Local key on modules table
        )->orderBy('order');
    }

    /**
     * Scope: published courses
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope: draft courses
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope: pending approval
     */
    public function scopePendingApproval($query)
    {
        return $query->where('approval', 'pending');
    }

    /**
     * Scope: approved courses
     */
    public function scopeApproved($query)
    {
        return $query->where('approval', 'approved');
    }
}
