<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_description',
        'product_price',
        'product_stock',
        'product_category',
        'product_image',
        'product_min_order',
        'product_unit',
        'product_tags',
    ];
}
