<?php
use NanoPHP\App;

require __DIR__ . DIRECTORY_SEPARATOR . 'paths.php';

require ROOT . DS . 'vendor' . DS . 'autoload.php';
require CONFIG . DS . 'router.php';

$app = App::getApp();

$app->run();
