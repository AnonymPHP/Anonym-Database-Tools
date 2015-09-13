<?php

include "vendor/autoload.php";

ini_set('display_errors', 'On');
error_reporting(E_ALL);
$table = new \Anonym\Components\Tools\Table();

$table->int('aa')
    ->int('bb')
    ->varchar('aa')
    ->varchar('bb')
    ->create('deneme');


echo $table->fetch();