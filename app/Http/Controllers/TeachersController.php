<?php
namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\Roles;
use App\Models\User;
use App\Models\Departments;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teachers::with(['user.role', 'department'])->get();
        $roles = Roles::all();
        $departments = Departments::all();

        if ($teachers->isEmpty()) {
            return response()->json('No Teachers Available');
        }

        return response()->json(["teachers" =>$teachers,"roles"=>$roles,"departments"=>$departments]);
    }

    public function add(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'address' => "N/A",
            'password' => $request->email,
            'is_deleted' => '0'
        ]);

        $teacher = Teachers::create([
            'user_id' => $user->id,
            'designation' => $request->designation,
            'department_id' => $request->department_id
        ]);

        return response()->json([
            'message' => 'Teacher added successfully',
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request)
{
    $teacher = Teachers::find($request->id);
    $user = User::find($teacher->user_id);
    
    // update user
    $user->update([
        'name' => $request->name ?? $user->name,
        'email' => $request->email ?? $user->email,
        'phone' => $request->phone ?? $user->phone,
        'role_id' => $request->role_id ?? $user->role_id,
        'address' => $request->address ?? $user->address,
        'password' => $request->password ?? $user->password,
        'is_deleted' => '0'
    ]);

    // update teacher
    $teacher->update([
        'designation' => $request->designation ?? $teacher->designation,
        'department_id' => $request->department_id ?? $teacher->department_id,
    ]);

    return response()->json(['message' => 'Teacher updated successfully']);
}


    public function delete(Request $request)
    {
        $request->validate(['id' => 'required|integer|exists:teachers,id']);

        $teacher = Teachers::find($request->id);

        $teacher->delete();

        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
