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

		$this->assertEquals('test123456', $res['database_id']);
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
		$res = $this->db->delete();		
		$this->assertTrue($res['ok']);
	}
}