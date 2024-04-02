<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Authentication
Route::group(['prefix'=>'auth'],function(){
    Route::post('/signup',[AuthenticationController::class,'signup']);
    Route::post('/login',[AuthenticationController::class,'login'])->middleware('guest:api');

    Route::group(['middleware'=>['auth:api']],function(){
        Route::get('/me',[AuthenticationController::class,'me']);
        Route::post('/logout',[AuthenticationController::class,'logout']);
    });

    Route::group(['middleware'=>['auth:api']],function(){
        Route::apiResource('customers',CustomerController::class);
        Route::apiResource('business-categories',BusinessCategoryController::class);
        Route::apiResource('products',ProductController::class);
    });
});

Route::get('categories/lists', [CategoryController::class, 'index']);
Route::resource('categories', CategoryController::class);
