<?php
namespace App\Http\Controllers\ClassFunctions;
use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $schedules = ClassSchedule::all();

        if ($schedules->isEmpty()) {
            return response()->json('No Class Schedules Available');
        }

        return response()->json($schedules);
    }

    public function add(Request $request)
    {
        $schedule = ClassSchedule::create([
            'class_id'    => $request->class_id,
            'subject_ids' => json_encode($request->subject_ids),
            'time_slots'  => json_encode($request->time_slots),
            'day'         => $request->day,
            'teacher_ids' => json_encode($request->teacher_ids)
        ]);

        return response()->json([
            'message'  => 'Class schedule added successfully',
            'schedule' => $schedule
        ]);
    }

    public function update(Request $request)
    {
        $schedule = ClassSchedule::find($request->id);

        $schedule->update([
            'class_id'    => $request->class_id    ?? $schedule->class_id,
            'subject_ids' => $request->subject_ids ? json_encode($request->subject_ids) : $schedule->subject_ids,
            'time_slots'  => $request->time_slots  ? json_encode($request->time_slots)  : $schedule->time_slots,
            'day'         => $request->day         ?? $schedule->day,
            'teacher_ids' => $request->teacher_ids ? json_encode($request->teacher_ids) : $schedule->teacher_ids
        ]);

        return response()->json(['message' => 'Class schedule updated successfully']);
    }

    public function delete(Request $request)
    {
        $schedule = ClassSchedule::find($request->id);

        $schedule->delete();

        return response()->json(['message' => 'Class schedule deleted successfully']);
    }
}
