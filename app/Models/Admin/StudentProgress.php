<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    protected $fillable = [
        'student_id',
        'modality_id',
        'graduation_format_id',
        'graduated_at',
    ];

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function graduationFormat()
    {
        return $this->belongsTo(GraduationFormat::class);
    }

    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class);
    }
}
