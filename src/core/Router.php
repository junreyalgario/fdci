<?php

namespace Fdci\Core;

class Router
{
    protected $routes = [];

    public function add($route, $controllerAction)
    {
        // Convert the route to regular expression
        $route = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
        $this->routes["#^$route$#"] = $controllerAction;
    }

    public function dispatch($uri)
    {
        // Get the uri path
        $uri = parse_url($uri)['path'];
        foreach ($this->routes as $route => $controllerAction) {
            if (preg_match($route, $uri, $matches)) {
                array_shift($matches);
                [$controllerName, $action] = explode('@', $controllerAction);

                // Init and call controller action with parameters
                $controller = new ("Fdci\\Controllers\\{$controllerName}");
                call_user_func_array([$controller, $action], array_merge([new Request()], $matches));
                return;
            }
        }
        // Route no match
        echo "404 Not Found";
    }
}