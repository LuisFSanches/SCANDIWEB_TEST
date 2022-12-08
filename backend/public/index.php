<?php

require_once("../vendor/autoload.php");
$envPath = './';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Credentials: true');

new App\Core\Router();