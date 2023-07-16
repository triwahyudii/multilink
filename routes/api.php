<?php

use App\Http\Controllers\Api\AsuransiController;
use App\Http\Controllers\Api\BayarCicilanController;
use App\Http\Controllers\Api\BayarCicilanLeasingController;
use App\Http\Controllers\Api\PulsaController;
use App\Http\Controllers\Api\SetorTunaiController;
use App\Http\Controllers\Api\TagihanListrikController;
use App\Http\Controllers\Api\TarikTunaiController;
use App\Http\Controllers\Api\TokenListrikController;
use App\Http\Controllers\Api\TopupController;
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

// Route::get('bayar-cicilan-bank', [BayarCicilanController::class, 'index']);
// Route::get('bayar-cicilan-bank/{id}', [BayarCicilanController::class, 'show']);
// Route::post('bayar-cicilan-bank', [BayarCicilanController::class, 'store']);
// Route::put('bayar-cicilan-bank/{id}', [BayarCicilanController::class, 'update']);
// Route::delete('bayar-cicilan-bank/{id}', [BayarCicilanController::class, 'destroy']);

Route::apiResource('bayar-ciciclan-bank', BayarCicilanController::class);

// Route::get('bayar-cicilan-leasing', [BayarCicilanLeasingController::class, 'index']);
// Route::get('bayar-cicilan-leasing/{id}', [BayarCicilanLeasingController::class, 'show']);
// Route::post('bayar-cicilan-leasing', [BayarCicilanLeasingController::class, 'store']);
// Route::put('bayar-cicilan-leasing/{id}', [BayarCicilanLeasingController::class, 'update']);
// Route::delete('bayar-cicilan-leasing/{id}', [BayarCicilanLeasingController::class, 'destroy']);

Route::apiResource('bayar-cicilan-leasing', BayarCicilanLeasingController::class);

// Route::get('pulsa', [PulsaController::class, 'index']);
// Route::get('pulsa/{id}', [PulsaController::class, 'show']);
// Route::post('pulsa', [PulsaController::class, 'store']);
// Route::put('pulsa/{id}', [PulsaController::class, 'update']);
// Route::delete('pulsa/{id}', [PulsaController::class, 'destroy']);

Route::apiResource('pulsa', PulsaController::class);

// Route::get('token-listrik', [TokenListrikController::class, 'index']);
// Route::get('token-listrik/{id}', [TokenListrikController::class, 'show']);
// Route::post('token-listrik', [TokenListrikController::class, 'store']);
// Route::put('token-listrik/{id}', [TokenListrikController::class, 'update']);
// Route::delete('token-listrik/{id}', [TokenListrikController::class, 'destroy']);

Route::apiResource('token-listrik', TokenListrikController::class);

// Route::get('tagihan-listrik', [TagihanListrikController::class, 'index']);
// Route::get('tagihan-listrik/{id}', [TagihanListrikController::class, 'show']);
// Route::post('tagihan-listrik', [TagihanListrikController::class, 'store']);
// Route::put('tagihan-listrik/{id}', [TagihanListrikController::class, 'update']);
// Route::delete('tagihan-listrik/{id}', [TagihanListrikController::class, 'destroy']);

Route::apiResource('tagihan-listrik', TagihanListrikController::class);

// Route::get('topup', [TopupController::class, 'index']);
// Route::get('topup/{id}', [TopupController::class, 'show']);
// Route::post('topup', [TopupController::class, 'store']);
// Route::put('topup/{id}', [TopupController::class, 'update']);
// Route::delete('topup/{id}', [TopupController::class, 'destroy']);

Route::apiResource('topup', TopupController::class);

Route::get('asuransi', [AsuransiController::class, 'index']);
Route::get('asuransi/{id}', [AsuransiController::class, 'show']);
Route::post('asuransi', [AsuransiController::class, 'store']);