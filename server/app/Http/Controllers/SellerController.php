<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Services\SellerService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SellerRequest;
use App\Exceptions\SellerNotFoundException;

class SellerController extends Controller
{
    protected $sellerService;

    public function __construct(SellerService $sellerService)
    {

        $this->sellerService = $sellerService;

    }
    
    /**
     * Store a new seller.
     *
     * @param SellerRequest $request
     * @return JsonResponse
     */
    public function store(SellerRequest $request): JsonResponse
    {

        $data = $this->sellerService->store($request->toArray());

        return response()->json(['message' => 'Seller created successfully', 'seller' => $data], 201);

    }

    /**
     * Get a list of sellers.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {

        try {
            $sellers = $this->sellerService->index();
            return response()->json(['sellers' => $sellers], 200);
        } catch (SellerNotFoundException $e) {
            return response()->json(['error' => 'Sellers not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
        
    }
}
