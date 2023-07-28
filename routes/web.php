<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PulsaController;
use App\Http\Controllers\SetorTunaiController;
use App\Http\Controllers\TarikTunaiController;
use App\Http\Controllers\TokenListrikController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Transfer
Route::get('/daftar-transfer', function () {
    return view('components.transfer.list-bank');
});

Route::get('/transfer-bri', function () {
    return view('components.transfer.transfer-bri');
});

Route::get('/transfer-bca', function () {
    return view('components.transfer.transfer-bca');
});

Route::get('/transfer-bni', function () {
    return view('components.transfer.transfer-bni');
});

Route::get('/transfer-mandiri', function () {
    return view('components.transfer.transfer-mandiri');
});

// Tarik Tunai
Route::get('/daftar-tarik-tunai', function () {
    return view('components.tarik-tunai.daftar-bank');
});

Route::get('/tarik-tunai-bri', function () {
    return view('components.tarik-tunai.bri');
});

Route::get('/tarik-tunai-bca', function () {
    return view('components.tarik-tunai.bca');
});

Route::get('/tarik-tunai-bni', function () {
    return view('components.tarik-tunai.bni');
});

Route::get('/tarik-tunai-mandiri', function () {
    return view('components.tarik-tunai.mandiri');
});

// Setor Tunai
Route::get('/daftar-setor-tunai', function () {
    return view('components.setor-tunai.daftar-bank');
});

Route::get('/setor-tunai-bri', function () {
    return view('components.setor-tunai.bri');
});

Route::get('/setor-tunai-bca', function () {
    return view('components.setor-tunai.bca');
});

Route::get('/setor-tunai-bni', function () {
    return view('components.setor-tunai.bni');
});

Route::get('/setor-tunai-mandiri', function () {
    return view('components.setor-tunai.mandiri');
});

//Bayar Ciciclan
Route::get('/daftar-bayar-cicilan', function () {
    return view('components.bayar-cicilan.bayar');
});

Route::get('/bayar-cicilan-bank', function () {
    return view('components.bayar-cicilan.daftar-bank');
});

Route::get('/bayar-cicilan-leasing', function () {
    return view('components.bayar-cicilan.daftar-leasing');
});



//INPUTAN TRANSFER
Route::get('riwayat', function() {
    return view('riwayat.daftar-riwayat');
});
Route::get('transfer', function() {
    return view('transfer.add');
});
Route::get('riwayat/transfer', [TransferController::class, 'index']);
Route::post('transfer', [TransferController::class, 'store']);
Route::get('riwayat/transfer/{id}', [TransferController::class, 'show']);

//INPUTAN TARIK TUNAI
Route::get('tarik-tunai', function() {
    return view('tarik-tunai.add');
});
Route::get('riwayat/tarik-tunai', [TarikTunaiController::class, 'index']);
Route::post('tarik-tunai', [TarikTunaiController::class, 'store']);
Route::get('riwayat/tarik-tunai/{id}', [TarikTunaiController::class, 'show']);

//INPUTAN SETOR TUNAI
Route::get('setor-tunai', function() {
    return view('setor-tunai.add');
});
Route::get('riwayat/setor-tunai', [SetorTunaiController::class, 'index']);
Route::post('setor-tunai', [SetorTunaiController::class, 'store']);
Route::get('riwayat/setor-tunai/{id}', [SetorTunaiController::class, 'show']);

//INPUTAN PULSA
Route::get('pulsa', function() {
    return view('pulsa.add');
});
Route::get('riwayat/pulsa', [PulsaController::class, 'index']);
Route::post('pulsa', [PulsaController::class, 'store']);
Route::get('riwayat/pulsa/{id}', [PulsaController::class, 'show']);

//INPUTAN PLN TOKENLISTRIK
Route::get('pln', function() {
    return view('pln.daftar-listrik');
});
Route::get('token-listrik', function() {
    return view('pln.token-add');
});
Route::get('riwayat/token-listrik', [TokenListrikController::class, 'index']);
Route::post('token-listrik', [TokenListrikController::class, 'store']);