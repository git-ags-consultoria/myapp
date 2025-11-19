<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['day_of_week', 'start_time', 'end_time'];

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_schedule');
    }

    public function getLabelAttribute()
    {
        return "{$this->day_of_week} ({$this->start_time} - {$this->end_time})";
    }
}
