<?php

namespace App\Models;

use App\Models\Backend\Cart;
use App\Models\Backend\Product;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'state',
        'city',
        'codePost',
        'phoneMain',
        'phone',
        'email',
        'description',
        'pay',
        'agree',
        'tracking_no',
        'total_price',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function order_item(){
        return $this->hasMany(OrderItem::class);
    } 
}
