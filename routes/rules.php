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
        \App\Rules\Users\UsersEmailRule::class,
        \App\Rules\Users\UsersPasswordRule::class
    ],
    '/api/application-order-form' => [
        \App\Rules\ServiceRequest\IdusersDealersRule::class,
        \App\Rules\Cities\IdcitiesRule::class,
        \App\Rules\Products\IdproductsRule::class,
        \App\Rules\ServiceRequest\ServiceRequestClientNameRule::class,
        \App\Rules\ServiceRequest\ServiceRequestNeighborhoodRule::class,
        \App\Rules\ServiceRequest\ServiceRequestAddressRule::class,
        \App\Rules\ServiceRequest\ServiceRequestPhoneContactRule::class,
        \App\Rules\ServiceRequest\ServiceRequestEmailRule::class,
        \App\Rules\ServiceRequest\ServiceRequestTroubleReportRule::class
    ],
    '/api/users/create' => [
        \App\Rules\Roles\IdrolesRule::class,
        \App\Rules\DocumentTypes\IddocumentTypesRule::class,
        \App\Rules\Users\UsersIdentificationRule::class,
        \App\Rules\Users\UsersNameRule::class,
        \App\Rules\Users\UsersLastnameRule::class,
        \App\Rules\Users\UsersPhoneRule::class,
        \App\Rules\Users\UsersAddressRule::class,
        \App\Rules\Cities\IdcitiesRule::class,
        \App\Rules\Users\UsersEmailRule::class,
        \App\Rules\Users\UsersPasswordRule::class,
        \App\Rules\Users\UsersContactNameRule::class,
        \App\Rules\Users\UsersContactPhoneRule::class,
    ],
    '/api/users/update' => [
        \App\Rules\Users\IdusersRule::class,
        \App\Rules\Roles\IdrolesRule::class,
        \App\Rules\DocumentTypes\IddocumentTypesRule::class,
        \App\Rules\Users\UsersIdentificationRule::class,
        \App\Rules\Users\UsersNameRule::class,
        \App\Rules\Users\UsersLastnameRule::class,
        \App\Rules\Users\UsersPhoneRule::class,
        \App\Rules\Users\UsersAddressRule::class,
        \App\Rules\Cities\IdcitiesRule::class,
        \App\Rules\Users\UsersEmailRule::class,
        \App\Rules\Users\UsersContactNameRule::class,
        \App\Rules\Users\UsersContactPhoneRule::class,
    ],
    '/api/products/create' => [
        \App\Rules\Products\ProductsReferenceRule::class,
        \App\Rules\ProductTypes\IdproductTypesRule::class,
        \App\Rules\Products\ProductsImageRule::class,
        \App\Rules\Products\ProductsDescriptionRule::class,
        \App\Rules\Products\ProductsColorRule::class
    ],
    '/api/products/types/create' => [
        \App\Rules\ProductTypes\ProductTypesNameRule::class
    ],
    '/api/products/types/update' => [
        \App\Rules\ProductTypes\IdproductTypesRule::class,
        \App\Rules\ProductTypes\ProductTypesNameRule::class
    ],
    '/api/payments/create' => [
        \App\Rules\ServiceRequest\IdserviceRequestRule::class
    ],
    '/api/payments/update/massive' => [
        \App\Rules\ItemsRule::class
    ],
    '/api/service/orders/export/excel' => [
        \App\Rules\DateStartRule::class,
        \App\Rules\DateEndRule::class
    ],
    '/api/service/request/update' => [
        // \App\Rules\ServiceRequest\IdusersTechnicalRule::class,
        // \App\Rules\ServiceStates\IdserviceStatesRule::class,
        // \App\Rules\ServiceRequest\ServiceRequestDateVisitRule::class,
        // \App\Rules\ServiceRequest\ServiceRequestDateCloseRule::class,
        // \App\Rules\ServiceRequest\ServiceRequestValueRule::class,
        \App\Rules\ServiceRequest\ServiceRequestPaymentMethodsRule::class,
        // \App\Rules\ServiceRequest\ServiceRequestTechnicalNoveltyRule::class,
        // \App\Rules\ServiceRequest\ServiceRequestEvidenceRule::class,
        // \App\Rules\ServiceRequest\ServiceRequestWarrantlyRule::class,
        \App\Rules\ServiceRequest\ServiceRequestEmailRule::class,
        \App\Rules\ServiceRequest\IdserviceRequestRule::class
    ],
    '/api/service/request/export/excel' => [
        \App\Rules\DateStartRule::class,
        \App\Rules\DateEndRule::class
    ],
    '/api/service/spare-parts/create' => [
        \App\Rules\SpareParts\SparePartsNameRule::class,
        \App\Rules\SpareParts\SparePartsAmountRule::class
    ],
    '/api/service/spare-parts/update' => [
        \App\Rules\SpareParts\IdsparePartsRule::class,
        \App\Rules\SpareParts\SparePartsNameRule::class,
        \App\Rules\SpareParts\SparePartsAmountRule::class
    ],
    '/api/service/technical-inventory/update' => [
        \App\Rules\TechnicalInventory\IdtechnicalInventoryRule::class,
        \App\Rules\ServiceStates\IdserviceStatesRule::class
    ]
];