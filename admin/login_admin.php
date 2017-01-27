

<?php

session_start();


require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password FROM users_admin');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(($_POST['email']) == $results['email'] && ($_POST['password']) == $results['password']){

	
		header("Location: index.php");
	} else {
		$message = '<p class="emailinuse">Sorry, those credentials do not match</p>';

	}

endif;

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="header">
		<a href="index.php">SoCal Junior Chess</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Login</h1>
	

	<form action="login_admin.php" method="POST">
		
		<input class="email_in_form"type="email" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">
		
		<input type="submit">


	</form>
		

</body>
</html>