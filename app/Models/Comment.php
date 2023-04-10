<?php

namespace App\Models;

use App\Models\Backend\Product;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
        'rating',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
