<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\WarehouseController;
use App\Http\Controllers\Api\RevenueController;
use App\Http\Controllers\Api\MainController;



Route::middleware('auth:api')->group(function () {

    Route::get('/sales', [SaleController::class, 'index']);
    Route::get('/sales/{id}', [SaleController::class, 'show']);
    Route::post('/sales', [SaleController::class, 'store']);
    Route::put('/sales/{id}', [SaleController::class, 'update']);
    Route::delete('sales/{id}',[SaleController::class, 'destroy']);


    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::put('/orders/{id}', [OrderController::class, 'update']);
    Route::delete('orders/{id}',[OrderController::class, 'destroy']);


    Route::get('/warehouses', [WarehouseController::class, 'index']);
    Route::get('/warehouses/{id}', [WarehouseController::class, 'show']);
    Route::post('/warehouses', [WarehouseController::class, 'store']);
    Route::put('/warehouses/{id}', [WarehouseController::class, 'update']);
    Route::delete('warehouses/{id}',[WarehouseController::class, 'destroy']);


    Route::get('/revenues', [RevenueController::class, 'index']);
    Route::get('/revenues/{id}', [RevenueController::class, 'show']);
    Route::post('/revenues', [RevenueController::class, 'store']);
    Route::put('/revenues/{id}', [RevenueController::class, 'update']);
    Route::delete('revenues/{id}',[RevenueController::class, 'destroy']);


    Route::get('/mains', [MainController::class, 'index']);
    Route::get('/mains/{id}', [MainController::class, 'show']);
    Route::post('/mains', [MainController::class, 'store']);
    Route::put('/mains/{id}', [MainController::class, 'update']);
    Route::delete('mains/{id}',[MainController::class, 'destroy']);

});


Route::post('/register', [AuthController::class,'register']);
Route::post('/register', [AuthController::class,'login']);