<?php

namespace App\Models;

use App\Models\Cost;
use Illuminate\Database\Eloquent\Model;

class FieldOfCost extends Model
{
    protected $guarded = ['id'];

    public function cost(){
        return $this->hasMany(Cost::class);
    }
}
