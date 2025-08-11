<?php

namespace App\Http\Controllers\StudentFunctions;
use App\Models\AssignmentsMarks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentMarksController extends Controller
{
    public function index()
    {
        $marks = AssignmentsMarks::with(['assignment', 'class', 'subject', 'student'])->get();

        if ($marks->isEmpty()) {
            return response()->json('No Assignment Marks found');
        }

        return response()->json($marks);
    }

    public function add(Request $request)
    {
        $mark = AssignmentsMarks::create([
            'assignment_id' => $request->assignment_id,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'marks_obtained' => $request->marks_obtained,
            'grade' => $request->grade,
            'remarks' => $request->remarks
        ]);

        return response()->json([
            'message' => 'Assignment mark added successfully',
            'assignment_mark' => $mark
        ]);
    }

    public function update(Request $request)
    {
        $mark = AssignmentsMarks::find($request->id);

        $mark->update([
            'marks_obtained' => $request->marks_obtained ?? $mark->marks_obtained,
            'grade' => $request->grade ?? $mark->grade,
            'remarks' => $request->remarks ?? $mark->remarks
        ]);

        return response()->json(['message' => 'Assignment mark updated successfully']);
    }

    public function delete(Request $request)
    {
        $mark = AssignmentsMarks::find($request->id);
        $mark->delete();

        return response()->json(['message' => 'Assignment mark deleted successfully']);
    }
}
