<?php

namespace App\Repositories;
use App\Models\Sale;
use App\Models\Seller;

class SaleRepository
{

    /**
     * Store a new sale.
     *
     * @param array $data
     * @return Sale
     */
    public function store(array $data): Sale 
    {

        return Sale::create($data);

    }

    /**
     * Get sales for a specific seller.
     *
     * @param int $sellerId
     * @return Seller
     */
    public function show(int $sellerId) 
    {

        return Seller::with('sales')->FindOrFail($sellerId);

    }

}