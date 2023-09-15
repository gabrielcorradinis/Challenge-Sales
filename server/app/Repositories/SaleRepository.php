<?php

namespace App\Repositories;
use App\Models\Sale;
use App\Models\Seller;

class SaleRepository
{

    public function storeSale(array $data): Sale 
    {

        return Sale::create($data);

    }

    public function listSale(int $sellerId) 
    {

        return Seller::with('sales')->FindOrFail($sellerId);

    }

}