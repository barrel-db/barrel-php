<?php

use PHPUnit\Framework\TestCase;
use Barrel\Database;

final class DatabaseTest extends TestCase
{
	private $db;
	private $server_url = 'http://localhost:7080/dbs';
	private $db_name = 'test123456';

	protected function setUp()
	{
		$this->db = new Database($this->server_url, $this->db_name);
	}

	public function testPostDatabase()
	{
		$res = $this->db->post();

		$this->assertEquals($this->db_name, $res['database_id']);
	}

	public function testGetDatabase()
	{
		$res = $this->db->get();

		$this->assertEquals($this->db_name, $res['id']);
	}

	public function testGetListOfAllDatabases()
	{
		$res = $this->db->getAll();

		$this->assertContains($this->db_name, $res);
	}

	public function testDeleteDatabase()
	{
		$res = $this->db->delete();		
		$this->assertTrue($res['ok']);
	}
}