<?php
//file che contiene tutti i require

require_once './DB/DbPdo.php';
require_once './DB/DbFactory.php';
require_once './config/database.php';
require_once './App/Controllers/OfferedController.php';
require_once './App/Controllers/ProvidedController.php';
require_once './App/Model/ServiceOffered.php';
require_once './App/Model/ServiceProvided.php';
require_once './App/View/Response.php';
require_once './core/router.php';