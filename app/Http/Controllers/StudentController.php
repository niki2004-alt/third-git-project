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
        $majors = Major::all();

        // Generate a new student number like STU001, STU002...
        $lastStudent = Student::orderBy('id', 'desc')->first();
        $newNumber = $lastStudent ? 'STU' . str_pad($lastStudent->id + 1, 3, '0', STR_PAD_LEFT) : 'STU001';

        return view('students.create', compact('majors', 'newNumber'));
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
}