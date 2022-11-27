<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rental_MobilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
*Auth 
*/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    /*
    *Auth 
    */
    Route::post('logout', [AuthController::class, 'logout']);

    //Admin routes
        Route::get('/rental_mobil', [Rental_MobilController::class, 'index']);
        Route::post('/rental_mobil', [Rental_MobilController::class, 'store']);
        Route::put('/rental_mobil/{id}', [Rental_MobilController::class, 'update']);
        Route::delete('/rental_mobil/{id}', [Rental_MobilController::class, 'destroy']);
        Route::get('/rental_mobil/{id}', [Rental_MobilController::class, 'show']); 
        Route::put('/transaksi/{id}', [TransaksiController::class, 'update']);
        Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']);
    

    //public routes
        Route::get('/transaksi', [TransaksiController::class, 'index']);
        Route::post('/transaksi', [TransaksiController::class, 'store']);
        Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);        
    });



