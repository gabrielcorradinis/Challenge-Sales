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

    public function storeSale(array $data): Sale {

        $data['commission'] = $this->getCommissionValue($data['amount']);

        return $this->saleRepository->storeSale($data);

    }

    public function getCommissionValue(float $salesValue): float {

        return $salesValue * 0.085;

    }

    public function listSale(int $sellerId) {

        return $this->saleRepository->listSale($sellerId);

    }

}
