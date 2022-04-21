<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LimitStokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\JenisTanamansController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\TransaksiPetaniController;
use App\Http\Controllers\ItemTransaksiPetaniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('barangs', BarangController::class);
        Route::resource('detail-transaksis', DetailTransaksiController::class);
        Route::resource(
            'item-transaksi-petanis',
            ItemTransaksiPetaniController::class
        );
        Route::get('all-jenis-tanamans', [
            JenisTanamansController::class,
            'index',
        ])->name('all-jenis-tanamans.index');
        Route::post('all-jenis-tanamans', [
            JenisTanamansController::class,
            'store',
        ])->name('all-jenis-tanamans.store');
        Route::get('all-jenis-tanamans/create', [
            JenisTanamansController::class,
            'create',
        ])->name('all-jenis-tanamans.create');
        Route::get('all-jenis-tanamans/{jenisTanamans}', [
            JenisTanamansController::class,
            'show',
        ])->name('all-jenis-tanamans.show');
        Route::get('all-jenis-tanamans/{jenisTanamans}/edit', [
            JenisTanamansController::class,
            'edit',
        ])->name('all-jenis-tanamans.edit');
        Route::put('all-jenis-tanamans/{jenisTanamans}', [
            JenisTanamansController::class,
            'update',
        ])->name('all-jenis-tanamans.update');
        Route::delete('all-jenis-tanamans/{jenisTanamans}', [
            JenisTanamansController::class,
            'destroy',
        ])->name('all-jenis-tanamans.destroy');

        Route::resource('lahans', LahanController::class);
        Route::resource('limit-stoks', LimitStokController::class);
        Route::resource('panens', PanenController::class);
        Route::resource('transaksis', TransaksiController::class);
        Route::resource('transaksi-petanis', TransaksiPetaniController::class);
        Route::resource('users', UserController::class);
    });
