<?php

namespace App\Models;

use App\Models\User;
use App\Models\Upazila;
use App\Models\District;
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

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'cancelled_at' => 'datetime',
    ];

    /**
     * Check if order can be cancelled
     */
    public function canBeCancelled()
    {
        return $this->status === 'pending';
    }
}
