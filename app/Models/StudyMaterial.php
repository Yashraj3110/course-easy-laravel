<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_id',
        'title',
        'file_path',
        'file_type',
        'file_size',
        'is_downloadable',
    ];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
