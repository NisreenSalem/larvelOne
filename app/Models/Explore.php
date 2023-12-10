<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explore extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'exp_from',
        'exp_to',
        'image',
        'rate',
        'price'
    ];
}
