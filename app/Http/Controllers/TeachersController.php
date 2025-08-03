<?php
namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teachers::with(['user', 'department'])->get();;

        if ($teachers->isEmpty()) {
            return response()->json('No Teachers Available');
        }

        return response()->json($teachers);
    }

    public function add(Request $request)
    {
        $teacher = Teachers::create([
            'user_id' => $request->user_id,
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
        $teacher = Teachers::find($request->input("id"));
        $teacher->update([
            'user_id' => $request->user_id ? $request->user_id : $teacher->user_id,
            'designation' => $request->designation,
            'department_id' => $request->department_id ? $request->department_id : $teacher->department_id,
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
