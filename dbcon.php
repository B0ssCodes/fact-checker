<?php  //This file is just to connect to the db.
$host = 'mysql.db.mdbgo.com';
$user = 'bossonmdbgo_factchecker';
$password = 'Proutcapout1#';
$dbname = 'bossonmdbgo_factchecker';

// Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //make it so that we can fetch data as objects
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //make it so that we can use LIMIT in our queries

?>