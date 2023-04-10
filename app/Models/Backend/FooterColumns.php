<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterColumns extends Model
{
    use HasFactory;

    protected $fillable = [
        'column',
        'title',
    ];
}
