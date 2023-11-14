<?php

function isJson(string $data)
{
    json_decode($data);

    return json_last_error() === JSON_ERROR_NONE;
  
}

function response_json(array $data)
{
    $response = json_encode($data);
    header('Content-Type: application/json; charset=utf-8');
    return die($response);
}