<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Student;
use App\Models\StudentBook;
class BookController extends Controller
{
    public function index(){
       
        $books =Book::with('students')->get();
        return view('books.index',compact('books'));
    }
    public function create(){
        $students = Student::all();
        return view('books.create', compact('students'));
    }

    public function store(Request $request){
    
        $validatedData= $request->validate([
            'b_name'=> 'required|string|max:255',
            'student_id' => 'required|integer',
        ]);

        $book = new Book();
        $book->b_name = $validatedData['b_name'];
        $book->student_id =$validatedData['student_id'];

        $book->save();
    }
  

    public function insert()
    {
        $books = Book::all();
        $students = Student::all();
        return view('books.insert', compact('books', 'students'));
    }

    

    public function saved(Request $request)
{
    $validatedData = $request->validate([
        'student_id' => 'required|exists:students,id',
        'book_ids' => 'required|array',
        'book_ids.*' => 'exists:books,id',
    ]);

    // Attach 
    $student = Student::findOrFail($validatedData['student_id']);
    $student->books()->attach($validatedData['book_ids']);

    return redirect()->route('book.index')->with('success', 'Books assigned to student successfully');
}

    
}
