<?php

function __autoload($name) {
    require (__DIR__ . DS . $name . '.php');
}