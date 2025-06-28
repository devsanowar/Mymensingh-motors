<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    // একটি রোলে অনেক পারমিশন আছে
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    // একটি রোলে অনেক ইউজার আছে
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
