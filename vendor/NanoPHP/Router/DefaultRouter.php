<?php
use NanoPHP\App;

namespace NanoPHP\Router;

class DefaultRouter {
    static $paths = [];
    static public $defaultRouter = NULL;

    private function __construct() {

    }
    public static function getDefaultRouter() {
        if (DefaultRouter::$defaultRouter === NULL) {
            DefaultRouter::$defaultRouter = new DefaultRouter();
        }
        return DefaultRouter::$defaultRouter;
    }
    public function run($app) {

        $request_url = $_SERVER['REQUEST_URI'];
        $script_name = $_SERVER['SCRIPT_NAME'];

        $position_webroot = strpos($script_name, '/webroot/index.php');
        $real_request_url = substr($request_url, $position_webroot);
        $array_url = explode('?', $real_request_url); // split ? is remove get query
        $real_request_url = $array_url[0];
        $array_url = explode('/', $real_request_url);

        // var_dump($array_url);

        if ($real_request_url === '/') {
            $controller_name = self::$paths['/']['controller'];
            $action_name = isset(self::$paths['/']['action_name']) ? 
                self::$paths['/']['action_name'] : 'index';
        } else {         
            $controller_name = $array_url[1];
            $action_name = isset($array_url[2]) ? $array_url[2] : 'index';
            $action_name = ($action_name !== '') ? $action_name : 'index';
        }
        $file_path = APP . DS . 'Controller' . DS . ucfirst($controller_name) . 'Controller.php'; 
        if (is_file($file_path)) {
            include_once ($file_path);
        } else {
            throw new \Exception('<p style="color:red">Not found file ' . 
                $file_path . ' at line ' . __LINE__ . ' in file ' . __FILE__ . '</p>');
        }
    
        $app->_runController($controller_name);
        $app->_runAction($controller_name, $action_name);
    }
    
    public static function path($path, $link_to) {
        self::$paths[$path] = $link_to;
    }
}