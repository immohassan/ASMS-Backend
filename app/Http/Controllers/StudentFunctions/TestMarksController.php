<?php

namespace App\Http\Controllers\StudentFunctions;
use App\Models\TestMarks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestMarksController extends Controller
{
    public function index()
    {
        $marks = TestMarks::with(['test', 'class', 'subject', 'student'])->get();

        if ($marks->isEmpty()) {
            return response()->json('No Test Marks found');
        }

        return response()->json($marks);
    }

    public function add(Request $request)
    {
        $mark = TestMarks::create(attributes: [
            'test_id' => $request->test_id,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'student_id' => $request->student_id,
            'marks_obtained' => $request->marks_obtained,
            'grade' => $request->grade,
            'remarks' => $request->remarks
        ]);

        return response()->json([
            'message' => 'Test mark added successfully',
            'assignment_mark' => $mark
        ]);
    }

    public function update(Request $request)
    {
        $mark = TestMarks::find($request->id);

        $mark->update([
            'marks_obtained' => $request->marks_obtained ?? $mark->marks_obtained,
            'grade' => $request->grade ?? $mark->grade,
            'remarks' => $request->remarks ?? $mark->remarks
        ]);

        return response()->json(['message' => 'Test mark updated successfully']);
    }

    public function delete(Request $request)
    {
        $mark = TestMarks::find($request->id);
        $mark->delete();

        return response()->json(['message' => 'Test mark deleted successfully']);
    }

}
