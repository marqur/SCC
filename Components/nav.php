
<?php

$sql = "SELECT * FROM navbar WHERE visible = 1";
$pquery = $db->query($sql);
?>

<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

  $records = $conn->prepare('SELECT id,email,password, name FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = NULL;

  if( count($results) > 0){
    $user = $results;
  }

}

?>

<nav class="navbar navbar-default navbar-fixed-top pozadina-nav">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if(empty($user) ): ?>
      <a class="navbar-brand" href="index.php"><img class="img img-responsive LOGO"  src="images/logo80px.png"></a>
    <?php endif; ?>
    <?php if(!empty($user)):  ?>
      <a style="text-decoration: none; margin-top: 10px; !important; color:grey;" class="navbar-brand" href="index.php">SoCal Junior Chess</a>
      <?php endif; ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div style="padding-right:13% ;" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav pull-right collapse-levo">
       

        <ul class="nav">

            <?php if(empty($user) ): ?> 

          
            <li class="col-md-7"><button class="btn pull-right dugme1"><a class="pull-right" href="register.php"><h6><strong>REGISTER</strong></h6></a></button></li>


         <li class="col-md-2"><button class="btn dugme1"><a href="login.php"><h6><strong>LOG IN</strong></h6></a></button></li>


        <button type="button" class="btn dugme2 col-md-2" data-toggle="modal" data-target="#myModal"><h6><strong>JOIN CAMP</strong></h6></button>

        <!-- Modal -->
        <?php include "modal.php"; ?>

        
        <?php endif; ?>

        </ul >

        

         <li><a href="index.php"><h4>Home</h4></a></li> 
         <li><a href="about_us.php"><h4>Who We Are</h4></a></li>          
         <li><a href="faq.php"><h4>FAQ</h4></a></li> 
         <li><a href="details.php"><h4>Camp Details</h4></a></li> 
         <li><a href="staff.php"><h4>Camp Staff</h4></a></li> 
         <li><a href="news.php"><h4>Blog</h4></a></li> 
         <li><a href="gallery.php"><h4>Gallery</h4></a></li> 
         <li><a href="contact.php"><h4>Contact Us</h4></a></li> 


          <?php if(!empty($user) ): ?> 
            <li class="dropdown">
          <a class="drop_link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h4 class="wellcome">Welcome, <?php echo $user['name']; ?></h4></a>
            <ul class="dropdown-menu">
              <li><h4 class="dr_item1 dropdown-header"><?= $user['email']; ?></h4></li>
              <li><a class="dr_item2" href="join.php"><strong>Join Camp</strong></a></li>
              <li><a class="dr_item2" href="logout.php"><strong>Logout</strong></a></li>
            </ul>
          </li>
          </li>

                   <?php endif; ?>


        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>