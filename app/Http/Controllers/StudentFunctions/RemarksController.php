<?php

namespace App\Http\Controllers\StudentFunctions;
use App\Models\Remarks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RemarksController extends Controller
{
    public function index()
    {
        $remarks = Remarks::with(['student', 'class'])->get();
        if ($remarks->isEmpty()) {
            return response()->json('No remarks found');
        }

        return response()->json($remarks);
    }

    public function add(Request $request)
    {
        $remark = Remarks::create([
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'remarks' => $request->remarks
        ]);

        return response()->json([
            'message' => 'Remark added successfully',
            'remark' => $remark
        ]);
    }

    public function update(Request $request)
    {
        $remark = Remarks::find($request->id);

        $remark->update([
            'remarks' => $request->remarks
        ]);

        return response()->json(['message' => 'Remark updated successfully']);
    }

    public function delete(Request $request)
    {
        $remark = Remarks::find($request->id);
        $remark->delete();

        return response()->json(['message' => 'Remark deleted successfully']);
    }
}
