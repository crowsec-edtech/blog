<?php

require dirname(__FILE__, 3) . '/functions/db.php';

if($_SERVER['CONTENT_TYPE'] != 'application/json') {
    http_response_code(400);
    die();
}

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(400);
    die();
}

try {
    header('Content-type: application/json');

    $data = json_decode(file_get_contents('php://input'));

    if(!$data->action) {
        http_response_code(400);
        die();
    }

    if($data->action == 'create_comment') {
        if(!$data->comment) {
            http_response_code(400);
            die(json_encode([
                'comment' => 'This field is required'
            ]));
        }

        $pdo = get_connection();
        $sql = "INSERT INTO comments (comment) VALUES (:comment)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('comment', $data->comment);
        $stmt->execute();

        die(json_encode([
            'message' => 'success'
        ]));
    }

    if($data->action == 'get_comments') {
        $sql = "SELECT * FROM comments";
        
        $pdo = get_connection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $comments = $stmt->fetchAll();

        die(json_encode($comments));
    }

    if($data->action == 'delete_comment') {
        if(!$data->comment_id) {
            http_response_code(400);
            die(json_encode([
                'comment_id' => 'This field is required'
            ]));
        }

        $sql = "DELETE FROM comments WHERE id = :id";

        $pdo = get_connection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $data->comment_id);
        $stmt->execute();

        http_response_code(200);
        die();
    }

} catch(Exception $error) {
    die($error->getMessage());
    http_response_code(500);
    die();
}