<?php

include "vendor/autoload.php";

$table = new \Anonym\Components\Tools\Table();

$response = $table->varchar('aa')
    ->int('bb')
    ->null('NOT NULL');


var_dump($response->fetch());