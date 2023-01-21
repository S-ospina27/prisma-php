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
    ],
    'api/users/create' => [
       App\Rules\Roles\IdrolesRule::class,
       App\Rules\DocumentTypes\IddocumentTypesRule::class,
       App\Rules\Users\UsersIdentificationRule::class,
       App\Rules\Users\UsersNameRule::class,
       App\Rules\Users\UsersLastnameRule::class,
       App\Rules\Users\UsersPhoneRule::class,
       App\Rules\Users\UsersAddressRule::class,
       App\Rules\Cities\IdcitiesRule::class,
       App\Rules\Users\UsersEmailRule::class,
       App\Rules\Users\UsersPasswordRule::class,
       App\Rules\Users\UsersContactNameRule::class,
       App\Rules\Users\UsersContactPhoneRule::class,
   ],
   'api/users/update' => [
    App\Rules\Users\IdusersRule::class,
    App\Rules\Roles\IdrolesRule::class,
    App\Rules\DocumentTypes\IddocumentTypesRule::class,
    App\Rules\Users\UsersIdentificationRule::class,
    App\Rules\Users\UsersNameRule::class,
    App\Rules\Users\UsersLastnameRule::class,
    App\Rules\Users\UsersPhoneRule::class,
    App\Rules\Users\UsersAddressRule::class,
    App\Rules\Cities\IdcitiesRule::class,
    App\Rules\Users\UsersEmailRule::class,
    App\Rules\Users\UsersPasswordRule::class,
    App\Rules\Users\UsersContactNameRule::class,
    App\Rules\Users\UsersContactPhoneRule::class,
],
'api/products/create' => [
    App\Rules\Products\ProductsReferenceRule::class,
    App\Rules\ProductTypes\IdproductTypesRule::class,
    App\Rules\Products\ProductsImageRule::class,
    App\Rules\Products\ProductsDescriptionRule::class,
    App\Rules\Products\ProductsColorRule::class,
    App\Rules\Users\IdusersRule::class,


],
'api/products/types/create' => [
   App\Rules\ProductTypes\ProductTypesNameRule::class
],
'api/products/types/update' => [
    App\Rules\ProductTypes\IdproductTypesRule::class,
   App\Rules\ProductTypes\ProductTypesNameRule::class
],

];