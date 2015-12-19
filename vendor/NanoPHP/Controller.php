<?php
use NanoPHP\Action;

namespace NanoPHP;

class Controller {
    public $controller_name;
    public $callback;
    public $actions = [];

    function __construct($controller_name, \Closure $callback) {
        $this->controller_name = $controller_name;
        $this->callback = $callback;
    }
    
    function action($action_name, \Closure $callback) {
        $this->actions[$action_name] = new Action($this->controller_name, 
            $action_name, $callback);
    }

    public function getController() {
        return $this;
    }

    public function getCallback() {
        return $this->callback;
    }
    
    public function getAction($action_name) {
        if (isset($this->actions[$action_name])) {
            return $this->actions[$action_name];
        } else {
            throw new \Exception('<p style="color:red">Not found action ' . 
                $action_name . ' in controller ' . $this->controller_name . ' at line ' .
                __LINE__ . ' in file ' . __FILE__ . '</p>');
        }
    }
}