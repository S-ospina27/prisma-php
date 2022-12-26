<?php

use LionRoute\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Locations\CitiesController;
use App\Http\Controllers\Locations\DepartmentsController;
use App\Http\Controllers\Manage\DocumentTypesController;
use App\Http\Controllers\Manage\RolesController;
use App\Http\Controllers\Manage\StatusController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Products\ProductTypesController;
use App\Http\Controllers\UsersController;
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
    Route::prefix('auth', function() {
        Route::post('login', [LoginController::class, 'auth']);
    });

    Route::get('read-roles', [RolesController::class, 'readRoles']);
    Route::get('read-document-types', [DocumentTypesController::class, 'readDocumentTypes']);

    Route::prefix('status', function() {
        Route::get('/', [StatusController::class, 'readStatus']);
    });

    Route::prefix('locations', function() {
        Route::get('read-departments', [DepartmentsController::class, 'readDepartments']);
        Route::get('read-cities/{iddepartments}', [CitiesController::class, 'readCitiesByDepartment']);
    });

    Route::prefix('users', function() {
        Route::post('create', [UsersController::class, 'createUsers']);
        Route::post('update', [UsersController::class, 'updateUser']);

        Route::prefix('read', function() {
            Route::get('/', [UsersController::class, 'readUsers']);
            Route::get('filter', [UsersController::class, 'readFilterUsers']);
        });
    });

    Route::prefix('products', function() {
        Route::post('create', [ProductsController::class, 'createProducts']);
        Route::get('read', [ProductsController::class, 'readProducts']);
        Route::post('update', [ProductsController::class, 'updateProducts']);

        Route::prefix('types', function() {
            Route::post('create', [ProductTypesController::class, 'createProductType']);
            Route::post('update', [ProductTypesController::class, 'updateProductType']);
            Route::get('read', [ProductTypesController::class, 'readProductType']);
        });
    });

    Route::prefix('service-orders', function() {
        Route::post('create', [ServiceOrdersController::class, 'createOrders']);
        Route::post('update', [ServiceOrdersController::class, 'updateOrders']);
        Route::post('export', [ServiceOrdersController::class, 'exportServiceOrders']);

        Route::prefix('read', function() {
            Route::get('/', [ServiceOrdersController::class, 'readOrders']);
            Route::get('by-provider/{idprovider_users}', [ServiceOrdersController::class, 'readOrdersProvider']);
        });
    });
});
