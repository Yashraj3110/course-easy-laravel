<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'module_id',
        'title',
        'description',
        'video_url',
        'video_platform',
        'thumbnail',
        'duration',
        'order',
        'is_preview',
        'is_active',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function studyMaterials()
    {
        return $this->hasMany(StudyMaterial::class);
    }

    public function notes()
    {
        return $this->hasMany(LectureNote::class);
    }

    public function progresses()
    {
        return $this->hasMany(LectureProgress::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
