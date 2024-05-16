<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBook extends Model
{
    use HasFactory;

    protected $table ='student_book';
    protected $fillable= [
        
        'student_id',
        'book_id',
        ];

    public $timestamps = true;
}
