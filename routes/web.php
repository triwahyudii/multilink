<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/daftar-bank', function () {
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
Route::get('/daftar-bank', function () {
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
Route::get('/daftar-bank', function () {
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
Route::get('/bayar-cicilan', function () {
    return view('components.bayar-cicilan.bayar');
});

Route::get('/bayar-cicilan-bank', function () {
    return view('components.bayar-cicilan.daftar-bank');
});

Route::get('/bayar-cicilan-leasing', function () {
    return view('components.bayar-cicilan.daftar-leasing');
});