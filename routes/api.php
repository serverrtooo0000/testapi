<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', [ApiCategoryController::class, 'api_index']);
Route::post('/category', [ApiCategoryController::class, 'api_show']);
Route::get('/category{category}', [ApiCategoryController::class, 'api_store']);
Route::put('/category/{id}', [ApiCategoryController::class, 'update']);
Route::delete('/category/{category}', [ApiCategoryController::class, 'destroy']);


