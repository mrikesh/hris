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

    public function destroy($id)
    {
        Position::destroy($id);
        return response()->json(null, 204);
    }
}
