<?php

include "vendor/autoload.php";
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$table = new \Anonym\Components\Tools\Table();

$response = $table->text('aa')
    ->defualt('aa')
    ->varchar('aa');

var_dump($response);