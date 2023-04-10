<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'user_id',
        'reply',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comment(){
        return $this->hasOne(Comment::class, 'id', 'comment_id');
    }

}
