<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee; // Ensure you have this model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserMail; // Ensure this mail class exists
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Mail\NewEmployeeMail; 

class EmployeeController extends Controller
{

    public function index()
{
    // Fetch all employees
    $employees = Employee::with('user')->get(); // Assuming you have a relationship with User model

    return response()->json($employees);
}


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|string|max:10',
            'department' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);

        $password = Str::random(8); 
        DB::beginTransaction();
        try {
            // Create a new user
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($password);
            $user->save();

            // Create the employee profile
            $employee = new Employee();
            $employee->emp_id = $user->id; // Assuming emp_id corresponds to user ID
            $employee->gender = $validatedData['gender'];
            $employee->department = $validatedData['department'];
            $employee->position = $validatedData['position'];
            $employee->address = $validatedData['address'];
            $employee->dob = $validatedData['dob'];
            $employee->phone = $validatedData['phone'];
            $employee->save();

            // Send the email
            $data = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $password,
            ];
            Mail::to($validatedData['email'])->send(new NewEmployeeMail($data));

            DB::commit();
            return response()->json(['message' => 'Employee created successfully'], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating employee: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create employee'], 500);
        }
    }

    public function count()
    {
        $count = Employee::count(); // Get the count of all departments
        return response()->json(['count' => $count], 200); // Return the count in a JSON response
    }
}
