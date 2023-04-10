<?php

namespace App\Models\Backend;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'storage',
        'cover_1',
        'cover_2',
        'price',
        'sale',
        'category_id',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function category(){
        return $this->hasMany(Category::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

}
