<?php

use Fdci\Core\Router;

$router = new Router();

$router->add('/register', controllerAction: 'AuthController@register');
$router->add('/contacts', controllerAction: 'ContactController@index');

return $router;