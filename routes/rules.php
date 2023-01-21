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
        App\Rules\ServiceRequest\IdusersDealersRule::class,
        App\Rules\Cities\IdcitiesRule::class,
        App\Rules\Products\IdproductsRule::class,
        App\Rules\ServiceRequest\ServiceRequestClientNameRule::class,
        App\Rules\ServiceRequest\ServiceRequestNeighborhoodRule::class,
        App\Rules\ServiceRequest\ServiceRequestAddressRule::class,
        App\Rules\ServiceRequest\ServiceRequestPhoneContactRule::class,
        App\Rules\ServiceRequest\ServiceRequestEmailRule::class,
        App\Rules\ServiceRequest\ServiceRequestTroubleReportRule::class
    ]
];