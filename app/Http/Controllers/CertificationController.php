<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificationController extends Controller
{
    // Get all certifications
    public function index()
    {
        return response()->json(Certification::all(), 200);
    }

    // Create a new certification
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $certification = Certification::create($request->all());

        return response()->json([
            'message' => 'Certification created successfully',
            'certification' => $certification
        ], 201);
    }

    // Get single certification by ID
    public function show($id)
    {
        $certification = Certification::find($id);
        if (!$certification) {
            return response()->json(['message' => 'Certification not found'], 404);
        }
        return response()->json($certification, 200);
    }

    // Update an existing certification
    public function update(Request $request, $id)
    {
        $certification = Certification::find($id);
        if (!$certification) {
            return response()->json(['message' => 'Certification not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $certification->update($request->all());

        return response()->json([
            'message' => 'Certification updated successfully',
            'certification' => $certification
        ], 200);
    }

    // Delete a certification
    public function destroy($id)
    {
        $certification = Certification::find($id);
        if (!$certification) {
            return response()->json(['message' => 'Certification not found'], 404);
        }

        $certification->delete();

        return response()->json(['message' => 'Certification deleted successfully'], 200);
    }
}
