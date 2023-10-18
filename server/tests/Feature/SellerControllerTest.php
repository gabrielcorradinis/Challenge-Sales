<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\SellerService;
use App\Models\Seller;
use App\Repositories\SellerRepository;
use Mockery;

class SellerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_seller()
    {
        $sellerRepository = Mockery::mock(SellerRepository::class);
        $sellerService = new SellerService($sellerRepository);

        $data = [
            'name' => 'Test Seller', 
            'email' => 'test@example.com'
        ];

        $response = $this->post('/api/seller/create', $data);

        $response->assertStatus(201);
        $response->assertJsonStructure(['message', 'seller']);
    }

     /** @test */
     public function it_can_get_a_list_of_sellers()
     {
        $sellerRepository = Mockery::mock(SellerRepository::class);
        $sellerService = new SellerService($sellerRepository);
 
         $response = $this->get('/api/seller/list');
 
         $response->assertStatus(200);
         $response->assertJsonStructure(['sellers']);
     }
}
