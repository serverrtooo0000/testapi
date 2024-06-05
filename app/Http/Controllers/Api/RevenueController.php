<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExternalApiService;

class RevenueController extends Controller
{
    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->externalApiService = $externalApiService;
    }

    public function index(Request $request)
    {
        $token = $request->bearerToken();
        $revenues = $this->externalApiService->fetchRevenues($token);

        return response()->json([
            'success' => true,
            'revenues' => $revenues
        ]);
    }

    public function show($id, Request $request)
    {
        $token = $request->bearerToken();
        $revenue = $this->externalApiService->fetchRevenueById($id, $token);

        return response()->json([
            'success' => true,
            'revenue' => $revenue
        ]);
    }

    
    public function store(Request $request)
    {
        $token = $request->bearerToken();
        $revenueData = $request->all();
        $revenue = $this->externalApiService->createRevenue($revenueData, $token);

        return response()->json([
            'success' => true,
            'revenue' => $revenue
        ]);
    }

    
    public function update($id, Request $request)
    {
        
        $token = $request->bearerToken();
        $revenueData = $request->all();
        $revenue = $this->externalApiService->updateRevenue($id, $revenueData, $token);

        return response()->json([
            'success' => true,
            'revenue' => $revenue
        ]);
    }

    
    public function destroy($id, Request $request)
    {
       
        $token = $request->bearerToken();
        $this->externalApiService->deleteRevenue($id, $token);

        return response()->json([
            'success' => true,
            'message' => 'Revenue deleted successfully'
        ]);
    }
}
