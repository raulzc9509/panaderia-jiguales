<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'unit',
    'price',
    'stock',
    'stock_min',
    'active',
];

}
