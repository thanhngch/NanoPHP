<?php
use NanoPHP\Router;

$router = new Router();

Router::scope('/', function($router){
    $router->path('/', ['controller' => 'pages', 'action' => 'index']);
});
