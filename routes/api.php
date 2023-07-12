<?php

use App\Http\Controllers\Api\BayarCicilanController;
use App\Http\Controllers\Api\SetorTunaiController;
use App\Http\Controllers\Api\TarikTunaiController;
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

// Route::get('tarik-tunai', [TarikTunaiController::class, 'index']);
// Route::get('tarik-tunai/{id}', [TarikTunaiController::class, 'show']);
// Route::post('tarik-tunai', [TarikTunaiController::class, 'store']);
// Route::put('tarik-tunai/{id}', [TarikTunaiController::class, 'update']);
// Route::delete('tarik-tunai/{id}', [TarikTunaiController::class, 'destroy']);

Route::apiResource('tarik-tunai', TarikTunaiController::class);

// Route::get('setor-tunai', [SetorTunaiController::class, 'index']);
// Route::get('setor-tunai/{id}', [SetorTunaiController::class, 'show']);
// Route::post('setor-tunai', [SetorTunaiController::class, 'store']);
// Route::put('setor-tunai/{id}', [SetorTunaiController::class, 'update']);
// Route::delete('setor-tunai/{id}', [SetorTunaiController::class, 'destroy']);

Route::apiResource('setor-tunai', SetorTunaiController::class);

Route::get('bayar-cicilan', [BayarCicilanController::class, 'index']);
Route::get('bayar-cicilan/{id}', [BayarCicilanController::class, 'show']);
Route::post('bayar-cicilan', [BayarCicilanController::class, 'store']);