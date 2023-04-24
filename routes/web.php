<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Locations\CitiesController;
use App\Http\Controllers\Locations\DepartmentsController;
use App\Http\Controllers\Manage\DocumentTypesController;
use App\Http\Controllers\Manage\PaymentsController;
use App\Http\Controllers\Manage\RolesController;
use App\Http\Controllers\Manage\ServiceStatesController;
use App\Http\Controllers\Manage\StatusController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Products\ProductTypesController;
use App\Http\Controllers\Service\GraphicServiceOrdersController;
use App\Http\Controllers\Service\ServiceOrdersController;
use App\Http\Controllers\Service\ServiceRequestController;
use App\Http\Controllers\Service\SparePartsController;
use App\Http\Controllers\Service\TechnicalInventoryController;
use App\Http\Controllers\UsersController;
use LionRoute\Route;

/**
 * ------------------------------------------------------------------------------
 * Web Routes
 * ------------------------------------------------------------------------------
 * Here is where you can register web routes for your application
 * ------------------------------------------------------------------------------
 **/

Route::prefix('api', function() {
    Route::post('application-order-form', [ServiceRequestController::class, 'createServiceRequest']);

    Route::prefix('auth', function() {
        Route::post('login', [LoginController::class, 'auth'], ['close-session']);
    });

    Route::prefix('locations', function() {
        Route::get('read-departments', [DepartmentsController::class, 'readDepartments']);
        Route::get('read-cities/{iddepartments}', [CitiesController::class, 'readCitiesByDepartment']);
    });

    Route::middleware(['jwt-authorize'], function() {
        Route::get('read-roles', [RolesController::class, 'readRoles']);
        Route::get('read-document-types', [DocumentTypesController::class, 'readDocumentTypes']);

        Route::prefix('status', function() {
            Route::get('index', [StatusController::class, 'readStatus']);
            Route::get('service', [ServiceStatesController::class, 'readServiceStates']);
        });

        Route::prefix('users', function() {
            Route::post('create', [UsersController::class, 'createUsers']);
            Route::post('update', [UsersController::class, 'updateUsers']);

            Route::prefix('read', function() {
                Route::get('index', [UsersController::class, 'readUsers']);
                Route::get('by-rol', [UsersController::class, 'readUsersByRol']);
            });
        });

        Route::prefix('payments', function() {
            Route::post("create", [PaymentsController::class, 'createPayments']);
            Route::get('read', [PaymentsController::class, 'readPayments']);

            Route::prefix('update', function() {
                Route::post('massive', [PaymentsController::class, 'updatePaymentsMassive']);
            });
        });
    });

    Route::prefix('products', function() {
        Route::get('read/by-status', [ProductsController::class, 'readFilterProducts']);

        Route::middleware(['jwt-authorize'], function() {
            Route::post('create', [ProductsController::class, 'createProducts']);
            Route::post('update', [ProductsController::class, 'updateProducts']);
            Route::get('read', [ProductsController::class, 'readProducts']);

            Route::prefix('types', function() {
                Route::post('create', [ProductTypesController::class, 'createProductType']);
                Route::post('update', [ProductTypesController::class, 'updateProductType']);
                Route::get('read', [ProductTypesController::class, 'readProductType']);
            });
        });
    });

    Route::middleware(['jwt-authorize'], function() {
        Route::prefix('service', function() {
            Route::prefix('orders', function() {
                Route::post('create', [ServiceOrdersController::class, 'createServiceOrders']);
                Route::post('update', [ServiceOrdersController::class, 'updateServiceOrders']);

                Route::prefix('export', function() {
                    Route::post('excel', [ServiceOrdersController::class, 'exportServiceOrdersExcel']);
                    Route::get('pdf/{idservice_orders}', [ServiceOrdersController::class, 'exportServiceOrdersPDF']);
                });

                Route::prefix('read', function() {
                    Route::get('index', [ServiceOrdersController::class, 'readOrders']);
                    Route::get('by-provider/{idprovider_users}', [ServiceOrdersController::class, 'readOrdersByProvider']);

                    Route::prefix('graphics', function() {
                        Route::get('amount-orders', [GraphicServiceOrdersController::class, 'readAmountOrders']);
                        Route::get('unit-percentages', [GraphicServiceOrdersController::class, 'readUnitPercentages']);
                    });
                });
            });

            Route::prefix('request', function() {
                Route::post('update', [ServiceRequestController::class, 'updateServiceRequest']);

                Route::prefix('read', function() {
                    Route::get('index', [ServiceRequestController::class, 'readServiceRequest']);
                    Route::get("by-state", [ServiceRequestController::class, 'readServiceRequestByState']);
                    Route::get("by-technical", [ServiceRequestController::class, 'readServiceRequestByTechnical']);

                    Route::prefix('graphics', function() {
                        Route::get('count-warranty', [GraphicServiceOrdersController::class, 'readCountServiceRequestWarranty']);
                        Route::get('total-charges-per-month', [GraphicServiceOrdersController::class, 'readTotalChargesPerMonth']);
                        Route::get('read-total-charges-without-warranty', [GraphicServiceOrdersController::class, 'readTotalChargesWithoutWarranty']);
                        Route::get('read-average-time/{idusers_technical}', [GraphicServiceOrdersController::class, 'readAverageTime']);
                    });
                });

                Route::prefix('export', function() {
                    Route::post('excel', [ServiceRequestController::class, 'exportServiceRequestExcel']);
                });
            });

            Route::prefix('spare-parts', function() {
                Route::post('create', [SparePartsController::class, 'createSpareParts']);
                Route::get('read', [SparePartsController::class, 'readSpareParts']);
                Route::post('update', [SparePartsController::class, 'updateSpareParts']);
            });

            Route::prefix('technical-inventory', function() {
                Route::post('create', [TechnicalInventoryController::class, 'createTechnicalInventory']);
                Route::post('update', [TechnicalInventoryController::class, 'updateTechnicalInventory']);
                Route::get('read', [TechnicalInventoryController::class, 'readTechnicalInventory']);
            });
        });
    });
});