<?php

namespace App\Http\Controllers\StudentFunctions;
use App\Models\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with(['class', 'student', 'subject'])->get();

        if ($attendance->isEmpty()) {
            return response()->json('No attendance records found');
        }

        return response()->json($attendance);
    }

    public function add(Request $request)
    {
        $attendance = Attendance::create([
            'class_id' => $request->class_id,
            'student_id' => $request->student_id,
            'subject_id' => $request->subject_id,
            'status' => $request->status,
            'sign_in' => $request->sign_in,
            'sign_out' => $request->sign_out,
            'picked_by' => $request->picked_by,
            'date' => $request->date,
            'notes' => $request->notes ?? null,
        ]);

        return response()->json([
            'message' => 'Attendance added successfully',
            'attendance' => $attendance
        ]);
    }

    public function update(Request $request)
    {
        $attendance = Attendance::find($request->id);

        $attendance->update([
            'class_id' => $request->class_id ?? $attendance->class_id,
            'student_id' => $request->student_id ?? $attendance->student_id,
            'subject_id' => $request->subject_id ?? $attendance->subject_id,
            'status' => $request->status ?? $attendance->status,
            'sign_in' => $request->sign_in ?? $request->sign_in,
            'sign_out' => $request->sign_out ?? $request->sign_out,
            'picked_by' => $request->picked_by ?? $request->picked_by,
            'dates' => $request->dates ?? $attendance->dates,
            'notes' => $request->notes ?? $attendance->notes,
        ]);

        return response()->json(['message' => 'Attendance updated successfully']);
    }

    public function delete(Request $request)
    {
        $attendance = Attendance::find($request->id);
        $attendance->delete();

        return response()->json(['message' => 'Attendance deleted successfully']);
    }

}
