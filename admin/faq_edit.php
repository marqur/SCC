
<?php


include '../core/init.php';


//If add form is submited
?>
<?php 
$sql = "SELECT * FROM faq";
$fquery = $db->query($sql);

$sql1 = "SELECT * FROM faq";
$fquery1 = $db->query($sql1);



if(isset($_GET['delete']) && !empty($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	$sql3 = "DELETE FROM faq WHERE id = '$delete_id'";
	$db->query($sql3);
	header('Location:faq_edit.php');
}



if(isset($_POST['submit'])){
if(!empty($_POST['question2']) && !empty($_POST['answer'])){
	$question2 = $_POST['question2'];
	$answer = $_POST['answer'];
	$sql2 = "INSERT INTO faq (question, answer) VALUES ('$question2', '$answer')";
	$db->query($sql2);
	header("Location:faq_edit.php");
}else {
	echo "<h4 class='bg-danger'>You must enter both, question and answer.</h4>";
}
}

?>
 <?php include 'header.php';?>
 
<?php include 'nav.php';?>

<body>
	
<a style="float: left;" href="mods.php"><h4>Back.</h4></a>


<center>
<div class="text-center">
	<form class="form-inline" action="faq_edit.php" method="post">
	<div class="form-group">
	<h3>Add Question:</h3><input type="text" name="question2" class="form-control input-faq"/>
	<h3>Add Answer:</h3><input type="text" name="answer" class="form-control input-faq"/>
	<p><input type="submit" name="submit" class="btn"/></p>
	</form>
</div>
</center>




	<table style="margin-top: 50px;" class="table table-bordered table-striped">
		<thead>
			<th>ID</th><th>QUESTION</th><th>REMOVE</th>
		</thead>
		<tbody>
		<?php while($faq = mysqli_fetch_assoc($fquery)): ?>
			<tr>
			<td><?php echo $faq['id']; ?></td>
			<td><?php echo $faq['question']; ?></td>
			<td><a href="faq_edit.php?delete=<?=$faq['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>
<hr>



<hr>
	<table style="margin-top: 150px;" class="table table-bordered table-striped">
		<thead>
			<th>ID</th><th>ANSWER</th><th>REMOVE</th>
		</thead>
		<tbody>
		<?php while($faq1 = mysqli_fetch_assoc($fquery1)): ?>
			<tr>
			<td><?php echo $faq1['id']; ?></td>
			<td><?php echo $faq1['answer']; ?></td>
			<td><a href="faq_edit.php?delete=<?=$faq1['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table>

	<?php include 'footer.php'; ?>

</body>