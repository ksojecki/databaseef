<?php

namespace Sojecki\DatabaseEF\Database;

class Column
{
	private $name;
	private $type;
	private $table;

	public function __construct(Table $table, $name, $type)
	{
		$this->table = $table;
		$this->name = $name;
		$this->type = $type;
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
}