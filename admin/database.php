<?php
$server = '127.0.0.1';
$username = 'root';
$password = 'vcfimh10';
$database = 'socal';
try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
