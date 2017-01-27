<?php 
require_once "core/init.php";

$sql = "SELECT * FROM staff";
$squery = $db->query($sql);

?>
<head>
<?php include "header.php"; ?>
<title>Camp Details</title>
</head>
<body>

<?php include "nav.php";?>

<p style="margin-top:150px; "class="page-header">Camp Details.</p>



<!-- schedule -->
<div class="container-fluid">
  	<div class="row">	

  	   <div class="col-xs-5">
  	   <br><br><br><br>
  	 			<?php $sql4 = "SELECT * FROM details_text";
					  $text = $db->query($sql4);
					  $bquery = mysqli_fetch_assoc($text);
				?>
  			<center><p class="details-info">
  			<?php echo $bquery['text'];?>
  			</p></center>
  			<center><h4 class="details-info">If you are interested in chess, check out this great club - <a href="http://www.lachessclub.com/home.html">La Chess Club</a>. LACC offers quality instruction and competition for players of all levels.</h4></center>


  	   </div>

       <div class="col-xs-6 jumbotron pull-right">
    	<div class="col-xs-6">
		<div class="table-responsive">
		   <table class="table">
		   		<center><h4>Day 1</h4></center>
		   		<tr>
		   			<th>Time</th>
		   			<th>Event</th>
		   		</tr>
		   		<?php
		   		$sql1 = "SELECT * FROM day1";
				$tquery = $db->query($sql1);
				while($day1 = mysqli_fetch_assoc($tquery)): ?>
		   		<tr>
		   			<td><?php echo $day1['time']; ?></td>
		   			<td><?php echo $day1['event']; ?></td>
		   		</tr>
		   	<?php endwhile; ?>
		   </table>
		</div>
		</div>
		<div class="col-xs-6">
		<div class="table-responsive">
		   <table class="table">
		   		<center><h4>Day 2</h4></center>
		   		<tr>
		   			<th>Time</th>
		   			<th>Event</th>
		   		</tr>
		   		<?php
		   		$sql2 = "SELECT * FROM day2";
				$wquery = $db->query($sql2);
				while($day2 = mysqli_fetch_assoc($wquery)): ?>
		   		<tr>
		   			<td><?php echo $day2['time2']; ?></td>
		   			<td><?php echo $day2['event2']; ?></td>
		   		</tr>
		   		<?php endwhile; ?>
		   </table>
		</div>
		</div>
		</div>
		</div>
	</div>
	<!-- end schedule -->

<hr>
<br>
<!-- camp cost -->
<div class="container-fluid">
<div class="row">
<div class="col-xs-6 jumbotron">
<div class="table-responsive">
  <table class="table">
  <h3>Camp Cost</h3>
  	<?php $sql3 = "SELECT * FROM cost";
	$mquery = $db->query($sql3);
	while($cost = mysqli_fetch_assoc($mquery)): ?>
    <tr>
        <td><?php echo $cost['day']; ?></td>
        <td><?php echo $cost['cast']; ?></td>
    </tr>
    <?php endwhile; ?>
    </tr>
  </table>
</div>
 <div class="table-responsive">
  <table class="table">
  <h3>Blitz Tournament With Prizes</h3>
  	<tr>
  		<td>With entry</td>
  		<td>$15</td>
  	</tr>
  	<tr>
  		<td>Onsite</td>
  		<td>$20</td>
  	</tr>
  	<tr>
  		<td>Launch (per day)</td>
  		<td>$5</td>
  	</tr>
  </table>
   </div>
  </div>

 <div class="col-xs-5">
  			<div class="details_staff_title" class="col-md-7 pull-left ">
  			<h3> Our Instructors:</h3>
  			</div>
 			<?php while($staff = mysqli_fetch_assoc($squery)): ?>
          <?php $staff_id = $staff['id']; ?>
  			<div class="row">
			<div class="col-md-6 pull-left ">
			<center><p class="details_staff_title"><?php echo $staff['staff_name']; ?></p></center>
			</div>
			</div>
<?php endwhile; ?>
			<p class="details_staff_title">See all biographies <a href="staff.php">here</a></p>
<hr>
  			<i style="font-size: 1.2em;" class="note pull-left col-md-12">Note:All instructors are at least USCF Expert.</i>
  			<i style="font-size: 1.2em;" class="note pull-left col-md-12">Expert Robert Shlyakhtenko will only be teaching on Saturday, while Expert Siddharth Somasundaram will only be teaching on Sunday. </i>
  			
  			


  			

  	   </div>


   </div>
  </div>

  <!-- end camp cost --> 
	


       <div>
		   <?php include "map.php"; ?>
		
		</div>
	
</body>
</html>