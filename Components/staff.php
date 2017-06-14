<?php include "core/init.php"; 

 $sql = "SELECT * FROM staff";
$squery = $db->query($sql);
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="SoCal Junior chess runs camps and tournaments for U1600 kids. 
">
<meta name="keywords" content="Chess, SoCal, Chess camps, Junior camps, Junior Chess, Chess Instructors, Chess News">
<meta name="author" content="Marko">
<link rel="icon" 
      type="image/png" 
      href="https://cdn3.iconfinder.com/data/icons/glypho-generic-icons/64/chess-pawn-512.png">



<link href="style.css" rel="stylesheet" type="text/css" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="js/bootstrap.js"></script>


<!-- Latest compiled and minified CSS -->


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->


<!-- google font -->
<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
<!-- google font kraj -->
	<title>Camp Staff</title>
</head>
<body style="background-color: #F0FBFF;">
<?php include "nav.php"; ?>

<p class="page-header">Camp Staff.</p>
<center><h3 class="legend">Legend:</h3></center>

<div class="container-fluid">
<div class="col-md-6">
<div class="pull-right legend2">
	
	<div class="row">
		<center><p><strong>FIDE Titles(World Chess Federation)</strong></p></center>
	</div>
	<div class="row">
		<center><p>GM= Grandmaster</p></center>
	</div>
	<div class="row">
		<center><p>IM= International Master</p></center>
	</div>
	<div class="row">
		<center><p>FM= Fide Master</p></center>
	</div>
	<div class="row">
		<center><p>CM= Candidate Master</p></center>
	</div>
	<div class="row">
		<center><p>*FIDE CM is similar to USCF National Master</p></center>
	</div>
	</div>
</div>

<div class="col-md-6">
	<div class="pull-left legend2">
	
	<div class="row">
		<center><p><strong>USCF Titles(United States Chess Federation) </strong></p></center>
	</div>
	<div class="row">
		<center><p>NM= National Master</p></center>
	</div>
	<div class="row">
		<center><p>CM= Candidate Master </p></center>
	</div>
	<div class="row">
		<center><p>Expert= 2000+ Rating*</p></center>
	</div>
	<div class="row">
		<center><p>Class A= 1800-1999</p></center>
	</div>
	<div class="row">
		<center><p>Class B= 1600-1799</p></center>
	</div>
	<div class="row">
		<center><p>Class C= 1400-1599**</p></center>
	</div>

<div class="row">
		<center><p>Class D= 1200-1399</p></center>
	</div>

<div class="row">
		<center><p>Class E= 1000-1199</p></center>
	</div>
</div>
</div>
</div>

<center><i style="font-size: 1.2em;" class="note col-md-12">*All instructors are at least USCF Expert.</i></center>
<center><i style="font-size: 1.2em;" class="note col-md-12">**Camps are meant for children (14U~) from unrated to Class C, although you can still attend if you are higher than 1600 and under 21 years of age. </i></center>
<hr>

<div style="margin-top: 50px;" class="container">
<hr>
<?php while($staff = mysqli_fetch_assoc($squery)): ?>
          <?php $staff_id = $staff['id']; ?>

	<div class="row">
		<center><div class="col-md-12">
			<center><h2 class="staff_title"><?php echo $staff['staff_name']; ?></h2></center>
			<center><p class="staff_info"><?php echo $staff['staff_info']; ?> </p></center>
		</div></center>
	</div>
	<hr>
<?php endwhile; ?>

	
</div>

<?php include "footer.php"; ?>

</body>
</html>