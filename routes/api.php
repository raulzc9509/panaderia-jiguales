<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\InventoryApiController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    // Productos (requiere token)
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/products/low-stock', [ProductApiController::class, 'lowStock']);
    Route::get('/products/{product}', [ProductApiController::class, 'show']);

    // Productos (por ahora para probar; luego lo limitamos a ADMIN)
    Route::post('/products', [ProductApiController::class, 'store']);
    Route::put('/products/{product}', [ProductApiController::class, 'update']);
    Route::patch('/products/{product}/deactivate', [ProductApiController::class, 'deactivate']);

    Route::post('/inventory/movements', [InventoryApiController::class, 'storeMovement']);
});