<?php

namespace App\Http\Controllers\StudentFunctions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contributions;
class ContributionsController extends Controller
{
    public function index()
    {
        $contributions = Contributions::with(['student', 'method'])->get();

        if ($contributions->isEmpty()) {
            return response()->json('No Contributions Found');
        }

        return response()->json($contributions);
    }

    public function add(Request $request)
    {
        $contribution = Contributions::create([
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'method_id' => $request->method_id,
            'anonymous' => $request->anonymous ?? false,
            'date' => $request->date
        ]);

        return response()->json([
            'message' => 'Contribution added successfully',
            'contribution' => $contribution
        ]);
    }

    public function update(Request $request)
    {
        $contribution = Contributions::find($request->id);

        $contribution->update([
            'student_id' => $request->student_id ?? $contribution->student_id,
            'amount' => $request->amount ?? $contribution->amount,
            'method_id' => $request->method_id ?? $contribution->method_id,
            'anonymous' => $request->anonymous ?? $contribution->anonymous,
            'date' => $request->date ?? $contribution->date
        ]);

        return response()->json(['message' => 'Contribution updated successfully']);
    }

    public function delete(Request $request)
    {
        $contribution = Contributions::find($request->id);
        $contribution->delete();

        return response()->json(['message' => 'Contribution deleted successfully']);
    }

}
