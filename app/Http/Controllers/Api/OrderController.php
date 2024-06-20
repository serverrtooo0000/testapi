<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ExternalApiService;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class OrderController extends Controller
{
    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->externalApiService = $externalApiService;
    }

    public function index(Request $request)
    {
    
        $token = $request->bearerToken();
        $orders = $this->externalApiService->fetchOrders($token);

        return response()->json([
            'success' => true,
            'orders' => $orders
        ]);
    }

    public function show($id, Request $request)
    {
        // Получаем токен из запроса (здесь должна быть ваша логика для получения токена)
        $token = $request->bearerToken();

        // Получаем данные о конкретном заказе из внешнего API через сервис
        $order = $this->externalApiService->fetchOrderById($id, $token);

        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    public function store(Request $request)
    {
        // Получаем токен из запроса (здесь должна быть ваша логика для получения токена)
        $token = $request->bearerToken();

        // Данные для создания нового заказа
        $orderData = $request->all();

        // Создаем новый заказ через внешнее API через сервис
        $order = $this->externalApiService->createOrder($orderData, $token);

        // Возвращаем успешный ответ с данными
        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    // Метод для обновления существующего заказа
    public function update($id, Request $request)
    {
        // Получаем токен из запроса (здесь должна быть ваша логика для получения токена)
        $token = $request->bearerToken();

        // Данные для обновления заказа
        $orderData = $request->all();

        // Обновляем заказ через внешнее API через сервис
        $order = $this->externalApiService->updateOrder($id, $orderData, $token);

        // Возвращаем успешный ответ с данными
        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    // Метод для удаления заказа
    public function destroy($id, Request $request)
    {
        // Получаем токен из запроса (здесь должна быть ваша логика для получения токена)
        $token = $request->bearerToken();

        // Удаляем заказ через внешнее API через сервис
        $this->externalApiService->deleteOrder($id, $token);

        // Возвращаем успешный ответ
        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully'
        ]);
    }
}
