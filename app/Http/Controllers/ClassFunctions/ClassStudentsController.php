<?php

namespace App\Http\Controllers\ClassFunctions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassStudents;
class ClassStudentsController extends Controller
{
    public function index()
    {
        $classStudents = ClassStudents::with(['class', 'student'])->get();
        if ($classStudents->isEmpty()) {
            return response()->json('No Class-Student records found');
        }

        return response()->json($classStudents);
    }

    public function add(Request $request)
    {
        $classStudent = ClassStudents::create([
            'class_id' => $request->class_id,
            'student_id' => $request->student_id
        ]);

        return response()->json([
            'message' => 'Student assigned to class successfully',
            'class_student' => $classStudent
        ]);
    }

    public function update(Request $request)
    {
        $classStudent = ClassStudents::find($request->id);

        $classStudent->update([
            'class_id' => $request->class_id ?? $classStudent->class_id,
            'student_id' => $request->student_id ?? $classStudent->student_id
        ]);

        return response()->json(['message' => 'Class-Student record updated successfully']);
    }

    public function delete(Request $request)
    {
        $classStudent = ClassStudents::find($request->id);
        $classStudent->delete();

        return response()->json(['message' => 'Class-Student record deleted successfully']);
    }
}
