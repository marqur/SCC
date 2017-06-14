<?php
 require_once "core/init.php";		
  

 $sql = "SELECT * FROM faq";
$fquery = $db->query($sql);
?>
<head>
	<?php include "header.php"; ?>
	<title>FAQ</title>
</head>
 
<body>
<?php include "nav.php"; ?>

<p class="page-header">FAQ.</p>
        <h4 class="below-addings">Useful info about SoCal Junior Chess Camp</h4>

 <div class="container-fluid">
 	<div class="container">
 
 
 <?php while($faq = mysqli_fetch_assoc($fquery)): ?>
          <?php $faq_id = $faq['id']; ?>
          <br>
          <br>
 	<div class="row">
 		<div class="col-xs-12">
 			<p class="question pull-left col-xs-12"><span>Q: </span><?php echo $faq['question']; ?></p>
 			<br>
 			<p class="answer pull-left col-xs-12"><span>A: </span><?php echo $faq['answer']; ?></p>
 		</div>
 		<br>
 		<hr>
 		<br>

 	</div>
 	<?php endwhile; ?>
 </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>