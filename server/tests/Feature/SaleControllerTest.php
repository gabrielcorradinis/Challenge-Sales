<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use App\Services\SaleService;
use App\Repositories\SaleRepository;
use App\Models\Sale;
use App\Models\Seller;

class SaleServiceTest extends TestCase
{
    public function testStoreMethod()
    {
        // Mock SaleRepository
        $saleRepository = $this->createMock(SaleRepository::class);
        $saleRepository->expects($this->once())
            ->method('store')
            ->willReturn(new Sale());

        // Create SaleService instance with the mocked SaleRepository
        $saleService = new SaleService($saleRepository);

        // Test the store method
        $data = [
            'amount' => 100.0,
        ];
        $result = $saleService->store($data);

        $this->assertInstanceOf(Sale::class, $result);
    }

    public function testGetCommissionValueMethod()
    {
        // Create SaleService instance
        $saleService = new SaleService(new SaleRepository());

        // Test the getCommissionValue method
        $salesValue = 100.0;
        $commission = $saleService->getCommissionValue($salesValue);

        $this->assertEquals(8.5, $commission); // Assuming a commission rate of 8.5%
    }

    public function testShowMethod()
    {
        // Mock SaleRepository
        $saleRepository = $this->createMock(SaleRepository::class);
        $sellerId = 1;
        $saleRepository->expects($this->once())
            ->method('show')
            ->with($sellerId)
            ->willReturn(new Seller()); // Assuming you have a Seller model

        // Create SaleService instance with the mocked SaleRepository
        $saleService = new SaleService($saleRepository);

        // Test the show method
        $result = $saleService->show($sellerId);

        $this->assertInstanceOf(Seller::class, $result);
    }
}
