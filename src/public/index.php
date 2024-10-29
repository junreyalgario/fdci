<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../vendor/autoload.php';

// Load routes
$router = require '../config/routes.php';

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI']);