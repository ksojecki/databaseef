<?php

namespace Sojecki\DatabaseEF\Database;

class Table
{
	public $name;

	private $database;

	public function __construct($database, $name)
	{
		$this->database = $database;
		$this->name = $name;
	}

	public function getColumnNames()
	{	

	}

	public function database()
	{
		return $this->database;
	}
}