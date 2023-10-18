<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $factory = SellerFactory::class;

    protected $table = 'sellers';

    protected $fillable = [
        'name',
        'email'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
