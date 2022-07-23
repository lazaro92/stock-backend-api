<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OperationController;

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

Route::get('/product',        [ProductController::class, 'show']);
Route::get('/product/{code}', [ProductController::class, 'find']);
Route::post('/product',       [ProductController::class, 'insert']);
Route::put('/product/{code}',  [ProductController::class, 'update']);

Route::post('/operation/buy/{code}',  [OperationController::class, 'buyProduct']);
Route::post('/operation/sell/{code}', [OperationController::class, 'sellProduct']);
