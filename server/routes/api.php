<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(SellerController::class)->prefix('seller')->group(function () {
    Route::post('/create', 'store');
    Route::get('/list', 'list');
});

Route::controller(SaleController::class)->prefix('sales')->group(function () {
    Route::post('/new-sale', 'store');
    Route::get('/{sellerId}', 'listSales');
});
