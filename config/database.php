<?php
//file che contiene i dati di accesso del database

return [
    'driver' => 'mysql',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '1234Qwerty',
    'database' => 'migrations',
    'pdooptions' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];