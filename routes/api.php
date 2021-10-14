<?php

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

Route::post('message/add', \App\Http\Controllers\MessageController::class . '@add');
Route::middleware('auth:sanctum')->post('message/private/add', \App\Http\Controllers\MessageController::class . '@addPrivate');

Route::post('/auth/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->get('/ably/auth', function () {
    $client = new Ably\AblyRest(getenv('ABLY_KEY'));

    return $client->auth->createTokenRequest()->toArray();
});

