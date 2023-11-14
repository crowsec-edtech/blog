<?php

class Auth
{
    public $username;
    public $role;

    public function __construct($username, $role)
    {
        $this->username = $username;
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getName()
    {
        return $this->username;
    }

    public function getAll()
    {
        return (object)["username" => $this->username, "role" => $this->role];
    }
}

class Log
{
    public $logfile;

    public function createLog($logfile)
    {
        $this->logfile = "/tmp/".$logfile.".txt";
    }

    public function __destruct()
    {
        system("rm " . $this->logfile);
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['payload']) && !empty($_POST['payload']))
    {
        $user = unserialize($_POST['payload']);
        $response = [
            "username" => $user->username,
            "role" => $user->role,
        ];

        if($user->getRole() == "admin" && $user->getName() == "admin")
        {
            $response["message"] = "Parabens voce concluiu o desafio";
        }

        die(json_encode($response));
    }

    die("Preencha o campo acima");
}

$auth = serialize(new Auth("John Doe", "guest"));
require 'views/index_front.php';

?>