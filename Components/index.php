
<?php 

require_once "core/init.php";




session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

  $records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = NULL;

  if( count($results) > 0){
    $user = $results;
  }

}


?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="SoCal Junior chess runs camps and tournaments for U1600 kids. 
">
<meta name="keywords" content="Chess, SoCal, Chess camps, Junior camps, Junior Chess, Chess Instructors, Chess News">
<meta name="author" content="Marko Majkic">
<link rel="icon" 
      type="image/png" 
      href="https://cdn3.iconfinder.com/data/icons/glypho-generic-icons/64/chess-pawn-512.png">
<title>SoCal Junior Chess</title>



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

<?php include 'analyticstracking.php'; ?>

</head>
<body style="background-color: #DAE1E3">

<?php 
include "nav.php";
?>



<div style="margin-top: 70px;" id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators 
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>-->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="images/2.jpg" alt="Chania">
    </div>

    <div class="item">
      <img src="images/3.jpg" alt="Flower">
    </div>

    <div class="item">
      <img src="images/4.jpg" alt="Flower">
    </div>
    <div class="item">
      <img src="images/5.jpg" alt="Flower">
    </div>
    <div class="item">
      <img src="images/6.jpg" alt="Flower">
    </div>
    <div class="item">
      <img src="images/7.jpg" alt="Flower">
    </div>
    <div class="item">
      <img src="images/8.jpg" alt="Flower">
    </div>    
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




 <!--- Flyers  --> <!--

<div class="container-fluid">
 <div class="jumbotron full_cover">
  <div class="row">
  	<div class="col-lg-6 cover12">
  		<img class="img img-responsive"src="images/primer2.jpg">
  	</div>
  	<div class="col-lg-6 cover2">
  		<img class="img img-responsive"src="images/primer3.jpg">
  	</div>
  </div>
 </div>
</div>
 -->
<!-- End Flyers -->


<!-- cover
<div class="container-fluid">
 <div class="row full_cover">
  	<img class="img img-responsve" src="images/PIC1.jpg">
 </div>
</div>
<br>
<br>

<!-- end cover -->

<!--- Ad Section -->

<div class="container-fluid">
  <div class="row">
  	<div class="col-md-12" style="background-color: #fff;text-shadow: 1px 1px 8px#808080;"><center><p class="section2">REGISTER TO OUR WEB PAGE AND SUBSCRIBE TO OUR NEWSLETTER.</p></center></div> 
  </div>
  <div class="row">
  	<div class="col-md-12" style="background-color: #2190B5;text-shadow: 2px 2px 10px#808080;"><center><p class="section2">READ CAMP DETAILS AND LEARN ABOUT OUR PROGRAMS, COACHES AND EVENTS.</p></center></div>
  </div>
  <div class="row">
  	<div class="col-md-12" style="background-color: #C4E9F5;    text-shadow: 2px 2px 10px#808080;
"><center><p class="section3">JOIN THE CAMP AND PAY ONLINE.</p></center></div>
  </div>
</div>

<!---End Ad Section -->

<!-- Subscribe Section -->

<div class="container-fluid newsletters">
	<center><div class="jumbotron newsletters">
		
    <?php if(!empty($user) ): ?>
      <button class="btn dugme-sub"><h5><strong><a class="mcform_link" href="/join.php">JOIN CAMP</a></strong></h5></button>
  <?php else: ?>
      <button class="btn dugme-sub"><h5><strong><a class="mcform_link" href="/register.php">REGISTER</a></strong></h5></button>
  <?php endif;?>

	</div></center>
</div>

<!-- End Subscribe Section -->


<?php 
$sql = "SELECT * FROM news ORDER BY id ASC LIMIT 3";
$nquery = $db->query($sql);
?>

<div style="background-color:#C4E9F5 !important; margin-bottom: 0px !important;" class="container-fluid">
<div class="pozadina_blog">
  <center><h1 class="naslovblog">Latest From Blog</h1></center>
  <div class="row">

  <?php while($news = mysqli_fetch_assoc($nquery)): ?>
          <?php $news_id = $news['id']; ?>
    <div class="col-md-4">
        <center><a href="blog_item.php?id=<?php echo $news_id; ?>"><img class="img img-responsive imgblog" src="<?php echo $news['image']; ?>"></a></center>
        <center><h3 class="titleblog"><a class="titlebloglink"href="blog_item.php?id=<?php echo $news_id; ?>"><?php echo $news['title']; ?></a></h3></center>
    </div>
  <?php endwhile; ?>

  </div>
  
</div>
</div>




<div class="benefits_pozadina">
<center><h2 class="benefits1"><strong>BENEFITS OF PLAYING CHESS</strong></h2></center>
  <div class="row">
    <div class="col-md-3 benefits">
      <p><center><h3><strong>Foresight</strong></h3></center> 
      Chess is based on planning, strategy, and tactics. This requires trying to predict and analyze the future.</p>
    </div>
    <div class="col-md-3 benefits">
      <p><center><h3><strong>Circumspection</strong></h3></center> It's important to anticipate threats, which sometimes come from surprising places.</p>
    </div>
    <div class="col-md-3 benefits">
      <p><center><h3><strong>Deliberation</strong></h3></center> It's easy to spoil hours of effort with one hasty move. So it's important to think carefully and check your analysis (to the extent that is possible while also keeping in mind the time constraints).</p>
    </div>
    <div class="col-md-3 benefits">
      <p><center><h3><strong>Hope and perseverance</strong></h3></center> Many chess games have a lot of ups and downs. Determination and patience (rather than panic), even in positions that seem bad, can often succeed.</p>
    </div>
    </div>
  </div>





<?php 

include "footer.php";

session_destroy();

 ?>



</body>
</html>