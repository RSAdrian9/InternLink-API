<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function show($id)
    {
        //
        $student = Student::with('school')->findOrFail($id); // Cargar la relación 'school'. Evita dos consultas a la base de datos.
        return new StudentResource($student->load('school'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'success' => true,
            'data' => new StudentResource($student)
        ], 205);
    }
}
