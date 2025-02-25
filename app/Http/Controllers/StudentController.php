<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('school')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $schools = School::all();
        return view('students.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'school_id' => 'required|exists:schools,id'
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $schools = School::all();
        return view('students.edit', compact('student', 'schools'));
    }

    public function update(StudentRequest $request, string $id)
    {
        //
        $student = Student::find($id);
        $student->update($request->all());
        return response()->json([
            'success' => true,
            'data' => new StudentResource($student)
        ], 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

