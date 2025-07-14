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
        $permissions = Permission::all();
        return view('admin.layouts.pages.previlege.index', compact('permissions'));
    }

    public function getUsersByRole($role)
    {
        $users = User::whereRaw('LOWER(system_admin) = ?', [strtolower($role)])->get();
        return response()->json($users);
    }

    public function savePermissions(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'permissions' => 'array',
        ]);

        $user = User::findOrFail($request->user_id);

        $user->permissions()->delete();

        foreach ($request->permissions as $perm) {
            $user->permissions()->create([
                'permission_key' => $perm,
            ]);
        }

        return back()->with('success', 'Permissions updated successfully!');
    }

    public function getUserPermissions($user_id)
    {
        $user = User::with('permissions')->findOrFail($user_id);
        $permissionKeys = $user->permissions->pluck('permission_key');
        return response()->json($permissionKeys);
    }

    
}
