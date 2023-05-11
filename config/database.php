<?php
//file che contiene i dati di accesso del database

use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db_host = $_ENV['DB_HOST'];;
$db_username = $_ENV['DB_USERNAME'];
$db_password = $_ENV['DB_PASSWORD'];


return [
    'driver' => 'mysql',
    'host' => $db_host,
    'user' => $db_username,
    'password' => $db_password,
    'database' => 'migrations',
    'pdooptions' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];