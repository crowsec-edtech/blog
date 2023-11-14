<?php

require "../vendor/autoload.php";
session_start();

use app\core\Router;
Router::run();