<?php

use App\Http\Controllers\api\ApiLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('login',[ApiLoginController::class,'login']);
Route::get('register',[ApiLoginController::class,'register']);
Route::post('register',[ApiLoginController::class,'register']);
Route::post('login',[ApiLoginController::class,'login']);

Route::group(['middleware'=>'auth:api'],function(){

    Route::get('/home', [ApiLoginController::class, 'index']);
    Route::post('/insert', [ApiLoginController::class, 'insert']);
    Route::get('logout',[ApiLoginController::class,'logout']);

});


