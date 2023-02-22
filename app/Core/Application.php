<?php

namespace App\Core;

class Application
{
    protected $router;
    protected $config;
    protected $sessionHandler;

    public function __construct()
    {
        $this->loadConfig();
        $this->loadRoutes();
        $this->setExceptionHandler();
    }

    private function setExceptionHandler()
    {
        $exceptionHandler = new ExceptionHandler();
        @set_exception_handler(array($exceptionHandler, 'handle'));
    }

    private function loadRoutes()
    {
        $this->router = require __DIR__.'/../routes.php';
    }

    private function loadConfig()
    {
        $this->config = require __DIR__.'/../../config.php';
    }

    public function handle(Request $request)
    {
        $uri = $request->getServerParams()['REQUEST_URI'];
        $method = $request->getServerParams()['REQUEST_METHOD'];

        $hiddenMethod = isset($request->getParameters()['_method']) ? $request->getParameters()['_method'] : null;

        if ($hiddenMethod && strtolower($method) === 'post') {
            $method = $hiddenMethod;
        }

        //identify the route and call the controller method, return the response from the controller
        $route = $this->router->getRouteAction($uri, $method);
        $action = $route['action'];
        $parameters = isset($route['parameters']) && count($route['parameters']) ? $route['parameters'] : [];

        if (isset($route['filters'])) {
            //an exception will be thrown if any of the filters fail
            $this->filterRoute($route);
        }

        if (is_callable($action)) {
            return call_user_func($action, ...$parameters);
        } elseif(is_string($action) && strpos($action, '@') !== false) {
            list($controllerClass, $method) = explode('@', $action);

            $controllerClass = 'App\Controllers\\'.$controllerClass;
//            var_dump( $controllerClass);die;

            $controllerObject = new $controllerClass();

            $controllerObject->setRequest($request);

            //passing an array to call_user_func, containing an object and a method name, will call that method on object
            return call_user_func([$controllerObject, $method], ...$parameters);
        }
        //TODO - after presentation 4, throw an Exception here
        echo 'Wrong route definition';
        die();
    }

    private function filterRoute($route)
    {
        //filter classes should be UserFilter, AdminFilter and should have a method handle, that throws an exception if
        //the user doesn't have the necessary permissions
        var_dump($route);die;

        foreach ($route['filters'] as $filter) {
            $className = 'App\Filters\\'.ucfirst($filter).'Filter';
            $instance = new $className();
            $instance->handle();
        }
    }
}
