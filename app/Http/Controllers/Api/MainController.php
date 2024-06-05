<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ExternalApiService;

class MainController extends Controller
{
    protected $externalApiService; 
    public function __construct(ExternalApiService $externalApiService) 
    { 
        $this->externalApiService = $externalApiService; 
    } 
    public function getAllData(Request $request) 
    {
        $token = $request->bearerToken();  
        $sales = $this->externalApiService->fetchSales($token);  
        $orders = $this->externalApiService->fetchOrders($token);   
        $warehouses = $this->externalApiService->fetchWarehouses($token);   
        $revenues = $this->externalApiService->fetchRevenues($token); 
        return response()->json([ 
            'success' => true, 
            'sales' => $sales, 
            'orders' => $orders, 
            'warehouses' => $warehouses, 
            'revenues' => $revenues 
        ]); 
    }
} 
