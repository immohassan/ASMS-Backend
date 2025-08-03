<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subjects::where('is_deleted', 0)->get();

        if ($subjects->isEmpty()) {
            return response()->json('No Subjects Available');
        }

        return response()->json($subjects);
    }

    public function add(Request $request)
    {
        $subject = Subjects::create([
            'name' => $request->name,
            'credit_hours' => $request->credit_hours,
            'is_deleted' => 0,
        ]);

        return response()->json([
            'message' => 'Subject added successfully',
            'subject' => $subject
        ]);
    }

    public function update(Request $request)
    {
        $subject = Subjects::find($request->id);

        $subject->update([
            'name' => $request->name ?? $subject->name,
            'credit_hours' => $request->credit_hours ?? $subject->credit_hours,
        ]);

        return response()->json(['message' => 'Subject updated successfully']);
    }

    public function delete(Request $request)
    {
        $subject = Subjects::find($request->id);
        $subject->update(['is_deleted' => 1]);

        return response()->json(['message' => 'Subject deleted successfully']);
    }
}
