# Barrel-php
PHP client for [Barrel-DB](https://barrel-db.org/), an open source document-oriented database focusing on data locality (put/match the data next to you) and P2P.

Visit https://barrel-db.org/ for installation intructions for Barrel-DB and to learn about the concepts that underpin Barrel-DB. 

## Installation

Install via composer:

```
$ composer require barrel/barrel-php
```
## Usage

Barrel-DB uses the JSON format but using this library spares you from converting your data to JSON by using associative arrays which are native to PHP. For example:

The following doc:
```
{
  "id" : "tahteche",
  "name" : "Teche Tah",
  "hobbies" : ["eat", "sleep", "code"]
}
```
Will be:
```
[
  "id" => "tahteche",
  "name" => "Teche Tah",
  "hobbies" => ["eat", "sleep", "code"]
]
```

The example below assumes your Barrel-DB server is serving request at, http://localhost:7080/dbs/ and the database you are perfoming operations on is `testdb`. All the functions below operate on an instance of the `Database` class which has been instantiated with the server link and database name.
```
<?php

use Barrel\Database;

$server_url = 'http://localhost:7080/dbs';
$db_name = 'testdb';

=======================================================
Database Operations - Create, get, and delete databases
=======================================================

//Create instance of the Database class which you will use for request to create or use a Barrel databse.
$db = new Database($server_url, $db_name);

//Create 'testdb' database on you Barrel server
$res = $db->post();

//Get info about the 'testdb' database e.g number of documents
$res = $db->get();

//Get list of all databases available on your Barrel server
$res = $db->getAll();

//Delete 'testdb' database from Barrel
$res = $db->delete();

===============================================================
Document Operations - Create, read, update and delete documents
===============================================================

//Create a document in the 'testdb' database
$res = $db->postDoc($doc);

//Read a document from the 'testdb' database
$res = $db->getDoc($doc_id);

//Read ALL documents from the 'testdb' database
$res = $db->postAllDocs();

//Update a document in the 'testdb' database
$res = $db->putDoc($doc);

//Delete a document from the 'testdb' database
$res = $db->deleteDoc($doc_id);

```

## Submitting bugs and feature requests
Bugs and feature request are tracked via GitHub issues.

## Author

Tah Teche - https://twitter.com/tahteche

## License

Barrel-php is licensed under the Apache-2.0 License - see the LICENSE file for details
