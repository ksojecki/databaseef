<?php

namespace Sojecki\DatabaseEF\Database;

class Sql
{
	private $pdo;

	public function __construct($host, $database, $user, $password)
	{
		$this->pdo = new \PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
	}
	
	public function command($command, $params = null)
	{
		
	}

	public function query($command, $params = null)
	{
		$query = $this->pdo->prepare($command, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
		$query->execute($params);
		return $query->fetchAll();
	}
}