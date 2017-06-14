
<?php

session_start();

require 'database.php';
$records = $conn->prepare('SELECT id,email,password, full_name FROM users_admin');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);


  $user = NULL;

  if( count($results) > 0){
    $user = $results;
  }
?>

  <?php if(empty($user) ): ?> 
  	header('Location:login_admin.php');
  <?php endif; ?>	

<?php
 include 'header.php';
 include 'nav.php'; ?>
<body>



	<div style="margin-top: 200px;" class="container">
		<div class="row">
			<a href="mods.php"><div class="col-md-4 adminpanel1">
				<center><h1>Website Editing</h1></center>
			</div></a>
			<a href="stats.php"><div class="col-md-4 adminpanel2">
				<center><h1>Members</h1></center>
			</div></a>
			<a target="_blank" href="https://analytics.google.com/analytics/web/?authuser=0#dashboard/default/a82467267w121991889p127642798/"><div class="col-md-4 adminpanel3">
				<center><h1>Google Analytics</h1></center>
			</div></a>
		</div>
	</div>




<?php include 'footer.php'; ?>
</body>
</html>