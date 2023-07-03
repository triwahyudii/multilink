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

Route::get('/list-bank', function () {
    return view('components.bank.list-bank');
});

Route::get('/transfer-bri', function () {
    return view('components.bank.transfer-bri');
});

Route::get('/transfer-bca', function () {
    return view('components.bank.transfer-bca');
});

Route::get('/transfer-bni', function () {
    return view('components.bank.transfer-bni');
});

Route::get('/transfer-mandiri', function () {
    return view('components.bank.transfer-mandiri');
});