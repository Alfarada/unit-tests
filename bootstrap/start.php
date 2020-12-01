<?php

use Styde\{AccessHandler, Authenticator, SessionArrayDriver, SessionManager};

require __DIR__ . '/../vendor/autoload.php';

class_alias('Styde\AccessHandler', 'Access');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$data = array(
    'user_data' => array(
        'name' => 'Alfredo',
        'role' => 'teacher'
    )
);

$driver = new SessionArrayDriver($data); 
$session = new SessionManager($driver);
$auth = new Authenticator($session);
$access = new AccessHandler($auth);