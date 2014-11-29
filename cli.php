<?php

require __DIR__.'/vendor/autoload.php';

$database = new \Sojecki\DatabaseEF\Database\Database('127.0.0.1', 'convert_sample_working', 'root', null);

$table = $database->getTable('jezyki_kategorie');

var_dump($table->columns());