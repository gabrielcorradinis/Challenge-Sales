<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TrayController;

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
    Route::get('/list', 'index');
});

Route::controller(SaleController::class)->prefix('sales')->group(function () {
    Route::post('/new-sale', 'store');
    Route::get('/{sellerId}', 'show');
});

Route::controller(TrayController::class)->prefix('tray')->group(function () {
    Route::post('/access-token', 'getAccessToken');
    Route::get('/get-products', 'getProducts');
    Route::get('/import-products', 'importProducts');
    Route::get('/get-import-products', 'getAndImportProducts');
});