<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduationFormat extends Model
{
    use HasFactory;

    protected $fillable = [
        'modality_id', 'belt_name', 'belt_color', 'min_age', 'min_months', 'order'
    ];

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }
}
