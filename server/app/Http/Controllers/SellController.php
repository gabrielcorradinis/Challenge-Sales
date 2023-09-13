<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Seller;
use App\Services\SellService;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class SellController extends Controller
{
    protected $sellService;

    public function __construct(SellService $sellService)
    {
        $this->sellService = $sellService;
    }
    public function store(Request $request){

        $this->validate($request, [
            'seller_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'amount' => 'required'
        ]);
        
        $data = $this->sellService->storeSell($request->toArray());

        return response()->json(['message' => 'Sell created successfully', 'sell' => $data], 201);
        
    }

    public function listSales($sellerId)
    {

        $sales = $this->sellService->listSell($sellerId);

        return response()->json(['sales' => $sales], 200);
    }
}