<?php



session_start();


require_once 'vendor/autoload.php';

$server = '127.0.0.1';
$username = 'root';
$password = 'vcfimh10';
$database = 'socal';
try{
	$db = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $f){
	die( "Connection failed: " . $f->getMessage());
}


$query = $db->prepare('SELECT * FROM users WHERE id=:id');
//using bindParam helps prevent SQL Injection
$query->bindParam(':id', $_SESSION['user_id']);
$query->execute();

$stripe = [
	'publishable' => 'pk_live_31jLhPzbpwRRIpJJv0ibxs4S',
	'private' => 'sk_live_9h0Zftof2iDX7LquWCuqmN4r'
];


\Stripe\Stripe::setApiKey($stripe['private']);





$userQuery = $db->prepare( "SELECT id,name,lastname,email,full_paid,saturday_paid,sunday_paid, tour_paid
	FROM users 
	WHERE id = :user_id
	");

$userQuery->execute(['user_id' => $_SESSION['user_id']]);

$user = $userQuery->fetchObject();





