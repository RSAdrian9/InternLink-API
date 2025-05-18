<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InternshipAssignmentRequest;
use App\Http\Resources\InternshipAssignmentResource;
use App\Models\InternshipAssignment;

class InternshipAssignmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = InternshipAssignment::with(['student', 'company', 'tutor'])->paginate(10);
        return InternshipAssignmentResource::collection($assignments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InternshipAssignmentRequest $request)
    {
        $assignment = InternshipAssignment::create($request->validated());
        return response()->json(new InternshipAssignmentResource($assignment), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $assignment = InternshipAssignment::with(['student', 'company', 'tutor'])->findOrFail($id);
        return new InternshipAssignmentResource($assignment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InternshipAssignmentRequest $request, $id)
    {
        $assignment = InternshipAssignment::findOrFail($id);
        $assignment->update($request->validated());
        return response()->json(new InternshipAssignmentResource($assignment), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $assignment = InternshipAssignment::findOrFail($id);
        $assignment->delete();
        return response()->json(['message' => 'Internship assignment deleted successfully.'], 204);
    }
}
