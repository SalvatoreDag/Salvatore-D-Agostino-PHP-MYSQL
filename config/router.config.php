<?php
//file per la configurazione delle rotte
use App\Controllers\OfferedController;
use App\Controllers\ProvidedController;


return [
    'routes' => [
        'GET' => [
            '/' => [OfferedController::class, 'getServices'],
            'services_offered' => [OfferedController::class, 'getServices'],
            'services_offered/:id' => [OfferedController::class, 'getServicesById'],
             'services_provided' => [ProvidedController::class, 'getProvided'],
             'services_provided/:id' => [ProvidedController::class, 'getProvidedById'],
            'time_saved' => [OfferedController::class, 'timeSaved'],
            'provided_services?filters[start_date]=&filters[end_date]=' => [OfferedController::class, 'filter'],
            'provided_services?filters[type]=' => [OfferedController::class, 'filter']
        ],
        'POST' => [
            'services_offered' => [OfferedController::class, 'create'],
            'services_provided' => [ProvidedController::class, 'create'],
        ],
        'PUT' => [
            'services_offered/:id' => [OfferedController::class, 'update'],
            'services_provided/:id' => [ProvidedController::class, 'update'],
        ],
        'DELETE' => [
            'services_offered/:id/delete' => [OfferedController::class, 'delete'],
            'services_provided/:id/delete' => [ProvidedController::class, 'delete'],
        ]
    ]
];
