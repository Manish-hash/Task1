<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{

    public function index(){

        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }
    public function create(){
        return view("courses.create");
    }

    public function store(Request $request){

        // dd($request);
        $validatedData = $request->validate([
            'c_name' => 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'c_duration' => 'required|string',
            'c_price' => 'required|integer',
            'status' => 'required|string|in:active,inactive',
        ]);

        $course = new Course();


        $course->c_name = $validatedData['c_name'];
        $course->description =$validatedData['description'];
        $course->c_duration =$validatedData['c_duration'];
        $course->c_price = $validatedData['c_price'];
        $course->status =$validatedData['status'];

        $course->save();
        return redirect()->back()->with('success', 'Course Added successfully!');
    }

    public function edit($id){

        $course = Course:: findOrFail($id);
        return view('courses.edit',compact('course'));
    }

    public function update(Request $request, $id){
    
        $validatedData = $request->validate([
            'c_name' => 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'c_duration' => 'required|string',
            'c_price' => 'required|integer',
            'status' => 'required|string|in:active,inactive',
        ]);
        $course = Course:: findOrFail($id);

        $course->c_name = $validatedData['c_name'];
        $course->description =$validatedData['description'];
        $course->c_duration =$validatedData['c_duration'];
        $course->c_price = $validatedData['c_price'];
        $course->status =$validatedData['status'];

        $course->save();
        return redirect()->route('course.index')->with('success', 'Course Updated successfully!');
    }

    public function destroy($id){

        $course = Course::findOrFail($id);

        $course->status = 'inactive';
        $course->save();
        return redirect()->route('course.index')->with('success', 'User status changed to inactive');
    }
}
