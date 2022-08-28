<?php

use App\Http\Controllers\Api\ConvertController;
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
Route::post('register', [AuthController::class, 'register']); //Route pour l'identification
Route::post('login', [AuthController::class, 'login']);  //Route pour la connexion de l'utilisateur
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');  //Route pour la déconnexion

//Route pour la conversion
Route::get('/pairs/{id_currency_from}/{id_currency_to}/{price}/{reverse?}', [PairController::class, 'converts']);

Route::apiResource('currencies', CurrencyController::class);
Route::apiResource('pairs', PairController::class);