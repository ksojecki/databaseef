<?php

namespace Sojecki\DatabaseEF\Text;

class CharsetConverter
{
	private $from;
	private $to;

	public function __construct($from, $to)
	{
		$this->setFrom($from);
		$this->setTo($to);
	}

	public function convert($string)
	{
		$string;
	}

	public function getFrom()
	{
		return $this->from;
	}

	public function setFrom($from)
	{
		$this->from = $from;
	}

	public function getTo()
	{
		return $this->to;
	}

	public function setTo($to)
	{
		$this->to = $to;
	}
}