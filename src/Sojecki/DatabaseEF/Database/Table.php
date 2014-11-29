<?php

namespace Sojecki\DatabaseEF\Database;

class Table
{
	public $name;
	private $database;
	private $columns;
	private $primaryKey;

	public function __construct($database, $name)
	{
		$this->database = $database;
		$this->name = $name;
	}

	public function database()
	{
		return $this->database;
	}

	public function columns()
	{	
		if (!$this->columns) {
			$this->columns = [];

			foreach($this->getColumnsName() as $columnData)
			{
				$column = new Column($this, $columnData['Field'], $columnData['Type']);
				$this->columns[] = $column;
				if($columnData['Key'] == 'PRI') {
					$this->primaryKey = $column;
				}
			}
		}

		return $this->columns;
	}

	protected function getColumnsName()
	{
		return $this->database->sql()->query('DESCRIBE ' . $this->name);
	}
}