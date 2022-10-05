<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TenantController;

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

//-- User Apis --//

Route::group(['prefix' => 'user'], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:api']);

});

//-- product Resource --//

Route::group(['prefix' => 'product','middleware' => 'auth:api'], function () {

    Route::get('/', [ProductController::class, 'index']);
    Route::post('store', [ProductController::class, 'store']);
    Route::post('update/{id}', [ProductController::class, 'update']);
    Route::post('destroy/{id}', [ProductController::class, 'destroy']);

});


//-- Tenant Apis --//

Route::group(['prefix' => 'tenant'], function () {

    Route::get('/', [TenantController::class, 'index']);
    Route::post('store', [TenantController::class, 'store']);
    Route::post('update/{id}', [TenantController::class, 'update']);
    Route::post('destroy/{id}', [TenantController::class, 'destroy']);

});