<?php

namespace App\Http\Controllers\StudentFunctions;
use App\Models\Assignments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
    public function index()
    {
        $assignments = Assignments::with(['class', 'subject'])->get();

        if ($assignments->isEmpty()) {
            return response()->json('No assignments found');
        }

        return response()->json($assignments);
    }

    public function add(Request $request)
    {
        $assignment = Assignments::create([
            'title' => $request->title,
            'description' => $request->description,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'total_marks' => $request->total_marks,
            'due_date' => $request->due_date
        ]);

        return response()->json([
            'message' => 'Assignment created successfully',
            'assignment' => $assignment
        ]);
    }

    public function update(Request $request)
    {
        $assignment = Assignments::find($request->id);

        $assignment->update([
            'title' => $request->title ?? $assignment->title,
            'description' => $request->description ?? $assignment->description,
            'class_id' => $request->class_id ?? $assignment->class_id,
            'subject_id' => $request->subject_id ?? $assignment->subject_id,
            'total_marks' => $request->total_marks ?? $assignment->total_marks,
            'due_date' => $request->due_date ?? $assignment->due_date
        ]);

        return response()->json(['message' => 'Assignment updated successfully']);
    }

    public function delete(Request $request)
    {
        $assignment = Assignments::find($request->id);
        $assignment->delete();

        return response()->json(['message' => 'Assignment deleted successfully']);
    }
}
