<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivilegeController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('admin.layouts.pages.previlege.index', compact('roles', 'permissions'));
    }

public function getUsersByRole($roleId)
{
    $users = User::where('role_id', $roleId)->select('id', 'name')->get();

    return response()->json($users);
}

    public function getUserPermissions(User $user)
    {
        if (!$user->role) {
            return response()->json([]);
        }
        $permissions = $user->role->permissions->pluck('name');
        return response()->json($permissions);
    }

    public function updateUserPermission(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'permission' => 'required|string',
            'action' => 'required|in:attach,detach',
        ]);

        $user = User::findOrFail($request->user_id);
        $permissionName = $request->permission;

        $permission = Permission::where('name', $permissionName)->first();
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }

        $role = $user->role;
        if (!$role) {
            return response()->json(['message' => 'User has no role assigned'], 400);
        }

        if ($request->action === 'attach') {
            $role->permissions()->syncWithoutDetaching([$permission->id]);
        } else {
            $role->permissions()->detach($permission->id);
        }

        return response()->json(['message' => 'Permission updated successfully']);
    }
}
