

<?php 

require_once "core/init.php";


$sql = "SELECT * FROM gallery";
$dquery = $db->query($sql);

?>

<!DOCTYPE HTML>
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
<title>Gallery</title>


<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/colorbox.css" />



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="scripts/jquery.colorbox-min.js"></script>
<script src="scripts/jquery.colorbox.js"></script>




<!-- Latest compiled and minified CSS -->


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->


<!-- google font -->
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- google font kraj -->
</head>

<body>
 <?php include "nav.php"; ?>


	<div  class="container-fluid gallery-back">

        <div class="row">

            <div class="col-lg-12">
                <p class="page-header">Gallery.</p>
                <h4 class="below-addings">Check out our photos from previous events!<br>
                  Still not registered? Click registration to join today!
                </h4>
            </div>

            <?php while($gallery = mysqli_fetch_assoc($dquery)): ?>
          <?php $gallery_id = $gallery['id']; ?>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="group1 thumbnail thumb-shadow" href="<?php echo $gallery['image']; ?>">
                    <img class="img-responsive gallery-image" src="<?php echo $gallery['image']; ?>" alt="">
                </a>
            </div>
          <?php endwhile; ?>  

        </div>

        <?php include "footer.php" ?>

        <script>
      $(document).ready(function(){
        $('.group1').colorbox({rel:'group1'});
        $(".callbacks").colorbox({
          onOpen:function(){ alert('onOpen: colorbox is about to open'); },
          onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
          onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
          onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
          onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });

      });
</script>

</body>
</html>