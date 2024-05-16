<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $fillable =[
        'c_name',
        'description',
        'c_duration',
        'c_price',
        'status'

    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
