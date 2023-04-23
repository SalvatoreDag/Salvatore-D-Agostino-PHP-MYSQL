<?php
//file per la configurazione delle rotte
use App\Controllers\OfferedController;
use App\Controllers\ProvidedController;


return [
    'routes' => [
        'GET' => [
            '/' => [OfferedController::class, 'getServices'],
            'services' => [OfferedController::class, 'getServices'],
            'services/:id' => [OfferedController::class, 'getServicesById'],
            'provided' => [ProvidedController::class, 'getProvided'],
            'provided/:id' => [ProvidedController::class, 'getProvidedById'],
            'saved' => [OfferedController::class, 'timeSaved'],
            'date/:initialDate/:finalDate' => [OfferedController::class, 'filterByDate'],
            'typology/:type' => [OfferedController::class, 'filterByType'],
        ],
        'POST' => [
            'services' => [OfferedController::class, 'save'],
            'provided' => [ProvidedController::class, 'save'],
        ],
        'PUT' => [
            'services/:id' => [OfferedController::class, 'save'],
            'provided/:id' => [ProvidedController::class, 'save'],
        ],
        'DELETE' => [
            'services/:id/delete' => [OfferedController::class, 'delete'],
            'provided/:id/delete' => [ProvidedController::class, 'delete'],
        ]
    ]
];
