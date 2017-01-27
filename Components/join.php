
<?php 

require_once "db_stripe.php";



?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php" ?>
  <title>Join Camp</title>
</head>
<body class="newsletters">


<div class="row cover_buy">
    <div class="col-md-1">
        <a class="strelica" href="index.php"><img src="images/strelica.png"></a></div>
    <div class="col-md-11 cov">   
       <center><h2><a href="index.php">SoCal Junior Chess</a></h2></center>
       <center><h4>SEPTEMBER 10th 2016</h4></center>
       </div>
    </div>
</div>

<center><img class="img img-responsive img_pay" src="images/slika placanje.png"></center>

<div class="container-fluid buy-cont" style="margin-top: 200px;">
<center>
<ul class="row list_buy">

<li class="col-md-12 join4">
<center><h3>Full Pass (if RSVP by August 21) - $60</h3>
<form action="join_charge.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable']; ?>"
    data-amount="6000"
    data-name="SoCal Chess Junior"
    data-description="Buy Full Pass"
    data-email="<?php echo $user->email; ?>"
    data-locale="auto"
    data-image="/images/konj.png">
  </script>
</form></center>
<?php if ($user->full_paid) 
  echo "Thank you for buying full pass, you will get receipt in your email.";
?>
</li>



<li class="col-md-12 join1">
<center><h3>Saturday - $40</h3>
<form action="join_charge1.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable']; ?>"
    data-amount="4000"
    data-name="SoCal Chess Junior"
    data-description="Saturday Pass"
    data-email="<?php echo $user->email; ?>"
    data-locale="auto"
    data-image="/images/konj.png">
  </script>
</form></center>
<?php if ($user->saturday_paid) 
  echo "Thank you for buying Saturday pass, you will get receipt in your email.";
?>
</li>


<li class="col-md-12 join2">
<center><h3>Sunday - $40</h3>
<form action="join_charg2.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable']; ?>"
    data-amount="4000"
    data-name="SoCal Chess Junior"
    data-description="Sunday Pass"
    data-email="<?php echo $user->email; ?>"
    data-locale="auto"
    data-image="/images/konj.png">
  </script>
</form></center>
<?php if ($user->sunday_paid) 
  echo "Thank you for buying Sunday pass, you will get receipt in your email.";
?>

</li>

<li class="col-md-12 join3">
<center><h3>Blitz Tournament With Prizes - $15</h3>
<form action="join_charge3.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable']; ?>"
    data-amount="1500"
    data-name="SoCal Chess Junior"
    data-description="Blitz Tournament With Prizes"
    data-email="<?php echo $user->email; ?>"
    data-locale="auto"
    data-image="/images/konj.png">
  </script>
</form></center>
<?php if ($user->tour_paid) 
  echo "Thank you for buying tour ticket, you will get receipt in your email.";
?>
</li>

<center><h4 class="pull-left bck-index"><a href="index.php"><strong>Back to SoCal Junior Chess</strong></a></h4></center>

</ul>


</div>
</div>



</body>
</html>