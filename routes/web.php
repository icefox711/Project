<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;


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



Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'userAkses:kantin'])->group(function () {
    Route::get('/kantin', [DashboardController::class, 'kantinIndex'])->name('kantin.index');

    Route::resource('/kantin/kategori', KategoriController::class);
    Route::resource('/kantin/produk', ProdukController::class);
});

Route::middleware(['auth', 'userAkses:customer'])->group(function () {
    Route::get('/customer', [DashboardController::class, 'customerIndex'])->name('customer.index');

    Route::post('/customer/topup', [BankController::class, 'topup'])->name('customer.topup');
    Route::post('/customer/withdrawal', [BankController::class, 'withdrawal'])->name('customer.withdrawal');

    Route::get('/customer/produk', [TransaksiController::class, 'customerKantinIndex'])->name('customer.kantin');
    Route::get('/customer/keranjang', [TransaksiController::class, 'keranjangIndex'])->name('customer.keranjang');
    Route::post('/customer/keranjang/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
    Route::get('/customer/keranjang/cetak', [TransaksiController::class, 'cetakTransaksi'])->name('cetak.transaksi');
    Route::post('/customer/keranjang/{id}', [TransaksiController::class, 'addToCart'])->name('addToCart');
    Route::delete('/customer/keranjang/destroy/{id}', [TransaksiController::class, 'keranjangDestroy'])->name('keranjang.destroy');
});

Route::middleware(['auth', 'userAkses:bank'])->group(function () {
    Route::get('/bank', [DashboardController::class, 'bankIndex'])->name('bank.index');
    Route::get('/bank/topup', [BankController::class, 'bankTopupIndex'])->name('bank.topup');
    Route::put('/bank/konfirmasiTopup/{id}', [BankController::class, 'konfirmasiTopup'])->name('konfirmasi.topup');
    Route::put('/bank/tolakTopup/destroy/{id}', [BankController::class, 'tolakTopupIndex'])->name('tolak.topup');
    Route::get('/bank/tariktunai', [BankController::class, 'bankWithdrawalIndex'])->name('bank.withdrawl');
    Route::put('/bank/konfirmasiWithdrawal/{id}', [BankController::class, 'konfirmasiWithdrawal'])->name('konfirmasi.withdrawal');
    Route::put('/bank/tolakWithdrawal/{id}', [BankController::class, 'tolakWithdrawal'])->name('tolak.withdrawal');
});
