<?php 

require_once 'core/init.php';


?>



<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
  <title>Contact</title>
</head>
<body>
<?php include "nav.php"; ?>
<p class="page-header">Contact.</p>
<div class="container">
	<div class="row">
		<div class="col-md-6">
				
		<p class="contact_title1">Follow us on Facebook.</p>
		   <button class="facebook"><a class="contact_title12" href="https://www.facebook.com/SoCal-Junior-Chess-583609721818667/">Facebook</a></button>

<?php
//if "email" variable is filled out, send email
  if (isset($_REQUEST['email1']))  {
  
  //Email information
  $admin_email = 'majkicmarko29@yahoo.com';
  $email1 = $_REQUEST['email1'];
  $subject = $_REQUEST['subject'];
  $message = $_REQUEST['message'];
  
  //send email
  mail($admin_email, $subject, $message, "From:" . $email1);
  
  //Email response
  echo " <br> <br> <p class='contact_title'>Thank you for contacting us!</p>";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>


			<form method="post" action="contact.php" class="form_contact">
  			<p class="contact_title">We are here to answer any questions you may<br> have about SoCal Junior Chess.<br> Reach out to us and we'll respond as soon as we can.<p>
  				
  		<input type="email" placeholder="Email" name="email1" required>
  				
  				
  			<input type="text" placeholder="Subject" name="subject" required>
 		 		
 		 		
      <textarea id="message" rows="8" cols="50" placeholder="Your message here" name="message"></textarea>


 		 	<input type="submit" required><br><br>
 		 	


			</form>

			<?php
  }
?>

		</div>
		<div class="col-md-6 contact_slika">
			<img class="img img-responsive pull-right" src="images/shyam and leo.png" alt="CEO, Chess Club">

			<h3>National Master Shyam Gandhi: Co-Founder, CEO and President.</h3>

			<h3>National Master Leo Creger: Co-Founder and Vice-President of Operations</h3>
		</div>
		
	</div>
	
</div>


<?php include "footer.php"; ?>
</body>
</html>