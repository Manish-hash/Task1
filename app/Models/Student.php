<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'course_id',
        'age',
        'gender',
        'location',

    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function book(){
        return $this->hasMany(Book::class);
    }

    public function books()
{
    return $this->belongsToMany(Book::class, 'student_book', 'student_id', 'book_id');
}
}
