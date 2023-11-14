<?php

namespace app\models;

abstract class Model 
{
    protected $table;
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::connect();
    }

    public function find($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = :value";
        $pdo = $this->connection->prepare($sql);
        $pdo->bindValue('value', $value);
        $pdo->execute();

        return $pdo->fetch();
    }
}