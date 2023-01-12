<?php

use LionRoute\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Locations\CitiesController;
use App\Http\Controllers\Locations\DepartmentsController;
use App\Http\Controllers\Manage\DocumentTypesController;
use App\Http\Controllers\Manage\RolesController;
use App\Http\Controllers\Manage\ServiceStatesController;
use App\Http\Controllers\Manage\StatusController;
use App\Http\Controllers\PartsHistory\PartsHistoryController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Products\ProductTypesController;
use App\Http\Controllers\ServiceOrders\GraphicServiceOrdersController;
use App\Http\Controllers\ServiceOrders\ServiceOrdersController;
use App\Http\Controllers\ServiceRequest\ServiceRequestController;
use App\Http\Controllers\SpareParts\SparePartsController;
use App\Http\Controllers\UsersController;

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
        Route::get('service', [ServiceStatesController::class, 'readServiceStates']);
    });

    Route::prefix('locations', function() {
        Route::get('read-departments', [DepartmentsController::class, 'readDepartments']);
        Route::get('read-cities/{iddepartments}', [CitiesController::class, 'readCitiesByDepartment']);
    });

    Route::prefix('users', function() {
        Route::post('create', [UsersController::class, 'createUsers']);
        Route::post('update', [UsersController::class, 'updateUsers']);

        Route::prefix('read', function() {
            Route::get('/', [UsersController::class, 'readUsers']);
            Route::get('by-rol', [UsersController::class, 'readFilterUsers']);
        });
    });

    Route::prefix('products', function() {
        Route::post('create', [ProductsController::class, 'createProducts']);
        Route::post('update', [ProductsController::class, 'updateProducts']);

        Route::prefix('read', function() {
            Route::get('/', [ProductsController::class, 'readProducts']);
            Route::get('by-status', [ProductsController::class, 'readFilterProducts']);
        });

        Route::prefix('types', function() {
            Route::post('create', [ProductTypesController::class, 'createProductType']);
            Route::post('update', [ProductTypesController::class, 'updateProductType']);
            Route::get('read', [ProductTypesController::class, 'readProductType']);
        });
    });

    Route::prefix('service-orders', function() {
        Route::post('create', [ServiceOrdersController::class, 'createServiceOrders']);
        Route::post('update', [ServiceOrdersController::class, 'updateServiceOrders']);

        Route::prefix('export', function() {
            Route::post('excel', [ServiceOrdersController::class, 'exportServiceOrdersExcel']);
            Route::get('pdf/{idservice_orders}', [ServiceOrdersController::class, 'exportServiceOrdersPDF']);
        });

        Route::prefix('read', function() {
            Route::get('/', [ServiceOrdersController::class, 'readOrders']);
            Route::get('by-provider/{idprovider_users}', [ServiceOrdersController::class, 'readOrdersProvider']);

            Route::prefix('graphics', function() {
                Route::get('amount-orders', [GraphicServiceOrdersController::class, 'readAmountOrders']);
                Route::get('unit-percentages', [GraphicServiceOrdersController::class, 'readUnitPercentages']);
            });
        });
    });

    Route::prefix('service-request', function() {
        Route::get('read', [ServiceRequestController::class, 'readServiceRequest']);
        Route::post('update', [ServiceRequestController::class, 'updateServiceRequest']);

        Route::prefix('export', function() {
            Route::post('excel', [ServiceRequestController::class, 'exportServiceRequestExcel']);
        });
    });

    Route::prefix('spare-parts', function() {
        Route::post('create', [SparePartsController::class, 'createSpareParts']);
        Route::post('update', [SparePartsController::class, 'updateSpareParts']);

        Route::prefix('read', function() {
            Route::get('/', [SparePartsController::class, 'readSpareParts']);
            Route::get('by-spare-parts/{idspare_parts}', [SparePartsController::class, 'readBySpareParts']);
        });

        Route::prefix('history', function() {
            Route::get('read', [PartsHistoryController::class, 'readPartsHistory']);
            Route::post('create', [PartsHistoryController::class, 'createPartsHistory']);
            Route::post('update', [PartsHistoryController::class, 'updateSpareParts']);
        });
    });
});