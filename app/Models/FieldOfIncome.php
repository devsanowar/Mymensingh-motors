<?php

namespace App\Models;

use App\Models\Income;
use Illuminate\Database\Eloquent\Model;

class FieldOfIncome extends Model
{
    protected $guarded = ['id'];

    public function incomes(){
        return $this->hasMany(Income::class, 'field_id');
    }
}
