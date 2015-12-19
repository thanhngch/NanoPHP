<?php
use NanoPHP\Router;
use NanoPHP\Base;
use NanoPHP\Controller;

namespace NanoPHP;


class App extends Base {
    static $app = NULL;    

    private function __construct() {
        // echo "nano php is worked!";
    }
    // singerton
    static function getApp() {
        if (App::$app === NULL) {
            App::$app = new App();
        }
        return App::$app;
    }
    static function controller($name, callable $callback) {
        
        Base::_addController($name, $callback);
    }
    
    static function getController($name) {
        return Base::_getController($name);
    }

    static function _runController($controller_name) {
        try {
            // echo $controller_name;
            $controller = self::_getController($controller_name);
            $run_controller = \Closure::bind($controller->getCallback(), 
                $controller, 'NanoPHP\Controller');
            $run_controller();
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    static function _runAction($controller_name, $action_name) {
        try {
            $controller = self::_getController($controller_name);
            $action = $controller->getAction($action_name);
            $run_action = \Closure::bind($action->getCallback(), 
                $action->getAction(), 'NanoPHP\Action');
            $run_action();
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
}