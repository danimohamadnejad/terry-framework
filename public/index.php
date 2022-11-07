<?php
require_once __DIR__.'/../vendor/autoload.php';
use Framework\Application;
$app = Application::instance();
echo $app->request()->uri();