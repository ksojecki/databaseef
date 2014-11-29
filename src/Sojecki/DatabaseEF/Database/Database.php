<?php

namespace Sojecki\DatabaseEF\Database;

class Database 
{
	private $sql;
	private $name;
	private $tableNames = null;

	public function __construct($host, $name, $user, $password)
	{
		$this->sql = new Sql($host, $name, $user, $password);
		$this->name = $name;
	}

	public function sql()
	{
		return $this->sql;
	}

	public function getTables()
	{
		$tables = [];
		$tableNames = $this->getTableNames();

		foreach ($tableNames as $tableName) {
			$tables[] = new Table($this, $tableName);
		}

		return $tables;
	}

	public function getTable($name)
	{
		if (!in_array($name, $this->getTableNames())) {
			return null;
		}

		return new Table($this, $name);
	}

	protected function getTableNames()
	{
		if (!$this->tableNames) {
			$query = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA=:databaseName";
			$results = $this->sql()->query($query, [':databaseName' => $this->name]);
			$this->tableNames = array_column($results, 'TABLE_NAME');
		}

		return $this->tableNames;
	}
}