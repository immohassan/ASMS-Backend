<?php

namespace App\Http\Controllers\StudentFunctions;
use App\Models\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::with(['class', 'subject'])->get();

        if ($tests->isEmpty()) {
            return response()->json('No Tests found');
        }

        return response()->json($tests);
    }

    public function add(Request $request)
    {

        $test = Test::create([
            'title' => $request->title,
            'description' => $request->description,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'total_marks' => $request->total_marks,
            'due_date' => $request->due_date
        ]);

        return response()->json([
            'message' => 'Test created successfully',
            'test' => $test
        ]);
    }

    public function update(Request $request)
    {

        $test = Test::find($request->id);

        $test->update([
            'title' => $request->title ?? $test->title,
            'description' => $request->description ?? $test->description,
            'class_id' => $request->class_id ?? $test->class_id,
            'subject_id' => $request->subject_id ?? $test->subject_id,
            'total_marks' => $request->total_marks ?? $test->total_marks,
            'due_date' => $request->due_date ?? $test->due_date
        ]);

        return response()->json(['message' => 'Test updated successfully']);
    }

    public function delete(Request $request)
    {
        $test = Test::find($request->id);
        $test->delete();

        return response()->json(['message' => 'Test deleted successfully']);
    }

}
