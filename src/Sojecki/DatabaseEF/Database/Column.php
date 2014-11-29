<?php

namespace Sojecki\DatabaseEF\Database;

class Column
{
	private $name;
	private $type;
	private $table;
	private $isPrimaryKey;

	public function __construct(Table &$table, $name, $type, $isPrimaryKey = false)
	{
		$this->table = $table;
		$this->name = $name;
		$this->type = $type;
		$this->isPrimary = $isPrimaryKey;
	}

	public function name()
	{
		return $this->name;
	}

	public function type()
	{
		return $this->type;
	}

	public function table()
	{
		return $this->table;
	}

	public function isPrimaryKey()
	{
		return $this->isPrimaryKey;
	}
}