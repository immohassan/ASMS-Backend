<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::with(['user', 'class', 'parent'])->get();

        if ($students->isEmpty()) {
            return response()->json('No Students Available');
        }

        return response()->json($students);
    }

    public function add(Request $request)
    {
        $student = Students::create([
            'user_id' => $request->user_id,
            'roll_no' => $request->roll_no,
            'gender' => $request->gender,
            'class_id' => $request->class_id,
            'parent_id' => $request->parent_id,
            'dob' => $request->dob,
        ]);

        return response()->json([
            'message' => 'Student added successfully',
            'student' => $student
        ]);
    }

    public function update(Request $request)
    {
        $student = Students::find($request->id);

        $student->update([
            'user_id' => $request->user_id ?? $student->user_id,
            'roll_no' => $request->roll_no ?? $student->roll_no,
            'gender' => $request->gender ?? $student->gender,
            'class_id' => $request->class_id ?? $student->class_id,
            'parent_id' => $request->parent_id ?? $student->parent_id,
            'dob' => $request->dob ?? $student->dob,
        ]);

        return response()->json(['message' => 'Student updated successfully']);
    }

    public function delete(Request $request)
    {
        $student = Students::find($request->id);
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
