<?php

use PHPUnit\Framework\TestCase;
use Barrel\Database;

final class DatabaseTest extends TestCase
{
	public function testPostDatabase()
	{
		$db = new Database('http://localhost:7080/dbs', 'mydbTest');
		$this->assertInstanceOf(Database::class, $db);
		
	}

	public function testGetDatabase()
	{
		$db = Database::get('http://localhost:7080/dbs', 'mydbTest');
		$this->assertInstanceOf(Database::class, $db);
		
	}

	public function testGetListOfDatabases()
	{
		$db = Database::all('http://localhost:7080/dbs', 'mydbTest');
		$this->assertInstanceOf(Database::class, $db);
	}

	public function testDeleteDatabase()
	{
		$db = Database::delete('http://localhost:7080/dbs', 'mydbTest');
		$this->assertInstanceOf(Database::class, $db);
	}
}