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
            'services' => [OfferedController::class, 'create'],
            'provided' => [ProvidedController::class, 'create'],
        ],
        'PUT' => [
            'services/:id' => [OfferedController::class, 'update'],
            'provided/:id' => [ProvidedController::class, 'update'],
        ],
        'DELETE' => [
            'services/:id/delete' => [OfferedController::class, 'delete'],
            'provided/:id/delete' => [ProvidedController::class, 'delete'],
        ]
    ]
];
