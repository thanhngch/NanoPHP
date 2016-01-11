<?php
use NanoPHP\App;


$app = App::getApp();

$app->controller('pages', function() {
    $this->action('index', function() {
        var_dump($_GET);
        
        echo 'hello action';
        $this->set('happy', 'Having a happy life.');
        // $this->render('Pages/index');
        $this->render();
    });
    $this->action('test', function() {
        $this->render();
    });
    echo 'hello controller . <br/>';
});

