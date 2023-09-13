<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        'seller_id',
        'amount',
        'commission',
        'date',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
