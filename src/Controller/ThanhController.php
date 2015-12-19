<?php
use NanoPHP\App;


$app = App::getApp();

$app->controller('thanh', function() {
    $this->action('index', function() {
        var_dump($_GET);
        
        echo 'hello action';
        // $this->render('Thanh/index');
        $this->render();
    });
    echo 'hello controller . <br/>';
});

