<?php

namespace app\core;

use app\support\RequestType;
use app\support\Uri;
use app\routes\Routes;

class RoutersFilters
{
    private string $uri;
    private string $method;
    private array $routesRegistered;

    public function __construct()
    {
        $this->uri = Uri::get();
        $this->method = RequestType::get();
        $this->routesRegistered = Routes::get();
    }

    private function simpleRouter()
    {
        if(array_key_exists($this->uri,$this->routesRegistered[$this->method]))
        {
            return $this->routesRegistered[$this->method][$this->uri];
        }

        return null;
    }

    private function dynamicRouter()
    {
        foreach($this->routesRegistered[$this->method] as $index => $route)
        {
            $regex = str_replace('/', '\/', trim($index, '/'));
            if($index != '/' && preg_match("/^$regex$/", trim($this->uri, '/'))){

                $routesRegisteredFound = $route;
                break;
            }
            else
            {
                $routesRegisteredFound = null;
            }
        }

        return $routesRegisteredFound;
    }

    public function get()
    {
        $router = $this->simpleRouter();
        if($router)
        {
            return $router;
        }
        
        $router = $this->dynamicRouter();
        if($router)
        {
            return $router;
        }

        die('404');
    }   
}