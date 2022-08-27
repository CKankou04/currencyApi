<?php

use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\PairController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::post('logout', [AuthController::class,'logout']);
//Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::apiResource('currencies', CurrencyController::class);
Route::apiResource('pairs', PairController::class);
//Route::apiResource('convert', PairController::class);