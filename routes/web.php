<?php

use App\Http\Controllers\Admin\AdminAsuransiController;
use App\Http\Controllers\Admin\AdminBayarBank;
use App\Http\Controllers\Admin\AdminBayarLeasing;
use App\Http\Controllers\Admin\AdminDapurController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPulsaController;
use App\Http\Controllers\Admin\AdminSayurController;
use App\Http\Controllers\Admin\AdminSetorController;
use App\Http\Controllers\Admin\AdminTagihanListrikController;
use App\Http\Controllers\Admin\AdminTarikController;
use App\Http\Controllers\Admin\AdminTokenListrikController;
use App\Http\Controllers\Admin\AdminTopupController;
use App\Http\Controllers\Admin\AdminTransferController;
use App\Http\Controllers\Admin\AdminUserController;
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
    Route::get('export-transfer', [AdminTransferController::class, 'exportexcel'])->name('export.transfer');

    //ADMIN TARIK TUNAI
    Route::get('admin/tarik-tunai', [AdminTarikController::class, 'index']);
    Route::get('admin/tarik-tunai/create', [AdminTarikController::class, 'create']);
    Route::post('admin/tarik-tunai/store', [AdminTarikController::class, 'store']);
    Route::get('admin/tarik-tunai/edit/{id}', [AdminTarikController::class, 'edit']);
    Route::put('admin/tarik-tunai/{id}', [AdminTarikController::class, 'update']);
    Route::delete('admin/tarik-tunai/{id}', [AdminTarikController::class, 'destroy']);
    Route::get('admin/tarik-tunai/{id}', [AdminTarikController::class, 'show']);
    Route::get('export-tarik-tunai', [AdminTarikController::class, 'exportexcel'])->name('export.tarik-tunai');

    //ADMIN SETOR TUNAI
    Route::get('admin/setor-tunai', [AdminSetorController::class, 'index']);
    Route::get('admin/setor-tunai/create', [AdminSetorController::class, 'create']);
    Route::post('admin/setor-tunai/store', [AdminSetorController::class, 'store']);
    Route::get('admin/setor-tunai/edit/{id}', [AdminSetorController::class, 'edit']);
    Route::put('admin/setor-tunai/{id}', [AdminSetorController::class, 'update']);
    Route::delete('admin/setor-tunai/{id}', [AdminSetorController::class, 'destroy']);
    Route::get('admin/setor-tunai/{id}', [AdminSetorController::class, 'show']);
    Route::get('export-setor-tunai', [AdminSetorController::class, 'exportexcel'])->name('export.setor-tunai');

    //ADMIN BAYAR CICILAN BANK
    Route::get('admin/bayar-cicilan-bank', [AdminBayarBank::class, 'index']);
    Route::get('admin/bayar-cicilan-bank/create', [AdminBayarBank::class, 'create']);
    Route::post('admin/bayar-cicilan-bank/store', [AdminBayarBank::class, 'store']);
    Route::get('admin/bayar-cicilan-bank/edit/{id}', [AdminBayarBank::class, 'edit']);
    Route::put('admin/bayar-cicilan-bank/{id}', [AdminBayarBank::class, 'update']);
    Route::delete('admin/bayar-cicilan-bank/{id}', [AdminBayarBank::class, 'destroy']);
    Route::get('admin/bayar-cicilan-bank/{id}', [AdminBayarBank::class, 'show']);
    Route::get('export-bayar-cicilan-bank', [AdminBayarBank::class, 'exportexcel'])->name('export.bayar-cicilan-bank');

    //ADMIN BAYAR CICILAN LEASING
    Route::get('admin/bayar-cicilan-leasing', [AdminBayarLeasing::class, 'index']);
    Route::get('admin/bayar-cicilan-leasing/create', [AdminBayarLeasing::class, 'create']);
    Route::post('admin/bayar-cicilan-leasing/store', [AdminBayarLeasing::class, 'store']);
    Route::get('admin/bayar-cicilan-leasing/edit/{id}', [AdminBayarLeasing::class, 'edit']);
    Route::put('admin/bayar-cicilan-leasing/{id}', [AdminBayarLeasing::class, 'update']);
    Route::delete('admin/bayar-cicilan-leasing/{id}', [AdminBayarLeasing::class, 'destroy']);
    Route::get('admin/bayar-cicilan-leasing/{id}', [AdminBayarLeasing::class, 'show']);
    Route::get('export-bayar-cicilan-leasing', [AdminBayarLeasing::class, 'exportexcel'])->name('export.bayar-cicilan-leasing');

    //ADMIN PULSA
    Route::get('admin/pulsa', [AdminPulsaController::class, 'index']);
    Route::get('admin/pulsa/create', [AdminPulsaController::class, 'create']);
    Route::post('admin/pulsa/store', [AdminPulsaController::class, 'store']);
    Route::get('admin/pulsa/edit/{id}', [AdminPulsaController::class, 'edit']);
    Route::put('admin/pulsa/{id}', [AdminPulsaController::class, 'update']);
    Route::delete('admin/pulsa/{id}', [AdminPulsaController::class, 'destroy']);
    Route::get('admin/pulsa/{id}', [AdminPulsaController::class, 'show']);
    Route::get('export-pulsa', [AdminPulsaController::class, 'exportexcel'])->name('export.pulsa');

    //ADMIN TAGIHAN LISTRIK
    Route::get('admin/tagihan-listrik', [AdminTagihanListrikController::class, 'index']);
    Route::get('admin/tagihan-listrik/create', [AdminTagihanListrikController::class, 'create']);
    Route::post('admin/tagihan-listrik/store', [AdminTagihanListrikController::class, 'store']);
    Route::get('admin/tagihan-listrik/edit/{id}', [AdminTagihanListrikController::class, 'edit']);
    Route::put('admin/tagihan-listrik/{id}', [AdminTagihanListrikController::class, 'update']);
    Route::delete('admin/tagihan-listrik/{id}', [AdminTagihanListrikController::class, 'destroy']);
    Route::get('admin/tagihan-listrik/{id}', [AdminTagihanListrikController::class, 'show']);
    Route::get('export-tagihan-listrik', [AdminTagihanListrikController::class, 'exportexcel'])->name('export.tagihan-listrik');

    //ADMIN TOKEN LISTRIK
    Route::get('admin/token-listrik', [AdminTokenListrikController::class, 'index']);
    Route::get('admin/token-listrik/create', [AdminTokenListrikController::class, 'create']);
    Route::post('admin/token-listrik/store', [AdminTokenListrikController::class, 'store']);
    Route::get('admin/token-listrik/edit/{id}', [AdminTokenListrikController::class, 'edit']);
    Route::put('admin/token-listrik/{id}', [AdminTokenListrikController::class, 'update']);
    Route::delete('admin/token-listrik/{id}', [AdminTokenListrikController::class, 'destroy']);
    Route::get('admin/token-listrik/{id}', [AdminTokenListrikController::class, 'show']);
    Route::get('export-token-listrik', [AdminTokenListrikController::class, 'exportexcel'])->name('export.token-listrik');

    //ADMIN TOPUP
    Route::get('admin/topup', [AdminTopupController::class, 'index']);
    Route::get('admin/topup/create', [AdminTopupController::class, 'create']);
    Route::post('admin/topup/store', [AdminTopupController::class, 'store']);
    Route::get('admin/topup/edit/{id}', [AdminTopupController::class, 'edit']);
    Route::put('admin/topup/{id}', [AdminTopupController::class, 'update']);
    Route::delete('admin/topup/{id}', [AdminTopupController::class, 'destroy']);
    Route::get('admin/topup/{id}', [AdminTopupController::class, 'show']);
    Route::get('export-topup', [AdminTopupController::class, 'exportexcel'])->name('export.topup');

    //ADMIN ASURANSI
    Route::get('admin/asuransi', [AdminAsuransiController::class, 'index']);
    Route::get('admin/asuransi/create', [AdminAsuransiController::class, 'create']);
    Route::post('admin/asuransi/store', [AdminAsuransiController::class, 'store']);
    Route::get('admin/asuransi/edit/{id}', [AdminAsuransiController::class, 'edit']);
    Route::put('admin/asuransi/{id}', [AdminAsuransiController::class, 'update']);
    Route::delete('admin/asuransi/{id}', [AdminAsuransiController::class, 'destroy']);
    Route::get('admin/asuransi/{id}', [AdminAsuransiController::class, 'show']);
    Route::get('export-asuransi', [AdminAsuransiController::class, 'exportexcel'])->name('export.asuransi');

    //ADMIN DAPUR
    Route::get('admin/dapur', [AdminDapurController::class, 'index']);
    Route::get('admin/dapur/create', [AdminDapurController::class, 'create']);
    Route::post('admin/dapur/store', [AdminDapurController::class, 'store']);
    Route::get('admin/dapur/edit/{id}', [AdminDapurController::class, 'edit']);
    Route::put('admin/dapur/{id}', [AdminDapurController::class, 'update']);
    Route::delete('admin/dapur/{id}', [AdminDapurController::class, 'destroy']);
    Route::get('admin/dapur/{id}', [AdminDapurController::class, 'show']);

    //ADMIN SAYUR
    Route::get('admin/sayur', [AdminSayurController::class, 'index']);
    Route::get('admin/sayur/create', [AdminSayurController::class, 'create']);
    Route::post('admin/sayur/store', [AdminSayurController::class, 'store']);
    Route::get('admin/sayur/edit/{id}', [AdminSayurController::class, 'edit']);
    Route::put('admin/sayur/{id}', [AdminSayurController::class, 'update']);
    Route::delete('admin/sayur/{id}', [AdminSayurController::class, 'destroy']);
    Route::get('admin/sayur/{id}', [AdminSayurController::class, 'show']);

    // ORDER
    Route::get('admin/order', [AdminOrderController::class, 'index']);
    // Route::post('admin/store-order', [AdminOrderController::class, 'store'])->name('store.order');

    //CHART USER
    Route::get('admin', [AdminUserController::class, 'index']);
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
    Route::get('dapur/{id}', [DapurController::class, 'show']);
    Route::get('cart/', [DapurController::class, 'cartProduct']); //Melihat semua total produk yang di Order
    Route::get('cart/{id}', [DapurController::class, 'cart']); //Memasukan produk ke Keranjang(Cart)
    Route::patch('cart-updated', [DapurController::class, 'updated'])->name('update_cart'); //Memperbahui produk dari Keranjang(Cart)
    Route::delete('cart-remove', [DapurController::class, 'remove'])->name('remove_cart'); //Menghapus produk dari Keranjang(Cart)

    //INPUTAN SAYUR
    Route::get('sayur', function () {
        return view('sayur.add');
    });
    Route::get('riwayat/sayur', [SayurController::class, 'index']);
    Route::get('sayur', [SayurController::class, 'create']);
    Route::get('sayur/{id}', [SayurController::class, 'show']);
    Route::get('cart/', [SayurController::class, 'cartProduct']); //Melihat semua total produk yang di Order
    Route::get('cart/{id}', [SayurController::class, 'cart']); //Memasukan produk ke Keranjang(Cart)
    Route::patch('cart-updated', [SayurController::class, 'updated'])->name('update_cart'); //Memperbahui produk dari Keranjang(Cart)
    Route::delete('cart-remove', [SayurController::class, 'remove'])->name('remove_cart'); //Menghapus produk dari Keranjang(Cart)

    //INPUTAN ASURANSI
    Route::get('asuransi', function () {
        return view('asuransi.add');
    });
    Route::get('riwayat/asuransi', [AsuransiController::class, 'index']);
    Route::post('asuransi', [AsuransiController::class, 'store']);
    Route::get('riwayat/asuransi/{id}', [AsuransiController::class, 'show']);
});


require __DIR__ . '/auth.php';
