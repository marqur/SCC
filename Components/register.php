<?php

session_start();



require 'database.php';

$message = '';
$email = $_POST['email'];







if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['parent_name']) && !empty($_POST['parent_lastname']) && !empty($_POST['terms'])){



$query = $conn->prepare( "SELECT email
			 FROM use
			 WHERE email = ?" );
$query->bindValue( 1, $email );
$query->execute();
if( $query->rowCount() > 0 ) { # If rows are found for query
     echo "<p id='emailinuse'>Sorry, this email is already in use.</p>";
}
else {

	
     


	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password, name, lastname, parent_name, parent_lastname, uscf, phone, alergies, coach_name, heard, attend, checknews, terms) VALUES (:email, :password, :name, :lastname, :parent_name, :parent_lastname, :uscf, :phone, :alergies, :coach_name, :heard, :attend, :checknews, :terms)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindParam(':name', $_POST['name']);
	$stmt->bindParam(':lastname', $_POST['lastname']);
	$stmt->bindParam(':parent_name', $_POST['parent_name']);
	$stmt->bindParam(':parent_lastname', $_POST['parent_lastname']);
	$stmt->bindParam(':uscf', $_POST['uscf']);
	$stmt->bindParam(':phone', $_POST['phone']);
	$stmt->bindParam(':alergies', $_POST['alergies']);
	$stmt->bindParam(':coach_name', $_POST['coach_name']);
	$stmt->bindParam(':heard', $_POST['heard']);
	$stmt->bindParam(':attend', $_POST['attend']);
	$stmt->bindParam(':checknews', $_POST['checknews']);
	$stmt->bindParam(':terms', $_POST['terms']);


	if( $stmt->execute() ):
		$message = 'Successfully created new user';
		header('Refresh: 3; URL=login.php');

	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;
}
}


?>
<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
</head>
<body style="font-family: 'Varela Round' !important;">

	<div class="header">
		<a style="font-family: 'Varela Round' !important;" href="/">SoCal Chess Junior</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form style="padding-bottom: 100px; margin-top: 20px;" action="register.php" method="POST">
		
		<p style="font-size: 1.1em !important;">Name:<span class="zvezdica">*</span></p><input type="text" placeholder="name" name="name" required>
		<p style="font-size: 1.1em !important;">Lastname:<span class="zvezdica">*</span></p><input type="text" placeholder="lastname" name="lastname" required>
		<p style="font-size: 1.1em !important;">Parent Name:<spanclass="zvezdica">*</span></p><input type="text" placeholder="parent name" name="parent_name" required>
		<p style="font-size: 1.1em !important;">Parent Lastname:<span class="zvezdica">*</span></p><input type="text" placeholder="parent lastname" name="parent_lastname" required>
		<p style="font-size: 1.1em !important;">Parent Phone Number:</p><input type="text" placeholder="phone" name="phone" >
		<p style="font-size: 1.1em !important;">USCF ID (if have one):</p><input type="text" placeholder="ID" name="uscf">
		<p style="font-size: 1.1em !important;">Email of parent:<span class="zvezdica">*</span></p><input class="email_in_form" type="email" placeholder="Enter your email" name="email" required>
		<p style="font-size: 1.1em !important;">Password:<span class="zvezdica">*</span></p><input type="password" placeholder="and password" name="password">
		<p style="font-size: 1.1em !important;">Allergies or special food requirements:</p><input class="area" type="text" name="alergies">
		<p style="font-size: 1.1em !important;">Coach's name:</p><input type="text" name="coach_name" >
		<p style="font-size: 1.1em !important;">How you heard about us?</p><input type="text"  name="heard" >
        <p style="font-size: 1.1em !important;">Would you attend a October or Novemeber Camp if we organized one?</p><input type="text"  name="attend" >
        I Agree To The <a data-toggle="modal" data-target="#myModal" href="#">Terms and Conditions </a><input type="checkbox" name="terms" value="Yes, I agree." checked><br>
        <br>
        <input type="hidden" name="terms" value="No, I do not agree." checked><br>
        <br>
		<input type="submit" required><br><br>
		<input type="hidden" name="checknews" value="No" checked><br>
		Subscribe to our newsletter? <input type="checkbox" name="checknews" value="Yes" checked><br>



		</form>
</body>

   <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        <p>I, as the parent or guardian of the above named child, hereby give permission for my child to participate in the programs and activities offered by SoCal Junior Chess. 
<br><br>
I and my child agree to accept and comply with all rules and regulations of SoCal Junior Chess.
<br><br>
I hereby authorize any agent of SoCal Junior Chess to act as agent for the understand to consent to any emergency medical treatment and/or hospital care which is deemed advisable by, and is to be rendered under, the general or special supervision of any physician and surgeon licensed under the provisions of the medical practice act, should an emergency arise and I cannot be located in a timely manner. I understand that SoCal Junior Chess assumes no financial responsibility for any such medical care.
<br><br>
</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</html>