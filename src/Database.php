<?php

namespace Barrel;

use GuzzleHttp\Client;

class Database
{
	private $server_url;
	private $db_name;
	private $db_url;

	public function __construct($server_url, $db_name) 
	{
		$this->server_url = $server_url;
		$this->db_name = $db_name;
		$this->db_url = $this->server_url . '/' . $this->db_name;
	}

	public function post()
	{
		$body_array = ['database_id' => $this->db_name];
		$body = json_encode($body_array);

		$headers = [
						'Content-Type' => 'application/json',
						'Accept' => 'application/json'
					];

		$client = new Client();
		$res = $client->post($this->server_url, ['headers' => $headers,'body' => $body]);

		return json_decode((string) $res->getBody(), true);
	}

	public function get()
	{
		$client = new Client();
		$res = $client->get($this->db_url);

		return json_decode((string) $res->getBody(), true);
	}

	public function getAll()
	{

	}

	public function delete()
	{
		$client = new Client();
		$res = $client->delete($this->db_url);
		return json_decode((string) $res->getBody(), true);
	}
}