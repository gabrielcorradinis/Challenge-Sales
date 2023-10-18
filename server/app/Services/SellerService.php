<?php

namespace App\Services;

use App\Repositories\SellerRepository;
use App\Models\Seller;

class SellerService
{
    protected $sellerRepository;

    public function __construct(SellerRepository $sellerRepository)
    {

        $this->sellerRepository = $sellerRepository;
        
    }

    /**
     * Store a new seller.
     *
     * @param array $data
     * @return Seller
     */
    public function store(array $data): Seller 
    {

        return $this->sellerRepository->store($data);

    }
    
    /**
     * Get a list of sellers with sales commission sum.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index() 
    {

        return $this->sellerRepository->index();

    }

}