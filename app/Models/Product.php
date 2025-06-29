<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\StockLog;
use App\Models\ProductUnit;
use App\Models\ProductStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(ProductUnit::class);
    }

    public function stock()
    {
        return $this->hasOne(ProductStock::class);
    }

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
