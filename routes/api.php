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
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');
});

Route::group([
    'middleware' => 'auth:sanctum',
], function () {
    Route::apiResource('permissions', PermissionController::class)->only([
        'index', 'show',
    ])->middleware('permission:permissions.view');

    Route::group([
        'middleware' => 'role:administrator',
    ], function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('roles.permissions', RolePermissionController::class)->except([
            'show', 'update',
        ]);
    });

    Route::apiResource('todos', TodoController::class)->middleware('role:administrator|user');

    Route::group([
        'middleware' => 'role:administrator',
    ], function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('users.roles', UserRoleController::class)->except([
            'show', 'update',
        ]);
    });
});
