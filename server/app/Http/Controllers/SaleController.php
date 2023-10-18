<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Seller;
use App\Services\SaleService;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Exceptions\SaleNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    /**
     * Store a new sale.
     *
     * @param SaleRequest $request
     * @return JsonResponse
     */
    public function store(SaleRequest $request): JsonResponse
    {

        $data = $this->saleService->store($request->toArray());

        return response()->json(['message' => 'Sale created successfully', 'Sale' => $data], 201);
        
    }

    /**
     * Show sales for a specific seller.
     *
     * @param int $sellerId
     * @return JsonResponse
     */
    public function show($sellerId)
    {
        try {
            $sales = $this->saleService->show($sellerId);
            return response()->json(['sales' => $sales], 200);
        } catch (SaleNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Seller not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
}