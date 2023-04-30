<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ReservaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});


Route::post('/login', [UserAuthController::class, 'login']);
Route::post('/register', [UserAuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [UserAuthController::class, 'logout']);


Route::middleware(['auth:sanctum'])->group(function () {
  Route::post('/token',function(){
    return true;
  });
  Route::get('/getLastReservas', [ReservaController::class, 'GetLasts']);
  Route::delete('/reserva/delete/{id}', [ReservaController::class, 'destroy']);
  Route::post('/showReservasHrs', [ReservaController::class, 'showReservasHrs']);
  Route::get('/reserva/getAll', [ReservaController::class, 'index']);
  Route::post('/reserva/store', [ReservaController::class, 'store']);
  Route::post('/reserva/update/{id}', [ReservaController::class, 'update']);
});
