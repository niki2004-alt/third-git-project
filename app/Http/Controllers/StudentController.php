<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of students
    public function index()
    {
        $students = Student::with('major')->paginate(15);
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new student
    public function create()
{

    // Get the last student record ordered by id desc
    $lastStudent = Student::orderBy('id', 'desc')->first();

    if (!$lastStudent) {
        // No student yet, start with STU001
        $newNumber = 'STU001';
    } else {
        // Extract the numeric part from last student's number
        $lastNumber = (int) str_replace('STU', '', $lastStudent->number);
        $newNumber = 'STU' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    }
        $majors = Major::all();
    return view('students.create', compact('newNumber', 'majors'));
}


    // Store a newly created student in storage
   public function store(Request $request)
{
    $request->validate([
        'number' => 'required|unique:students,number',
        'name' => 'required|string|max:255',
        'gender' => 'required|in:Male,Female',
        'year' => 'required|integer',
        'major' => 'required|integer|exists:majors,id', // validate major as existing major id
    ]);

    Student::create([
        'number' => $request->number,
        'name' => $request->name,
        'gender' => $request->gender,
        'year' => $request->year,
        'major_id' => $request->major, // assign major_id from the major field in request
    ]);

    return redirect()->route('students.index')->with('success', 'Student created successfully!');
}


    // Display the specified student
    public function show(Student $student)
    {
        $student->load('major.subjects');
        return view('students.show', compact('student'));
    }

    // Show the form for editing the specified student
    public function edit(Student $student)
    {
        $majors = Major::all();
        return view('students.edit', compact('student', 'majors'));
    }

    // Update the specified student in storage
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'year' => 'required|integer|min:1',
            'major' => 'required',
        ]);

        $student->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'year' => $request->year,
            'major_id' => $request->major,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Remove the specified
    // Remove the specified student from storage
public function destroy(Student $student)
{
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
}

}