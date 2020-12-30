<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\Sales;

class Invoice extends Model
{
    use HasFactory, Sales;

    protected $dates = ['invoiced_at', 'due_at'];

    protected $fillable = ['invoice_number', 'product_id', 'customer_id', 'quantity', 'price', 'total', 'profit', 'invoiced_at', 'due_at'];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
