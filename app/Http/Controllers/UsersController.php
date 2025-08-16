<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with(['role'])->where('is_deleted', 0)->get();

        if ($users->isEmpty()) {
            return response()->json('No Users Available');
        }

        return response()->json($users);
    }

    public function add(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
            'is_deleted' => 0,
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $request->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'role_id' => 'sometimes|integer',
        ]);

        $user = User::find($request->input('id'));

        if (!$user || $user->is_deleted) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $updateData = $request->only(['name', 'email', 'phone', 'address', 'role_id']);

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->input('password'));
        }

        $user->update($updateData);

        return response()->json(['message' => 'User updated successfully']);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required|integer']);

        $user = User::find($request->input('id'));

        if (!$user || $user->is_deleted) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update(['is_deleted' => 1]);

        return response()->json(['message' => 'User deleted successfully']);
    }
}
