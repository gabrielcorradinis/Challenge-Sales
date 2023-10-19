<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'modified', 'ean', 'is_kit', 'slug', 'ncm', 'activation_date', 'deactivation_date',
        'name', 'price', 'cost_price', 'dollar_cost_price', 'promotional_price', 'start_promotion', 'end_promotion',
        'brand', 'brand_id', 'model', 'weight', 'length', 'width', 'height', 'stock', 'category_id',
        'available', 'availability', 'reference', 'hot', 'release', 'additional_button', 'has_variation',
        'rating', 'count_rating', 'quantity_sold'
    ];
}
