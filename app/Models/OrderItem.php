<?php

namespace App\Models;

use App\Models\Backend\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'count',
        'price',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
