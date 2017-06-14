<?php

require_once 'db_stripe.php';



if(isset($_POST['stripeToken'])) {

	$token = $_POST['stripeToken'];

	try {	
		\Stripe\Charge::create([
    "amount" => 4000, // amount in cents, again
    "currency" => "usd",
    "card" => $token,
    "description" => $user->email
    ]);

		$db->query("UPDATE users SET sunday_paid =1 WHERE id = {$user->id}");

	}	catch(Stripe_CardError $e) {
		
	}

	header('Location: join.php');
	exit();
}

