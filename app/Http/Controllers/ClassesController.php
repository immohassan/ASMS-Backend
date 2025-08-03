<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::with('subjects')->where('is_deleted', 0)->get();
        if ($classes->isEmpty()) {
            return response()->json('No Classes Available');
        }

        return response()->json($classes);
    }

    public function add(Request $request)
    {
        $class = Classes::create([
            'name' => $request->name,
            'is_deleted' => 0,
        ]);

        if ($request->filled('subject_ids')) {
    $class->subjects()->sync(explode(',', $request->subject_ids));
}

        return response()->json([
            'message' => 'Class added successfully',
            'class' => $class
        ]);
    }

    public function update(Request $request)
    {
        $class = Classes::find($request->id);

        $class->update([
            'name' => $request->name ?? $class->name,
            'subject_ids' => $request->subject_ids ?? $class->subject_ids,
        ]);

        return response()->json(['message' => 'Class updated successfully']);
    }

    public function delete(Request $request)
    {
        $class = Classes::find($request->id);
        $class->update(['is_deleted' => 1]);

        return response()->json(['message' => 'Class deleted successfully']);
    }
}
