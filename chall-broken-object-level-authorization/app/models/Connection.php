<?php

namespace app\models;

use PDO;

class Connection
{
    public static function connect()
    {
        $config = (object)require('../config.php');
        $pdo = new PDO("mysql:host={$config->host};dbname={$config->dbname};charset=utf8", $config->user, $config->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}