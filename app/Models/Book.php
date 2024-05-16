<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable= [
    'name',
    'student_id',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_book', 'book_id', 'student_id');
    }
    
}
