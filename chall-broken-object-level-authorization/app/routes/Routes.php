<?php

namespace app\routes;

class Routes
{
    public static function get()
    {
        return [

            'get' => [
                '/' => 'ProfileController@index'
            ],

            'post' => [
                '/api/profile' => 'ProfileController@show'
            ]
        ];

    }
}