<?php

namespace App\Http\Controllers\ClassFunctions;
use App\Models\ExamSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    public function index()
    {
        $schedules = ExamSchedule::all();

        if ($schedules->isEmpty()) {
            return response()->json('No Exam Schedules Available');
        }

        return response()->json($schedules);
    }

    public function add(Request $request)
    {
        $schedule = ExamSchedule::create([
            'class_id'    => $request->class_id,
            'subject_ids' => json_encode($request->subject_ids),
            'time_slots'  => json_encode($request->time_slots),
            'day'         => $request->day,
            'teacher_ids' => json_encode($request->teacher_ids)
        ]);

        return response()->json([
            'message'  => 'Exam schedule added successfully',
            'schedule' => $schedule
        ]);
    }

    public function update(Request $request)
    {
        $schedule = ExamSchedule::find($request->id);

        $schedule->update([
            'class_id'    => $request->class_id    ?? $schedule->class_id,
            'subject_ids' => $request->subject_ids ? json_encode($request->subject_ids) : $schedule->subject_ids,
            'time_slots'  => $request->time_slots  ? json_encode($request->time_slots)  : $schedule->time_slots,
            'day'         => $request->day         ?? $schedule->day,
            'teacher_ids' => $request->teacher_ids ? json_encode($request->teacher_ids) : $schedule->teacher_ids
        ]);

        return response()->json(['message' => 'Exam schedule updated successfully']);
    }

    public function delete(Request $request)
    {
        $schedule = ExamSchedule::find($request->id);

        $schedule->delete();

        return response()->json(['message' => 'Exam schedule deleted successfully']);
    }
}
