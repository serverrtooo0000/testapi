<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ExternalApiService;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class SaleController extends Controller
{
    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->externalApiService = $externalApiService;
    }

    public function index()
    {
        $data = $this->externalApiService->getData('/sales');
        return response()->json($data);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = $this->externalApiService->postData('/sales', $request->all());
        return response()->json($response,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data = $this->externalApiService->getData("/sales/{$id}");
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
        
    public function update($id, Request $request)
    {
        // Получаем токен из запроса (здесь должна быть ваша логика для получения токена)
        $token = $request->bearerToken();

        // Данные для обновления продажи
        $saleData = $request->all();

        // Обновляем продажу через внешнее API через сервис
        $sale = $this->externalApiService->updateSale($id, $saleData, $token);

        return response()->json([
            'success' => true,
            'sale' => $sale
        ]);

    }

    public function destroy($id, Request $request)
    {

        $token = $request->bearerToken();
        $this->externalApiService->deleteSale($id, $token);

        return response()->json([
            'success' => true,
            'message' => 'Sale deleted successfully'
        ]);
    }


}