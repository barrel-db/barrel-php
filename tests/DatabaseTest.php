<?php

use PHPUnit\Framework\TestCase;
use Barrel\Database;

final class DatabaseTest extends TestCase
{
	private $db;

	protected function setUp()
	{
		$this->db = new Database('http://localhost:7080/dbs', 'test123456');
	}

	public function testPostDatabase()
	{
		$res = $this->db->post();		
		$this->assertEquals(201, $res->getStatusCode());
	}

	public function testGetDatabase()
	{
		$this->assertInstanceOf(Database::class, $db);
		
	}

	public function testGetListOfDatabases()
	{
		$this->assertInstanceOf(Database::class, $db);
	}

	public function testDeleteDatabase()
	{
		$this->assertInstanceOf(Database::class, $db);
	}
}