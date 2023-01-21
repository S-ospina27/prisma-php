<?php

/**
 * ------------------------------------------------------------------------------
 * Rules
 * ------------------------------------------------------------------------------
 * This is where you can register your rules for validating forms
 * ------------------------------------------------------------------------------
 **/

return [
    '/api/auth/login' => [
        App\Rules\Users\UsersEmailRule::class,
        App\Rules\Users\UsersPasswordRule::class
    ],
    '/api/application-order-form' => [
        App\Rules\ServiceRequest\IdusersDealersRule::class
    ]
];