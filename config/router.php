<?php
use NanoPHP\Router;

$router = new Router();

Router::scope('/', function($router){
    $router->path('/', ['controller' => 'thanh', 'action' => 'index']);
});
