<?php

namespace app\core;

use Exception;

class Controller
{
   public function execute(string $router)
   {
        if(!str_contains($router, '@'))
        {
            throw new Exception("The route is registered with a wrong format, the expected example format is: HomeController@index");
        }

        list($controller, $method) = explode('@', $router);

        $namespace = "app\\controllers\\";


        $controllerNamespace = $namespace.$controller;

        if(!class_exists($controllerNamespace))
        {
            throw new Exception("The Controller {$controllerNamespace} not exist!");
        }

        $controller = new $controllerNamespace;

        if(!method_exists($controller, $method))
        {
            throw new Exception("The method {$method} not exist in controller {$controllerNamespace}");
        }

        $params = new ControllerParams;
        $params = $params->get($router);

        $controller->$method($params);
   } 
}