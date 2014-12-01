<?php

require __DIR__.'/vendor/autoload.php';

$database = new \Sojecki\DatabaseEF\Database\Database('127.0.0.1', 'convert_sample_working', 'root', null);

$converter = new \Sojecki\DatabaseEF\Converter(\Sojecki\DatabaseEF\Converter::LATIN1, \Sojecki\DatabaseEF\Converter::UTF8);

foreach ($database->getTables() as $table) {
	foreach($table->getColumns() as $column) {
		$converter->convert($column);
	}
}