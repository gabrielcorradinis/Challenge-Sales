<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Seller;
use App\Services\SaleService;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }
    public function store(Request $request){

        $this->validate($request, [
            'seller_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'amount' => 'required'
        ]);
        
        $data = $this->saleService->storeSale($request->toArray());

        return response()->json(['message' => 'Sale created successfully', 'Sale' => $data], 201);
        
    }

    public function listSales($sellerId)
    {

        $sales = $this->saleService->listSale($sellerId);

        return response()->json(['sales' => $sales], 200);
    }
}