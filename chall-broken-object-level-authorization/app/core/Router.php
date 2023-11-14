<?php

namespace app\core;

class Router
{
    public static function run()
    {

        try
        {
            $routerRegistered = new RoutersFilters;
            $router = $routerRegistered->get();

            $controller = new Controller;
            $controller->execute($router);

        }
        catch(\Throwable $th)
        {
            echo $th->getMessage();
        }

        
    }
}