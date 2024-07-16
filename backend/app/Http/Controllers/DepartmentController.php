<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return response()->json(Department::all());
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    try {
        $department = Department::create([
            'name' => $validated['name'],
        ]);

        return response()->json($department, 201);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error creating department',
            'error' => $e->getMessage(),
        ], 500);
    }
}


    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(['message' => 'Department deleted'], 200);
    }
}
