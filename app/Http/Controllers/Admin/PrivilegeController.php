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
        $permissions = Permission::orderBy('permission_key')->get();
        return view('admin.layouts.pages.previlege.index', compact('permissions'));
    }

    // public function index(Request $request)
    // {
    //     $userId = $request->input('user_id');

    //     $user = $userId ? User::findOrFail($userId) : Auth::user();

    //     $userPermissions = $user->permissions()->pluck('permission_key')->toArray();

    //     $superAdminPermissions = $user->permissions()->where('assigned_by_type', 'Super_admin')->pluck('permission_key')->toArray();

    //     $permissions = Permission::orderBy('permission_key')->get();

    //     return view('admin.layouts.pages.previlege.index', compact('permissions', 'user', 'userPermissions', 'superAdminPermissions'));
    // }

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
    //     $loggedInUser = Auth::user();

    //     $user->permissions()->delete();

    //     foreach ($request->permissions as $perm) {
    //         $user->permissions()->create([
    //             'permission_key' => $perm,
    //             'assigned_by' => $loggedInUser->id,
    //             'assigned_by_type' => $loggedInUser->system_admin,
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

        $targetUser = User::findOrFail($request->user_id);
        $newPermissions = $request->permissions ?? [];
        $loggedInUser = Auth::user();

        $existingPermissions = $targetUser->permissions()->where('assigned_by', $loggedInUser->id)->pluck('permission_key')->toArray();

        $toAdd = array_diff($newPermissions, $existingPermissions);
        $toRemove = array_diff($existingPermissions, $newPermissions);

        foreach ($toAdd as $perm) {
            $targetUser->permissions()->updateOrCreate(
                [
                    'permission_key' => $perm,
                    'assigned_by' => $loggedInUser->id,
                    'assigned_by_type' => $loggedInUser->system_admin,
                ],
                [
                    'updated_at' => now(),
                ],
            );
        }

        if (!empty($toRemove)) {
            $targetUser->permissions()->where('assigned_by', $loggedInUser->id)->whereIn('permission_key', $toRemove)->delete();
        }

        return back()->with('success', 'Permissions saved/updated successfully.');
    }

    public function getUserPermissions($user_id)
    {
        $user = User::with('permissions')->findOrFail($user_id);
        $permissionKeys = $user->permissions->pluck('permission_key');
        return response()->json($permissionKeys);
    }
}
