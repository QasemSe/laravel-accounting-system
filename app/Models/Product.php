<?php

namespace App\Models;

use App\Http\Traits\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory, Products;

    protected $fillable = [
        'name',
        'description',
        'sale_price',
        'purchase_price',
        'quantity',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function sales() {
        return $this->hasMany(Order::class);
    }

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
