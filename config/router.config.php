<?php
//file per la configurazione delle rotte
use App\Controllers\ServicesController;
use App\Controllers\ProvidedController;


return [
    'routes' => [
        'GET' => [
            '/' => [ServicesController::class, 'getServices'],
            'services' => [ServicesController::class, 'getServices'],
            'services/:id' => [ServicesController::class, 'getServicesById'],
            'provided' => [ProvidedController::class, 'getProvided'],
            'provided/:id' => [ProvidedController::class, 'getProvidedById'],
            'saved' => [ServicesController::class, 'timeSaved'],
            'date/:initialDate/:finalDate' => [ServicesController::class, 'filterByDate'],
            'typology/:type' => [ServicesController::class, 'filterByType'],
        ],
        'POST' => [
            'services' => [ServicesController::class, 'save'],
            'provided' => [ProvidedController::class, 'save'],
        ],
        'PUT' => [
            'services/:id' => [ServicesController::class, 'save'],
            'provided/:id' => [ProvidedController::class, 'save'],
        ],
        'DELETE' => [
            'services/:id/delete' => [ServicesController::class, 'delete'],
            'provided/:id/delete' => [ProvidedController::class, 'delete'],
        ]
    ]
];
