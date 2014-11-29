<?php

namespace Sojecki\DatabaseEF\Database;

class Table
{
	public $name;

	private $database;
	private $columns;

	public function __construct($database, $name)
	{
		$this->database = $database;
		$this->name = $name;
	}

	public function columns()
	{	
		if ($this->columns) {
			return $this->columns;
		}

		$this->columns = [];

		foreach($this->getColumnsName() as $columnData)
		{
			$this->columns[] = new Column($this, $columnData['Field'], $columnData['Type']);
		}

		return $this->columns;
	}

	public function database()
	{
		return $this->database;
	}

	protected function getColumnsName()
	{
		return $this->database->sql()->query('DESCRIBE ' . $this->name);
	}
}