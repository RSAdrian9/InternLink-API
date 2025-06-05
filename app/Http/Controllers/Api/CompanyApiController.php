<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

class CompanyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return CompanyResource::collection($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->validated());
        return response()->json(new CompanyResource($company), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, int $id)
    {
        $company = Company::findOrFail($id);

        if (!$company->update($request->validated())) {
            return response()->json(['error' => 'Unable to update school.'], 400);
        }

        return response()->json(new CompanyResource($company), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully.',
            'data' => new CompanyResource($company)
        ], 200); // 200 OK response // 204 No Content
    }
}
