<?php


use NanoPHP\Router;
use NanoPHP\Controller;

namespace NanoPHP;

class Base {
    static $controllers;
    
    static protected function _addController($name, callable $callback) {
        self::$controllers[$name] = new Controller($name, $callback);
    }

    static protected function _getController($name) {
        if (isset(self::$controllers[$name])) {
            return self::$controllers[$name];
        } else {
            throw new \Exception('<p style="color:red">Not found controller ' . 
                $name . ' at line ' . __LINE__ . ' in file ' . __FILE__ . '</p>');
        }
        
    }

    static public function run() {
        Router::run();
    }
}