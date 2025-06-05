<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Http\Resources\SchoolResource;
use App\Models\School;

class SchoolApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Se obtienen los institutos paginadas
        $schools = School::paginate(7);
        return SchoolResource::collection($schools);
    }

    /**
     * Display a listing of the resource by id.
     */
    // public function indexById($id)
    // {
    //     // Se obtiene la escuela por su id
    //     $school = School::find($id);
    //     return new SchoolResource($school);
    // }

    /**
     * Display a listing of the resource by name.
     */
    // public function indexByName($name)
    // {
    //     // Se obtiene la escuela por su nombre
    //     $school = School::find($name);
    //     return new SchoolResource($school);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        $school = School::create($request->validated());
        return response()->json(new SchoolResource($school), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $school = School::findOrFail($id);
        return new SchoolResource($school);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, int $id)
    {
        $school = School::findOrFail($id);

        if (!$school->update($request->validated())) {
            return response()->json(['error' => 'Unable to update school.'], 400);
        }

        return response()->json(new SchoolResource($school), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school = School::findOrFail($id);
        $school->delete();
        return response()->json([
            'success' => true,
            'message' => 'School deleted successfully.',
            'data' => new SchoolResource($school)
        ], 200); // 200 OK response // 204 No Content
    }
}
