<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MasterController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\ReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/available-dates/{master}', [ReservationController::class, 'showAvailableDates']);
Route::get('/available-time/{date}', [ReservationController::class, 'showAvailableTime'])->where('date', '.*');

Route::post('/reservation', [ReservationController::class, 'store']);
Route::post('/reservation/otp', [ReservationController::class, 'send']);
Route::get('/reservation/otp/{email}', [ReservationController::class, 'getCode']);
Route::get('/reservation/{email}', [ReservationController::class, 'getLastReservation']);

Route::get('/services',[ServiceController::class, 'index']);
Route::get('/masters',[MasterController::class, 'index']);
