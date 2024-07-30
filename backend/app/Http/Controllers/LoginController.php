<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure you have the User model imported

class LoginController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken; // This should now work

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
}

}
