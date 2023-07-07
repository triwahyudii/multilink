<?php

use App\Http\Controllers\Api\TransferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('transfer', [TransferController::class, 'index']);
// Route::get('transfer/{id}', [TransferController::class, 'show']);
// Route::post('transfer', [TransferController::class, 'store']);
// Route::put('transfer/{id}', [TransferController::class, 'update']);
// Route::delete('transfer/{id}', [TransferController::class, 'destroy']);

Route::apiResource('transfer', TransferController::class);