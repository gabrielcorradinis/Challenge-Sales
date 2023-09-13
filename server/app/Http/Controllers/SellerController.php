<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Services\SellerService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SellerController extends Controller
{
    protected $sellerService;

    public function __construct(SellerService $sellerService)
    {

        $this->sellerService = $sellerService;

    }
    public function store(Request $request) 
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $data = $this->sellerService->storeSeller($request->toArray());

        return response()->json(['message' => 'Seller created successfully', 'seller' => $data], 201);

    }

    public function list() 
    {

        $sellers = $this->sellerService->listSellers();

        return response()->json(['sellers' => $sellers], 200);
        
    }
}
