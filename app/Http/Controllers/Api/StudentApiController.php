<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Se obtienen los estudiantes paginados (se añadió la paginación, de forma opcional)
        $students = Student::with('school')->paginate(10);
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(['name' => 'required', 'email' => 'required|email', 'school_id' => 'required|exists:schools,id']);
        $student = Student::create($request->all());
        return response()->json(new StudentResource($student), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return new StudentResource($student->load('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email',
        ]);
        $student->update($request->all());
        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return response()->json(['message' => 'Student deleted']);
    }
}
