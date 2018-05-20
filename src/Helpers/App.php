<?php

namespace Helpers;

class App
{
    public static function init() { }

    public static function fireRequest($method, $request)
    {
        $dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
            $routes = require(ROOT . '/src/routes.php');
            foreach ($routes as $route) {
                $r->addRoute($route[0], $route[1], $route[2]);
            }
        });

        $routeInfo = $dispatcher->dispatch($method, $request);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                echo '404';
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                $controllers = array_keys($handler);
                $methods = array_values($handler);

                $class = '\\App\\Controllers\\' . $controllers[0];
                $method = $methods[0];
                $run = (new $class)->$method(...array_values($vars));
                break;
        }
    }
}
