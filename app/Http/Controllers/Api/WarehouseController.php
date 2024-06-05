<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExternalApiService;

class WarehouseController extends Controller
{
    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->externalApiService = $externalApiService;
    }

    public function index(Request $request)
    {
        $token = $request->bearerToken();

        // Получаем данные о складах из внешнего API через сервис
        $warehouses = $this->externalApiService->fetchWarehouses($token);

        // Возвращаем успешный ответ с данными
        return response()->json([
            'success' => true,
            'warehouses' => $warehouses
        ]);
    }

    // Метод для получения конкретного склада по ID
    public function show($id, Request $request)
    {
        
        $token = $request->bearerToken();
        $warehouse = $this->externalApiService->fetchWarehouseById($id, $token);

        return response()->json([
            'success' => true,
            'warehouse' => $warehouse
        ]);
    }

   
    public function store(Request $request)
    {
        
        $token = $request->bearerToken();
        $warehouseData = $request->all();
        $warehouse = $this->externalApiService->createWarehouse($warehouseData, $token);

      
        return response()->json([
            'success' => true,
            'warehouse' => $warehouse
        ]);
    }

    
    public function update($id, Request $request)
    {
        
        $token = $request->bearerToken();
        $warehouseData = $request->all();
        $warehouse = $this->externalApiService->updateWarehouse($id, $warehouseData, $token);

        return response()->json([
            'success' => true,
            'warehouse' => $warehouse
        ]);
    }

    
    public function destroy($id, Request $request)
    {
       
        $token = $request->bearerToken();

        // Удаляем склад через внешнее API через сервис
        $this->externalApiService->deleteWarehouse($id, $token);

        // Возвращаем успешный ответ
        return response()->json([
            'success' => true,
            'message' => 'Warehouse deleted successfully'
        ]);
    }
}
