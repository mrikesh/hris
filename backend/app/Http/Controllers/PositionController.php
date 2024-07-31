<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        return Position::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $postn = Position::create([
            'name' => $validatedData['name'],
        ]);

        return response()->json($postn, 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the position by ID
        $position = Position::find($id);
        if (!$position) {
            return response()->json(['message' => 'Position not found'], 404);
        }

        // Update the position
        $position->name = $request->name;
        $position->save();

        // Return the updated position
        return response()->json($position, 200);
    }

    public function destroy($id)
    {
        Position::destroy($id);
        return response()->json(null, 204);
    }

    public function count()
    {
        $count = Position::count(); // Get the count of all departments
        return response()->json(['count' => $count], 200); // Return the count in a JSON response
    }
}
