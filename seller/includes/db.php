<?php

class Database
{

	private $con;
	public function connect()
	{
		$this->con = new Mysqli("localhost", "root", "", "gas_order");
		return $this->con;
	}
}