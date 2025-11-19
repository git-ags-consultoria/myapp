<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name', 'modality_id', 'instructor_id'];

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'class_schedule');
    }
}
