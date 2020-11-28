<?php

use App\Http\Controllers\AuthController;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');
});

Route::group([
    'middleware' => 'auth:sanctum'
], function () {
    Route::apiResources([
        'todos' => TodoController::class,
    ]);

    Route::apiResources([
        'users' => UserController::class,
    ]);
});
