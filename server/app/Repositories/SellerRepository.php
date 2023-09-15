<?php

namespace App\Repositories;

use App\Models\Seller;

class SellerRepository
{

    public function storeSaller(array $data): Seller 
    {

        return Seller::create($data);

    }

    public function listSaleers() 
    {

        return Seller::withSum('sales', 'commission')->get();

    }

}