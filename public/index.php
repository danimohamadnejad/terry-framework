<?php
require_once __DIR__.'/../vendor/autoload.php';
use Framework\Application;
$app = Application::instance();
<<<<<<< HEAD
$app->run();
=======
echo $app->request()->uri();
>>>>>>> 4fd34d8719a7754944c788416af38b32308c695e
