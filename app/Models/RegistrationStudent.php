<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'religion_id',
        'address',
        'phone',
        'number_of_siblings',
        'height',
        'weight',
        'kk_image',
        'akta_image',
        'status',
        'class_id'
    ];

    public function parents()
    {
        return $this->hasMany(ParentStudent::class, 'registration_student_id');
    }

    public function agama(){
        return $this->belongsTo(Religion::class,'religion_id','id');
    }
    public function kelas(){
        return $this->belongsTo(CategoryClass::class,'class_id','id');
    }
}
