<?php

namespace App\Models;

use App\Models\User;
use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    public function orderItems()
    {
        return $this->hasMany(Orderitem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
