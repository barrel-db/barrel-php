<?php

use PHPUnit\Framework\TestCase;
use Barrel\Database;


final class DatabaseDocOperationsTest extends TestCase
{
	private $db;
	private $server_url = BARREL_SERVER_URL;
	private $db_name = BARREL_DB_NAME;

	private $doc1 = [
						'name' => 'John Doe',
						'age' => 17,
						'human' => true,
						'hobbies' => ['family', 'coding', 'jeopardy']
					];

	private $doc2 = [
						'id' => 'janed',
						'name' => 'Jane Doe',
						'age' => 23,
						'human' => true,
						'hobbies' => ['basketball', 'coding', 'wheel of fortune']
					];

	public static function setUpBeforeClass()
	{
		$db = new Database(BARREL_SERVER_URL, BARREL_DB_NAME);
		$db->post();
	}

	public static function tearDownAfterClass()
	{
		$db = new Database(BARREL_SERVER_URL, BARREL_DB_NAME);
		$db->delete();
	}

	protected function setUp()
	{
		$this->db = new Database(BARREL_SERVER_URL, BARREL_DB_NAME);
	}

	public function testPostDoc()
	{
		$res1 = $this->db->postDoc($this->doc1);
		$res2 = $this->db->postDoc($this->doc2);

		$this->assertArrayHasKey('id', $res1);
		$this->assertEquals($this->doc2['id'], $res2['id']);

		$doc1['id'] = $res1['id'];
	}
}