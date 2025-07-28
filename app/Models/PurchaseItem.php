<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $guarded = ['id'];

    // Each purchase item belongs to a Purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    // Each purchase item is linked to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
