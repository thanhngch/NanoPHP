<?php
namespace NanoPHP;

class Action {
    public $controller_name;
    public $action_name;
    public $callback;
    public $restFull = [];

    function __construct($controller_name, $action_name, \Closure $callback) {
        $this->controller_name = $controller_name;
        $this->action_name = $action_name;
        $this->callback = $callback;
    }

    function getAction() {
        return $this;
    }

    function getCallback() {
        return $this->callback;
    }

    function render($file_path = '') {        
        if ($file_path === NULL) {
            return;
        }
        if ($file_path === '') {
            include_once( TEMPLATE . ucfirst($this->controller_name) . DS . 
                $this->action_name . VIEW_EXT);
            return;
        }
        include_once( TEMPLATE . $file_path . VIEW_EXT);
    }
}