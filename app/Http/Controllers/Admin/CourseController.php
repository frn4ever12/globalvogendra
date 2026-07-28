<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\University;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();  
        return view('Admin.Course.index', compact('courses'));
    }
    public function create()
    {
        return view('Admin.Course.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id', 
        ]);
    
        Course::create([
            'name' => $validatedData['name'],
            'university_id' => $validatedData['university_id'],
        ]);
        return redirect()->route('admin.course.index')->with('success', 'Course created successfully!');
    }
        public function edit(Course $course)
    {
        return view('Admin.Course.edit', compact('course'));
    }
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id', 
        ]);

        $course->update($validatedData); 
        return redirect()->route('course.index')->with('success', 'Course updated successfully!');
    }
    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return response()->json(['status' => 200, 'message' => 'Course deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'message' => 'An error occurred while deleting the course']);
        }
    }
}
