<?php

use Fdci\Core\Router;

$router = new Router();

$router->add('/register', controllerAction: 'AuthController@register');

return $router;