<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientController;

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

Route::middleware('auth')->group(function () {

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

    Route::group(['prefix' => 'reservations'], function () {
        Route::get('/', [ReservationController::class, 'index'])->name('reservation.index');
        Route::get('/last', [ReservationController::class, 'last'])->name('reservation.last');
        Route::post('/search', [ReservationController::class, 'search'])->name('reservation.search');
        Route::get('/create', [ReservationController::class, 'create'])->name('reservation.create');
        Route::post('/', [ReservationController::class, 'store'])->name('reservation.store');
        Route::get('/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
        Route::get('/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');
        Route::patch('/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
        Route::delete('/{reservation}', [ReservationController::class, 'delete'])->name('reservation.delete');
    });

    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', [ClientController::class, 'index'])->name('client.index');
        Route::get('/create', [ClientController::class, 'create'])->name('client.create');
        Route::post('/', [ClientController::class, 'store'])->name('client.store');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
        Route::get('/{client}', [ClientController::class, 'show'])->name('client.show');
        Route::patch('/{client}', [ClientController::class, 'update'])->name('client.update');
        Route::delete('/{client}', [ClientController::class, 'delete'])->name('client.delete');
    });
});

require __DIR__ . '/auth.php';
