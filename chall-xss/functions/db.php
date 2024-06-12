<?php

function get_connection() {
    $db_path = dirname(__FILE__,2) . '/database.sqlite';
    $pdo = new PDO("sqlite:{$db_path}");
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
    return $pdo;
}
