<?php

namespace app\models;

class User extends Model
{
    protected $table = 'users';

    public function insert(array $data)
    {
        $sql = "INSERT INTO {$this->table} (username, email, cpf, genero) values (:username, :email, :cpf, :genero)";
        $pdo = $this->connection->prepare($sql);
        
        foreach($data as $key => $value)
        {
            $pdo->bindValue($key, $value);
        }

        $pdo->execute();
    }
}