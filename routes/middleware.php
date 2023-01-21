<?php

/**
 * ------------------------------------------------------------------------------
 * Web middleware
 * ------------------------------------------------------------------------------
 * This is where you can register web middleware for your application
 * ------------------------------------------------------------------------------
 **/

LionRoute\Route::addMiddleware([
    App\Http\Middleware\JWT\AuthorizationMiddleware::class => [
        ['name' => "jwt-authorize", 'method' => "authorize"],
        ['name' => "jwt-not-authorize", 'method' => "notAuthorize"]
    ],
    App\Http\Middleware\Session\SessionMiddleware::class => [
        ['name' => "close-session", 'method' => "closeSession"]
    ],
    App\Http\Middleware\Session\RolesMiddleware::class => [
        ['name' => "administrator-access", 'method' => "administratorAccess"],
        ['name' => "technical-access", 'method' => "technicalAccess"],
        ['name' => "dealer-access", 'method' => "dealerAccess"],
        ['name' => "provider-access", 'method' => "providerAccess"]
    ]
]);