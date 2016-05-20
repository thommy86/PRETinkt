<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysqli',
    'host'      => '81.169.238.114',
    'database'  => 'pretinkt',
    'username'  => 'admin_pretinkt',
    'password'  => 'M1ej!8f1',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();