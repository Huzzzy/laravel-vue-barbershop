<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MasterController;
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
