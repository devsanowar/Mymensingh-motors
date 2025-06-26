<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['super_admin', 'admin', 'editor', 'user', 'subscriber'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $permissions = ['manage_users', 'view_dashboard', 'edit_content', 'view_reports'];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superAdmin = Role::where('name', 'super_admin')->first();
        $superAdmin->permissions()->attach(Permission::pluck('id'));
    }
}
