<?php

namespace app\core;

use Exception;

class Request
{
    public static function input($name)
    {
        if(isset($_POST[$name]))
        {
            return $_POST[$name];
        }

        throw new Exception("Index {$name} not exist!");

    }

    public static function all()
    {
        return $_POST;
    }

    public static function only(string|array $only)
    {
        $fieldsPost = self::all();
        $fieldsPostkeys = array_keys($fieldsPost); 

        foreach($fieldsPostkeys as $index => $value)
        {
            if($value != (is_string($only) ? $only : (isset($only[$index]) ? $only[$index] : null)))
            {
                unset($fieldsPost[$value]);
            } 
        }

        return $fieldsPost;
    }


    public static function excepts(string|array $excepts)
    {
        $fieldsPost = self::all();

        if(is_array($excepts))
        {
            foreach($excepts as $index => $value)
            {
                unset($fieldsPost[$value]);
            }
        }

        if(is_string($excepts))
        {
            unset($fieldsPost[$excepts]);
        }

        return $fieldsPost;
    }


    public static function query($name)
    {
        if(!isset($_GET[$name]))
        {
            throw new Exception("Query string {$name} not exist!");
        }
        return $_GET[$name];
    }

    public static function toJson(string $data)
    {
        return json_encode($data);
        
    }

    public function toArray($data)
    {
        if(isJson($data))
        {
            return json_decode($data);
        }
    }
}