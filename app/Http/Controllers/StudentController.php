<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            //where
            $students =Student::where('name', 'LIKE', "%$search%")
                            ->orWhere('email','=', "$search")->get();
        }
        else{
            $students = Student::with('course')->get();
        }
        $data =compact('students', 'search');
        return view('students.index')->with($data);

    }

    public function trash(){
        $students = Student::onlyTrashed()->get();
        return view('students.trash',compact('students'));
    }

    public function restore($id){
        $student = Student::withTrashed()->find($id);

        if(!is_null( $student)){
            $student->restore();
        }

        $students = Student::with('course')->get();
       return view('students.index',compact('students'));

    }


    public function create(){
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request){
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'location' => 'required|string|max:255',

        ]);

        $student = new Student();
        
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->course_id = $validatedData['course_id'];
        $student->age = $validatedData['age'];
        $student->gender = $validatedData['gender'];
        $student->location = $validatedData['location'];
        $student->save();
        return redirect()->back()->with('success', 'Student Added successfully!');
    }

    public function edit($id){
        $courses = Course::all();
        $student = Student:: findOrFail($id);
        
        return view('students.edit',compact('student','courses'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students')->ignore($id)],
            'course_id' => 'required|exists:courses,id',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'location' => 'required|string|max:255',

        ]);
        
        $student = Student::findOrFail($id);
        
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->course_id = $validatedData['course_id'];
        $student->age = $validatedData['age'];
        $student->gender = $validatedData['gender'];
        $student->location = $validatedData['location'];

        $student->save();
        return redirect()->back()->with('success', 'Student Updated successfully!');
    }
   

    public function delete($id){

        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'Student Removed to Trash!');
    }
}



//     public function index(Request $request)
// {
//     $search = $request->input('search');

//     $students = Student::with('course')
//         ->when($search, function ($query, $search) {
//             return $query->where('name', 'like', "%{$search}%")
//                          ->orWhere('email', 'like', "%{$search}%")
//                          ->orWhereHas('course', function($query) use ($search) {
//                              $query->where('c_name', 'like', "%{$search}%");
//                          })
//                          ->orWhere('location', 'like', "%{$search}%");
//         })
//         ->get();

//     return view('students.index', compact('students'));
// }