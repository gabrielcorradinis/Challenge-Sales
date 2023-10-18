<?php

namespace App\Repositories;

use App\Models\Seller;

class SellerRepository
{

    /**
     * Store a new seller.
     *
     * @param array $data
     * @return Seller
     */
    public function store(array $data): Seller 
    {

        return Seller::create($data);

    }

    /**
     * Get a list of sellers with sales commission sum.
     *
     * @return Seller
     */
    public function index() 
    {

        return Seller::withSum('sales', 'commission')->get();

    }

}