<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ServiceController;

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

Route::get('/', [MainController::class, 'index'])->name('main.index');




Route::group(['prefix' => 'masters'], function () {
    Route::get('/', [MasterController::class, 'index'])->name('master.index');
    Route::get('/create', [MasterController::class, 'create'])->name('master.create');
    Route::post('/', [MasterController::class, 'store'])->name('master.store');
    Route::get('/{master}/edit', [MasterController::class, 'edit'])->name('master.edit');
    Route::get('/{master}', [MasterController::class, 'show'])->name('master.show');
    Route::patch('/{master}', [MasterController::class, 'update'])->name('master.update');
    Route::delete('/{master}', [MasterController::class, 'delete'])->name('master.delete');
});

Route::group(['prefix' => 'services'], function () {
    Route::get('/', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::get('/{service}', [ServiceController::class, 'show'])->name('service.show');
    Route::patch('/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/{service}', [ServiceController::class, 'delete'])->name('service.delete');
});
