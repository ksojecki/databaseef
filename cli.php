<?php

require __DIR__.'/vendor/autoload.php';

$database = new \Sojecki\DatabaseEF\Database\Database('127.0.0.1', 'convert_sample_working', 'root', null);

$table = $database->getTable('jezyki_kategorie');

$database->sql()->changeResultsEncoding('latin1');
$result = $database->sql()->query('SELECT id, pl FROM jezyki_kategorie');

foreach($result as $string)
{
	var_dump([$string['id'] => $string['pl']]);
}

$database->sql()->changeResultsEncoding('utf8');
