<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStudent extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable = [
        'registration_student_id',
        'name',
        'date_of_birth',
        'place_of_birth',
        'education_id',
        'job',
        'address',
    ];

    public function student()
    {
        return $this->belongsTo(RegistrationStudent::class, 'registration_student_id');
    }
}
