<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'acronym', 'description'];

    public function graduationFormats()
    {
        return $this->hasMany(GraduationFormat::class);
    }
}
