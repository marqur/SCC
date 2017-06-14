<?php


include '../core/init.php';





//delete1
if(isset($_GET['delete']) && !empty($_GET['delete'])){
	$delete_id = $_GET['delete'];
	$sql4 = "DELETE FROM day1 WHERE id = '$delete_id'";
	$db->query($sql4);
	header('Location:details_admin.php');
}
//delete2
if(isset($_GET['remove']) && !empty($_GET['remove'])){
	$remove_id = $_GET['remove'];
	$sql5 = "DELETE FROM day2 WHERE id = '$remove_id'";
	$db->query($sql5);
	header('Location:details_admin.php');
}
//delete3
if(isset($_GET['removee']) && !empty($_GET['removee'])){
	$removee_id = $_GET['removee'];
	$sql7 = "DELETE FROM cost WHERE id = '$removee_id'";
	$db->query($sql7);
	header('Location:details_admin.php');
}
//delete4
if(isset($_GET['removeee']) && !empty($_GET['removeee'])){
	$removeee_id = $_GET['removeee'];
	$sql9 = "DELETE FROM details_text WHERE id = '$removeee_id'";
	$db->query($sql9);
	header('Location:details_admin.php');
}

//insert1
if(isset($_POST['time']) && isset($_POST['event']) && isset($_POST['submit'])){
	$time = $_POST['time'];
	$event = $_POST['event'];
	$sql3 = "INSERT INTO day1 (time, event) VALUES ('$time', '$event')";
	$db->query($sql3);
		header("Location:details_admin.php");	
}

//insert2
if(isset($_POST['time2']) && isset($_POST['event2'])){
	$time2 = $_POST['time2'];
	$event2 = $_POST['event2'];
	$sql6 = "INSERT INTO day2 (time2, event2) VALUES ('$time2', '$event2')";
	$db->query($sql6);
		header("Location:details_admin.php");	
}
//insert3
if(isset($_POST['time3']) && isset($_POST['event3'])){
	$time3 = $_POST['time3'];
	$event3 = $_POST['event3'];
	$sql8 = "INSERT INTO cost (day, cast) VALUES ('$time3', '$event3')";
	$db->query($sql8);
		header("Location:details_admin.php");	
}
//insert4
if(isset($_POST['text4'])){
	$text1 = $_POST['text4'];
	$sql10 = "INSERT INTO details_text (text) VALUES ('$text1')";
	$db->query($sql10);
		header("Location:details_admin.php");	
}
?>

<?php
	include 'header.php';
	include 'nav.php';
?>

<body>
<a style="float: left;" href="mods.php"><h4>Back.</h4></a>

<center>
<div class="text-center ">
<h1>Day 1 Edit</h1>
	<form class="form-inline" action="details_admin.php" method="post">
	<div class="form-group">
	<h3>Add Time:</h3><input type="text" name="time"  class="form-control input-faq"/>
	<h3>Add Event:</h3><input type="text" name="event"  class="form-control input-faq"/>

	<p><input type="submit" name="submit" class="btn"/></p>
	</form>
</div>
</center>

<!-- day1 -->
	<table style="margin-top: 150px;" class="table table-bordered table-striped table_details_admin">
		<thead>
			<th>TIME</th><th>EVENT</th><th>REMOVE</th>
		</thead>
		<tbody>
			<?php
		   		$sql1 = "SELECT * FROM day1";
				$tquery = $db->query($sql1);
				while($details1 = mysqli_fetch_assoc($tquery)): ?>
			<tr>
			<td><?php echo $details1['time']; ?></td>
			<td><?php echo $details1['event']; ?></td>
			<td><a href="details_admin.php?delete=<?=$details1['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>

<!-- day2 -->


<center>
<div class="text-center ">
<h1>Day 2 Edit</h1>
	<form class="form-inline" action="details_admin.php" method="post">
	<div class="form-group">
	<h3>Add Time:</h3><input type="text" name="time2"  class="form-control input-faq"/>
	<h3>Add Event:</h3><input type="text" name="event2"  class="form-control input-faq"/>

	
<p><input type="submit" name="submit" class="btn"/></p>
	</form>
</div>
</center>



	<table style="margin-top: 150px;" class="table table-bordered table-striped table_details_admin">
		<thead>
			<th>TIME</th><th>EVENT</th><th>REMOVE</th>
		</thead>
		<tbody>
			<?php
		   		$sql = "SELECT * FROM day2";
				$Hquery = $db->query($sql);
				while($details2 = mysqli_fetch_assoc($Hquery)): ?>
			<tr>
			<td><?php echo $details2['time2']; ?></td>
			<td><?php echo $details2['event2']; ?></td>
			<td><a href="details_admin.php?remove=<?=$details2['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>

<!--camp cost-->

<center>
<div class="text-center ">
<h1>Camp Cost Edit</h1>
	<form class="form-inline" action="details_admin.php" method="post">
	<div class="form-group">
	<h3>Add Time:</h3><input type="text" name="time3"  class="form-control input-faq"/>
	<h3>Add Event Cost:</h3><input type="text" name="event3"  class="form-control input-faq"/>

	
<p><input type="submit" name="submit" class="btn"/></p>
	</form>
</div>
</center>


	<table style="margin-top: 150px;" class="table table-bordered table-striped table_details_admin">
		<thead>
			<th>TIME</th><th>EVENT</th><th>REMOVE</th>
		</thead>
		<tbody>
			<?php
		   		$sql = "SELECT * FROM cost";
				$cquery = $db->query($sql);
				while($cost2 = mysqli_fetch_assoc($cquery)): ?>
			<tr>
			<td><?php echo $cost2['day']; ?></td>
			<td><?php echo $cost2['cast']; ?></td>
			<td><a href="details_admin.php?removee=<?=$cost2['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>

	<!--details text-->
<center>
<div class="text-center ">
<h1>Text(Left of Camp Schedule in Camp Details)</h1>
	<form class="form-inline" action="details_admin.php" method="post">
	<div class="form-group">
	
	<h3>Add Text(what you see is what you get):</h3><textarea type="text" name="text4"  class="form-control input-faq"/>
	</textarea>
	

<p><input type="submit" name="submit" class="btn"/></p>
	</form>
</div>
</center>


	<table style="margin-top: 150px;" class="table table-bordered table-striped table_details_admin">
		<thead>
			<th>ID</th><th>TEXT</th><th>REMOVE</th>
		</thead>
		<tbody>
			<?php
		   		$sql = "SELECT * FROM details_text";
				$xquery = $db->query($sql);
				while($dtext = mysqli_fetch_assoc($xquery)): ?>
			<tr>
			<td><?php echo $dtext['id']; ?></td>
			<td><?php echo $dtext['text']; ?></td>
			<td><a href="details_admin.php?removeee=<?=$dtext['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
	<h5>*For this table, only one row is allowed.</h5>
	<?php include 'footer.php'; ?>
</body>