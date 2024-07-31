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

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        if ($department) {
            $department->name = $request->name;
            $department->save();
            return response()->json($department, 200);
        }
        return response()->json(['message' => 'Department not found'], 404);
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(['message' => 'Department deleted'], 200);
    }

    // New method to get the count of departments
    public function count()
    {
        $count = Department::count(); // Get the count of all departments
        return response()->json(['count' => $count], 200); // Return the count in a JSON response
    }
}
