<?php

namespace App\Http\Controllers\StudentFunctions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detention;

class StudentFunctionsController extends Controller
{
    //Detention
    public function get_student_detention(Request $request){
        $detentions = Detention::with("student")->where('student_id',$request->student_id );
        if ($detentions->isEmpty()) {
            return response()->json('No Detentions');
        }

        return response()->json($detentions);
    }

        public function add_detention(Request $request)
    {
        $detention = Detention::create([
            'student_id' => $request->student_id,
            'reason' => $request->reason,
            'duration' => $request->duration,
            'date' => $request->date,
            'parent_notified' => $request->parent_notified,
            'notes' => $request->notes
        ]);

        return response()->json([
            'message' => 'Detention added successfully',
            'detention' => $detention
        ]);
    }

        public function update_detention(Request $request)
    {
        $detention = Detention::find($request->id);
        $detention->update([
            'reason' => $request->reason ?? $detention->reason,
            'duration' => $request->duration ?? $detention->duration,
            'date' => $request->date ?? $detention->date,
            'parent_notified' => $request->parent_notified ?? $detention->parent_notified,
            'notes' => $request->notes ?? $detention->notes
        ]);

        return response()->json(['message' => 'Detention updated successfully']);
    }

        public function delete(Request $request)
    {
        $request->validate(['id' => 'required|exists:detentions,id']);

        $detention = Detention::find($request->id);
        $detention->delete();

        return response()->json(['message' => 'Detention deleted successfully']);
    }
}
