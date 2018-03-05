<?php

namespace Barrel;

use GuzzleHttp\Client;

class Database
{
	private $url;

	private $db;

	public function __construct($server_url, $db_name) 
	{
		$this->url = $server_url;
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
		$res = $client->post($this->url, ['headers' => $headers,'body' => $body]);

		return json_decode((string) $res->getBody(), true);
	}

	public function delete()
	{
		$request_url = $this->url . '/' . $this->db;
		$client = new Client();
		$res = $client->delete($request_url);
		return json_decode((string) $res->getBody(), true);
	}
}