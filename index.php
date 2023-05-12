<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
//  header("Access-Control-Allow-Methods: PUT");
//  header("Access-Control-Max-Age: 3600");
//  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/boostrap.php';


use App\Core\Router;
use App\DB\DbFactory;



$data = require 'config/database.php';
$routes = require 'config/router.config.php';
$router = new Router($routes['routes']);
$arrController = $router->dispatch();

$class = $arrController[0]; 
$method = $arrController[1];
$param = $arrController[2] ?? [];




try {
    $conn = (DbFactory::create($data))->getConn();


    $controller = new $class($conn);
    if (method_exists($controller, $method)) {
        $data = $controller->$method($param);
    }
} catch (\PDOException $e) {
    var_dump($e->getMessage());
}
