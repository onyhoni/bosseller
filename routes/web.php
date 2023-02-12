<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('user', [ProfileController::class, 'index'])->name('user');
    Route::get('user/{user}/edit', [ProfileController::class, 'edit'])->name('user.edit');
    Route::patch('user/{user}', [ProfileController::class, 'update'])->name('user.update');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('show', [DashboardController::class, 'show'])->name('dashboard.show');

    Route::get('transaction/export', [TransactionController::class, 'export'])->name('transaction.export');
    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::get('transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('transaction/{transaction:package_id}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('transaction/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::patch('transaction', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('transaction/{transaction}', [TransactionController::class, 'delete'])->name('transaction.delete');


    Route::get('packages', [PackageController::class, 'index'])->name('packages');
    Route::get('packages/export', [PackageController::class, 'export'])->name('packages.export');
    Route::get('packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('packages', [PackageController::class, 'store'])->name('packages.store');
    Route::get('packages/{packages}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::patch('packages/{packages}', [PackageController::class, 'update'])->name('packages.update');
    Route::delete('packages/{packages}', [PackageController::class, 'destroy'])->name('packages.delete');
});

require __DIR__ . '/auth.php';
