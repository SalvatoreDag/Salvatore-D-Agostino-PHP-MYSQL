<?php
//file per la configurazione delle rotte
use App\Controllers\OfferedController;
use App\Controllers\ProvidedController;


return [
    'routes' => [
        'GET' => [
            '/' => [OfferedController::class, 'getServices'],
            'offered' => [OfferedController::class, 'getServices'],
            'offered/:id' => [OfferedController::class, 'getServicesById'],
            'provided' => [ProvidedController::class, 'getProvided'],
            'provided/:id' => [ProvidedController::class, 'getProvidedById'],
            'saved' => [OfferedController::class, 'timeSaved'],
            'date/:initialDate/:finalDate' => [OfferedController::class, 'filterByDate'],
            'typology/:type' => [OfferedController::class, 'filterByType'],
        ],
        'POST' => [
            'offered' => [OfferedController::class, 'create'],
            'provided' => [ProvidedController::class, 'create'],
        ],
        'PUT' => [
            'offered/:id' => [OfferedController::class, 'update'],
            'provided/:id' => [ProvidedController::class, 'update'],
        ],
        'DELETE' => [
            'offered/:id/delete' => [OfferedController::class, 'delete'],
            'provided/:id/delete' => [ProvidedController::class, 'delete'],
        ]
    ]
];
