<?php
if(isset($_GET['id'])) {
  
  $servername = "127.0.0.1";
$username = "root";
$password = "vcfimh10";

// Create connection
$conn = new mysqli($servername, $username, $password);
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 /*
	$conn = mysql_connect('127.0.0.1', 'socal', 'vcfimh10') or die ("Could not connect to database");
	}else{
		echo "No item found!";
		exit();
} 
echo "string"; */




$id = $_GET['id']; 	

$select_db = mysqli_select_db ( $conn , 'socal' ) or die ("Could not find database");
 


$query2 = "SELECT * FROM news";
$query = "SELECT * FROM news WHERE id='$id'"; 

$fetch = mysqli_query($conn , $query) or die('Error');
$fetch2 = mysqli_query($conn , $query2) or die('error');

$chair_num = mysqli_num_rows($fetch);
$chair_num_uk = mysqli_num_rows($fetch2);



if ($chair_num > 0) {
	while ($row = mysqli_fetch_array($fetch)) { 
		         $title = $row['title'];
		         $id1 = $row ['id'];
				 $description = $row ['description'];
				 $image = $row['image'];
         $date = $row ['date'];
         $author = $row ['author'];
         $content = $row ['content'];
				 }
     }else{
	echo "No product";
	exit();
	 } 

?>
<!-- connect to server end-->



<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>

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
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<!-- google font kraj -->
	</head>

<body style="background-color: #EBFAFF;">

<div class="container blog_poz">
<hr>
<a class="nazad pull-left row" href="news.php">Go back.</a>
<center><h1 class="blog-item-title"><?php echo $title;?></h1></center><br><br>
<p class="author pull-left">Author: <?php echo $author; ?></p>
<p class="date pull-right"><?php echo $date; ?></p>
<br><br> 
<center><p class="blog-item-descr"><strong><?php echo $description; ?></strong></p></center><br><br><br>
<center><img class="blog-item-img" class="img img-responsive" src="<?php echo $image;?>"></center><br><br>
<center><p class="blog-item-descr1"><strong><?php echo $content; ?></strong></p></center>
   </div>
<center><iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fsocaljuniorchess.com%2Fblog_item%3F%3Did&layout=button_count&size=small&mobile_iframe=true&width=69&height=20&appId" width="99" height="40" style="margin-top: 50px;margin-bottom: 30px; border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></center>
   <?php include "footer.php"; ?>
</body>
</html>
