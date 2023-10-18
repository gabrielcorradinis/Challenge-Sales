<?php

namespace App\Services;

use App\Repositories\SaleRepository;
use App\Models\Sale;

class SaleService
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    /**
     * Store a new sale.
     *
     * @param array $data
     * @return Sale
     */
    public function store(array $data): Sale {

        $data['commission'] = $this->getCommissionValue($data['amount']);

        return $this->saleRepository->store($data);

    }

    /**
     * Calculate and return the commission value.
     *
     * @param float $salesValue
     * @return float
     */
    public function getCommissionValue(float $salesValue): float {

        return $salesValue * 0.085;

    }

    /**
     * Get sales for a specific seller.
     *
     * @param int $sellerId
     * @return Seller
     */
    public function show(int $sellerId) {

        return $this->saleRepository->show($sellerId);

    }

}
