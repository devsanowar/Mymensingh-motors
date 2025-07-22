<?php

namespace App\Models;

use App\Models\FieldOfIncome;
use App\Models\IncomeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(IncomeCategory::class, 'category_id');
    }

    public function field()
    {
        return $this->belongsTo(FieldOfIncome::class, 'field_id');
    }
}
