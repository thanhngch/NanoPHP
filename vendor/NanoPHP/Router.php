<?php
namespace NanoPHP;
use NanoPHP\App;
use NanoPHP\Router\DefaultRouter;

class Router {
    
    static function scope($path, callable $router) {
        $defaultRouter = DefaultRouter::getDefaultRouter();
        $router($defaultRouter);
    }

    static function run() {
        try {
            $defaultRouter = DefaultRouter::getDefaultRouter();
            $defaultRouter->run(App::getApp());
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

}