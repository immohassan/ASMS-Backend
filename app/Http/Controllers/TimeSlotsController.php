<?php
namespace App\Http\Controllers;

use App\Models\TimeSlots;
use Illuminate\Http\Request;

class TimeSlotsController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlots::all();

        if ($timeSlots->isEmpty()) {
            return response()->json('No Time Slots Available');
        }

        return response()->json($timeSlots);
    }

    public function add(Request $request)
    {
        $timeSlot = TimeSlots::create([
            'name'       => $request->name,
            'start_time' => $request->start_time,
            'end_time'   => $request->end_time,
            'duration'   => $request->duration
        ]);

        return response()->json([
            'message' => 'Time slot added successfully',
            'time_slot' => $timeSlot
        ]);
    }

    public function update(Request $request)
    {
        $timeSlot = TimeSlots::find($request->id);

        $timeSlot->update([
            'name'       => $request->name       ?? $timeSlot->name,
            'start_time' => $request->start_time ?? $timeSlot->start_time,
            'end_time'   => $request->end_time   ?? $timeSlot->end_time,
            'duration'   => $request->duration   ?? $timeSlot->duration
        ]);

        return response()->json(['message' => 'Time slot updated successfully']);
    }

    public function delete(Request $request)
    {
        $timeSlot = TimeSlots::find($request->id);

        $timeSlot->delete();

        return response()->json(['message' => 'Time slot deleted successfully']);
    }
}
