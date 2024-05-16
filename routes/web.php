<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for students
Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
Route::get('/students/index', [StudentController::class, 'index'])->name('student.index');
Route::get('/students/trash', [StudentController::class, 'trash'])->name('student.trash');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students/edit/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/students/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
Route::get('/students/restore/{id}', [StudentController::class, 'restore'])->name('student.restore');


// Routes for Courses

Route::get('/courses/create', [CourseController::class, 'create'])->name('course.create');
Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
Route::get('/courses/index', [CourseController::class, 'index'])->name('course.index');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/courses/edit/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('delete');


// Routes for Books

Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/save', [BookController::class, 'store'])->name('book.store');
Route::get('/books/index', [BookController::class, 'index'])->name('book.index');

Route::get('/books/insert', [BookController::class, 'insert'])->name('studentbook.insert');
Route::post('/books', [BookController::class, 'saved'])->name('studentbook.saved');


require __DIR__.'/auth.php';
