<?php

define('BASEDIR', realpath(__DIR__ . '/../'));
require BASEDIR . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASEDIR);
$dotenv->load();

$router = new \App\Router();
$router->load($_SERVER);