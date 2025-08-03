<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function index()
    {
        $parents = Parents::with(['user', 'student'])->get();

        if ($parents->isEmpty()) {
            return response()->json('No Parents Available');
        }

        return response()->json($parents);
    }

    public function add(Request $request)
    {
        $parent = Parents::create([
            'user_id' => $request->user_id,
            'student_id' => $request->student_id,
        ]);

        return response()->json([
            'message' => 'Parent added successfully',
            'parent' => $parent
        ]);
    }

    public function update(Request $request)
    {
        $parent = Parents::find($request->id);
        $parent->update([
            'user_id' => $request->user_id ?? $parent->user_id,
            'student_id' => $request->student_id ?? $parent->student_id,
        ]);

        return response()->json(['message' => 'Parent updated successfully']);
    }

    public function delete(Request $request)
    {
        $parent = Parents::find($request->id);
        $parent->delete();

        return response()->json(['message' => 'Parent deleted successfully']);
    }
}
