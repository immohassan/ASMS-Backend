<?php

namespace App\Http\Controllers\StudentFunctions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassGrades;
class ClassGradesController extends Controller
{
    public function index()
    {
        $classGrades = ClassGrades::with(['student', 'class', 'subject'])->get();

        if ($classGrades->isEmpty()) {
            return response()->json('No Class Grades found');
        }

        return response()->json($classGrades);
    }

    public function add(Request $request)
    {
        $classGrade = ClassGrades::create([
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'remarks' => $request->remarks,
            'grade' => $request->grade,
            'total_marks' => $request->total_marks,
            'marks_obtained' => $request->marks_obtained
        ]);

        return response()->json([
            'message' => 'Class Grade added successfully',
            'class_grade' => $classGrade
        ]);
    }

    public function update(Request $request)
    {
        $classGrade = ClassGrades::find($request->id);
        $classGrade->update([
            'student_id' => $request->student_id ?? $classGrade->student_id,
            'class_id' => $request->class_id ?? $classGrade->class_id,
            'subject_id' => $request->subject_id ?? $classGrade->subject_id,
            'remarks' => $request->remarks ?? $classGrade->remarks,
            'grades' => $request->grades ?? $classGrade->grades,
            'total_marks' => $request->total_marks ?? $classGrade->total_marks,
            'marks_obtained' => $request->marks_obtained ?? $classGrade->marks_obtained
        ]);

        return response()->json(['message' => 'Class Grade updated successfully']);
    }

    public function delete(Request $request)
    {
        $classGrade = ClassGrades::find($request->id);
        $classGrade->delete();

        return response()->json(['message' => 'Class Grade deleted successfully']);
    }
}
