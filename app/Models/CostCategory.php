<?php

namespace App\Models;

use App\Models\Cost;
use Illuminate\Database\Eloquent\Model;

class CostCategory extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function costs(){
        return $this->hasMany(Cost::class, 'category_id');
    }
}
