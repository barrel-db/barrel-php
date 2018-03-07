<?php

namespace Barrel;

use GuzzleHttp\Client;

class Database
{
	private $server_url;
	private $db_name;
	private $db_url;
	private $docs_url;

	private $post_headers = [
						'Content-Type' => 'application/json',
						'Accept' => 'application/json'
						];

	public function __construct($server_url, $db_name) 
	{
		$this->server_url = $server_url;
		$this->db_name = $db_name;
		$this->db_url = $this->server_url . '/' . $this->db_name;
		$this->docs_url = $this->db_url . '/docs';
	}

	//Database Functions

	public function post()
	{
		$body_array = ['database_id' => $this->db_name];
		$body = json_encode($body_array);

		$client = new Client();
		$res = $client->post($this->server_url, [
					'headers' => $this->post_headers,
					'body' => $body
				]);

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
		$client = new Client();
		$res = $client->get($this->server_url);

		return json_decode((string) $res->getBody(), true);
	}

	public function delete()
	{
		$client = new Client();
		$res = $client->delete($this->db_url);
		return json_decode((string) $res->getBody(), true);
	}

	//Document Functions

	public function postDoc($doc)
	{
		
		$body = json_encode($doc);

		$client = new Client();
		$res = $client->post($this->docs_url, [
					'headers' => $this->post_headers,
					'body' => $body
				]);

		return json_decode((string) $res->getBody(), true);
	}

	public function getDoc($doc_id)
	{
		$get_doc_url = $this->docs_url . '/' . $doc_id;

		$client = new Client();
		$res = $client->get($get_doc_url);

		return json_decode((string) $res->getBody(), true);
	}
}