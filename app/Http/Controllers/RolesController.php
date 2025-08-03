<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all()->where("is_deleted", 0);
        if ($roles)
            return response()->json($roles);

        return "No Roles Available";
    }

    public function add(Request $request)
    {
        $role = Roles::create([
            'name' => $request->input('name'),
            'permission_level' => $request->input('permission_level'),
            'is_deleted' => 0,
        ]);

        return response()->json([
            'message' => 'Role created successfully'
        ]);
    }

    public function update(Request $request)
    {
        $role = Roles::find($request->input("id"));
        if (!$role || $role->is_deleted) {
            return response()->json(['error' => 'Role not found'], 404);
        }
        $role->update([
            'name' => $request->name,
            'permission_level' => $request->permission_level,
        ]);
        return response()->json(['message' => 'Role updated successfully']);
    }

    public function delete(Request $request)
    {
        $role = Roles::find($request->input("id"));
        if (!$role || $role->is_deleted) {
            return response()->json(['error' => 'Role not found'], 404);
        }
        $role->update(['is_deleted' => 1]);
        return response()->json(['message' => 'Role deleted successfully']);
    }

}
