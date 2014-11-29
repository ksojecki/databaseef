<?php

namespace Sojecki\DatabaseEF\Database;

class Table
{
	private $name;
	private $database;
	private $columns;
	private $primaryKey;

	public function __construct(Database &$database, $name)
	{
		$this->database = $database;
		$this->name = $name;
		$this->getColumns();
	}

	public function getDatabase()
	{
		return $this->database;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getColumn($columnName)
	{
		if(!array_key_exists($columnName, $this->columns)) {
			return null;
		}

		return $this->columns[$columnName];
	}

	public function getColumns()
	{	
		if (!$this->columns) {
			$this->columns = [];

			foreach($this->getColumnsName() as $columnData)
			{
				$name = $columnData['Field'];
				$this->columns[$name] = new Column($this, $name, $columnData['Type']);;
				if($columnData['Key'] == 'PRI') {
					$this->primaryKey = &$this->columns[$name];
				}
			}
		}

		return $this->columns;
	}

	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}

	protected function getColumnsName()
	{
		return $this->database->sql()->query('DESCRIBE ' . $this->name);
	}
}