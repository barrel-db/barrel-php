<?php

namespace Barrel;

use GuzzleHttp\Client;

class Database
{
	private $uri;

	private $db;

	public function __construct($server_uri, $db_name) 
	{
		$this->uri = $server_uri;
		$this->db = $db_name;
	}

	public function post()
	{
		$body_array = ['database_id' => $this->db];
		$body = json_encode($body_array);

		$headers = [
						'Content-Type' => 'application/json',
						'Accept' => 'application/json'
					];

		$client = new Client();
		$res = $client->post($this->uri, ['headers' => $headers,'body' => $body]);

		return $res;
	}
}