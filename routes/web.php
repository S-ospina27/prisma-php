<?php

use LionRoute\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServiceOrdersController;

/**
 * ------------------------------------------------------------------------------
 * Web Routes
 * ------------------------------------------------------------------------------
 * Here is where you can register web routes for your application
 * ------------------------------------------------------------------------------
 **/

Route::any('/', [HomeController::class, 'index']);

Route::prefix('api', function() {
    Route::prefix('users',function(){
        Route::post('create',[UsersController::class,'createUsers']);
        Route::get('read',[UsersController::class,'readUsers']);
        Route::post('update',[UsersController::class,'updateUser']);
    });

    Route::prefix('products',function(){
        Route::post('create',[ProductsController::class,'createProducts']);
        Route::get('read',[ProductsController::class,'readProducts']);
        Route::post('update',[ProductsController::class,'updateProducts']);
        Route::post('create_Product_type',[ProductsController::class,'create_Product_type']);
        Route::post('update_product_type',[ProductsController::class,'update_product_type']);
        Route::get('read_product_type',[ProductsController::class,'read_product_type']);
    });

    Route::prefix('service_orders',function(){
        Route::post('create',[ServiceOrdersController::class,'createOrders']);
        Route::post('update',[ServiceOrdersController::class,'updateOrders']);
         Route::post('export',[ServiceOrdersController::class,'exportServiceOrders']);


        Route::prefix('read', function() {
            Route::get('/', [ServiceOrdersController::class,'readOrders']);
            Route::get('by-provider/{idprovider_users}',[ServiceOrdersController::class,'readOrdersProvider']);
        });
    });

    Route::prefix('auth', function() {
        Route::post('login', [LoginController::class, 'auth']);
    });
});
