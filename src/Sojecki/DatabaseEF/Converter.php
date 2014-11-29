<?php

namespace Sojecki\DatabaseEF;

class Converter
{
	public $from;
	public $to;

	const LATIN1 = 'latin1';
	const UTF8 = 'utf8';

	public function __construct($from, $to)
	{
		$this->from = $from;
		$this->to = $to;
	}

	public function convert(Database\Column $column)
	{
		if (!$column->isTextVariable()) {
			return;
		}

		$sql = $column->getTable()->getDatabase()->sql();
		$sql->changeResultsEncoding('latin1');
		$pkName = $column->getTable()->getPrimaryKey()->getName();

		$result = $sql->query('SELECT ' . $pkName . ', ' . $column->getName() . ' FROM '. $column->getTable()->getName());
		
		$sql->changeResultsEncoding('utf8');
	}
}