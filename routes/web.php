<?php

use App\Http\Controllers\Admin\AdminTarikController;
use App\Http\Controllers\Admin\AdminTransferController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\BayarCicilanController;
use App\Http\Controllers\BayarCicilanLeasingController;
use App\Http\Controllers\DapurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PulsaController;
use App\Http\Controllers\SayurController;
use App\Http\Controllers\SetorTunaiController;
use App\Http\Controllers\TagihanListrikController;
use App\Http\Controllers\TarikTunaiController;
use App\Http\Controllers\TokenListrikController;
use App\Http\Controllers\TopupController;
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

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->middleware(['auth', 'verified'])->name('admin');

    //ADMIN TRANSFER
    Route::get('admin/transfer', [AdminTransferController::class, 'index']);
    Route::get('admin/transfer/create', [AdminTransferController::class, 'create']);
    Route::post('admin/transfer/store', [AdminTransferController::class, 'store']);
    Route::get('admin/transfer/edit/{id}', [AdminTransferController::class, 'edit']);
    Route::put('admin/transfer/{id}', [AdminTransferController::class, 'update']);
    Route::delete('admin/transfer/{id}', [AdminTransferController::class, 'destroy']);
    Route::get('admin/transfer/{id}', [AdminTransferController::class, 'show']);

    //ADMIN TARIK TUNAI
    Route::get('admin/tarik-tunai', [AdminTarikController::class, 'index']);
    Route::get('admin/tarik-tunai/create', [AdminTarikController::class, 'create']);
    Route::post('admin/tarik-tunai/store', [AdminTarikController::class, 'store']);
    Route::get('admin/tarik-tunai/edit/{id}', [AdminTarikController::class, 'edit']);
    Route::put('admin/tarik-tunai/{id}', [AdminTarikController::class, 'update']);
    Route::delete('admin/tarik-tunai/{id}', [AdminTarikController::class, 'destroy']);
    Route::get('admin/tarik-tunai/{id}', [AdminTarikController::class, 'show']);
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //INPUTAN TRANSFER
    Route::get('riwayat', function () {
        return view('riwayat.daftar-riwayat');
    });
    Route::get('transfer', function () {
        return view('transfer.add');
    });
    Route::get('riwayat/transfer', [TransferController::class, 'index']);
    Route::post('transfer', [TransferController::class, 'store']);
    Route::get('riwayat/transfer/{id}', [TransferController::class, 'show']);

    //INPUTAN TARIK TUNAI
    Route::get('tarik-tunai', function () {
        return view('tarik-tunai.add');
    });
    Route::get('riwayat/tarik-tunai', [TarikTunaiController::class, 'index']);
    Route::post('tarik-tunai', [TarikTunaiController::class, 'store']);
    Route::get('riwayat/tarik-tunai/{id}', [TarikTunaiController::class, 'show']);

    //INPUTAN SETOR TUNAI
    Route::get('setor-tunai', function () {
        return view('setor-tunai.add');
    });
    Route::get('riwayat/setor-tunai', [SetorTunaiController::class, 'index']);
    Route::post('setor-tunai', [SetorTunaiController::class, 'store']);
    Route::get('riwayat/setor-tunai/{id}', [SetorTunaiController::class, 'show']);

    //INPUTAN PULSA
    Route::get('pulsa', function () {
        return view('pulsa.add');
    });
    Route::get('riwayat/pulsa', [PulsaController::class, 'index']);
    Route::post('pulsa', [PulsaController::class, 'store']);
    Route::get('riwayat/pulsa/{id}', [PulsaController::class, 'show']);

    //INPUTAN PLN TOKEN LISTRIK
    Route::get('pln', function () {
        return view('pln.daftar-listrik');
    });
    Route::get('token-listrik', function () {
        return view('pln.token-listrik.add');
    });
    Route::get('riwayat/pln', function () {
        return view('riwayat.pln.pln-listrik');
    });
    Route::get('riwayat/token-listrik', [TokenListrikController::class, 'index']);
    Route::post('token-listrik', [TokenListrikController::class, 'store']);
    Route::get('riwayat/token-listrik/{id}', [TokenListrikController::class, 'show']);

    //INPUTAN PLN TAGIHAN LISTRIK
    Route::get('tagihan-listrik', function () {
        return view('pln.tagihan-listrik.add');
    });
    Route::get('riwayat/tagihan-listrik', [TagihanListrikController::class, 'index']);
    Route::post('tagihan-listrik', [TagihanListrikController::class, 'store']);
    Route::get('riwayat/tagihan-listrik/{id}', [TagihanListrikController::class, 'show']);

    //INPUTAN BAYAR CICILAN BANK
    Route::get('bayar-cicilan', function () {
        return view('cicilan.daftar-cicilan');
    });
    Route::get('bayar-cicilan-bank', function () {
        return view('cicilan.bank.add');
    });
    Route::get('riwayat/bayar-cicilan', function () {
        return view('riwayat.cicilan.daftar-cicilan');
    });
    Route::get('riwayat/bayar-cicilan-bank', [BayarCicilanController::class, 'index']);
    Route::post('bayar-cicilan-bank', [BayarCicilanController::class, 'store']);
    Route::get('riwayat/bayar-cicilan-bank/{id}', [BayarCicilanController::class, 'show']);

    //INPUTAN BAYAR CICILAN LEASING
    Route::get('bayar-cicilan-leasing', function () {
        return view('cicilan.leasing.add');
    });
    Route::get('riwayat/bayar-cicilan-leasing', [BayarCicilanLeasingController::class, 'index']);
    Route::post('bayar-cicilan-leasing', [BayarCicilanLeasingController::class, 'store']);
    Route::get('riwayat/bayar-cicilan-leasing/{id}', [BayarCicilanLeasingController::class, 'show']);

    //INPUTAN TOP UP 
    Route::get('topup', function () {
        return view('topup.add');
    });
    Route::get('riwayat/topup', [TopupController::class, 'index']);
    Route::post('topup', [TopupController::class, 'store']);
    Route::get('riwayat/topup/{id}', [TopupController::class, 'show']);

    //INPUTAN DAPUR
    Route::get('dapur', function () {
        return view('dapur.add');
    });
    Route::get('riwayat/dapur', [DapurController::class, 'index']);
    Route::get('dapur', [DapurController::class, 'create']);
    Route::get('riwayat/dapur/{id}', [DapurController::class, 'show']);

    //INPUTAN SAYUR
    Route::get('sayur', function () {
        return view('sayur.add');
    });
    Route::get('riwayat/sayur', [SayurController::class, 'index']);
    Route::get('riwayat/sayur/{id}', [SayurController::class, 'show']);

    //INPUTAN ASURANSI
    Route::get('asuransi', function () {
        return view('asuransi.add');
    });
    Route::get('riwayat/asuransi', [AsuransiController::class, 'index']);
    Route::post('asuransi', [AsuransiController::class, 'store']);
    Route::get('riwayat/asuransi/{id}', [AsuransiController::class, 'show']);
});


require __DIR__ . '/auth.php';
