<?php
require_once __DIR__.'/../vendor/autoload.php';
use Framework\Foundation\Application;
$app = Application::instance();
$app->load_service_providers()->run();
