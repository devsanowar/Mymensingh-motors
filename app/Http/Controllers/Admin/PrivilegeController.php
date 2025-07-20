<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PrivilegeController extends Controller
{
    public function index()
    {
        // $superAdminIds = User::where('system_admin', 'Super_admin')->pluck('id');
        // $permissions = Permission::orderBy('permission_key')->get();
        $permissions = Permission::orderBy('permission_key')->get();
        return view('admin.layouts.pages.previlege.index', compact('permissions'));
    }

    public function getUsersByRole($role)
    {
        $users = User::whereRaw('LOWER(system_admin) = ?', [strtolower($role)])
            ->where('system_admin', '!=', 'Super_admin')
            ->get();

        return response()->json($users);
    }

    // public function savePermissions(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required',
    //         'permissions' => 'array',
    //     ]);

    //     $user = User::findOrFail($request->user_id);

    //     $user->permissions()->delete();

    //     foreach ($request->permissions as $perm) {
    //         $user->permissions()->create([
    //             'permission_key' => $perm,
    //             'assigned_by' => Auth::id(),
    //         ]);
    //     }

    //     return back()->with('success', 'Permissions updated successfully!');
    // }

    public function savePermissions(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'permissions' => 'array',
        ]);

        $user = User::findOrFail($request->user_id);
        $newPermissions = $request->permissions ?? [];

        $existingPermissions = $user->permissions()->pluck('permission_key')->toArray();

        $toAdd = array_diff($newPermissions, $existingPermissions);

        $toRemove = array_diff($existingPermissions, $newPermissions);

        foreach ($toAdd as $perm) {
            $user->permissions()->create([
                'permission_key' => $perm,
                'assigned_by' => Auth::id(),
            ]);
        }

        if (!empty($toRemove)) {
            $user->permissions()->whereIn('permission_key', $toRemove)->delete();
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
