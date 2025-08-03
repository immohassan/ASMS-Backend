<?php

namespace App\Http\Controllers;
use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        $Departments = Departments::all()->where("is_deleted", 0);
        if ($Departments)
            return response()->json($Departments);

        return response()->json(['message' => 'No Departments Available']);
    }

    public function add(Request $request)
    {
        $Departments = Departments::create([
            'name' => $request->input('name'),
            'is_deleted' => 0,
        ]);

        return response()->json([
            'message' => 'Department created successfully'
        ]);
    }

    public function update(Request $request)
    {
        $Departments = Departments::find($request->input("id"));
        if (!$Departments || $Departments->is_deleted) {
            return response()->json(['error' => 'Department not found'], 404);
        }
        $Departments->update([
            'name' => $request->name,
        ]);
        return response()->json(['message' => 'Department updated successfully']);
    }

    public function delete(Request $request)
    {
        $Departments = Departments::find($request->input("id"));
        if (!$Departments || $Departments->is_deleted) {
            return response()->json(['error' => 'Department not found'], 404);
        }
        $Departments->update(['is_deleted' => 1]);
        return response()->json(['message' => 'Role deleted successfully']);
    }

}
