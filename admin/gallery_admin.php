<?php include '../core/init.php'; 


//delete
if(isset($_GET['remove']) && !empty($_GET['remove'])){
	$remove_id = $_GET['remove'];
	$sql4 = "DELETE FROM gallery WHERE id = '$remove_id'";
	$db->query($sql4);
	header('Location:gallery_admin.php');
}



//image insert
if(!empty($_FILES)){
	$photo = $_FILES['photo'];
	$name = $photo['name'];
	$nameArray = explode('.',$name);
	$fileName = $nameArray[0];
	$fileExt = $nameArray[1];
	$mime = explode ('/',$photo['type']);
	$mimeType = $mime[0];
	$mimeExt = $mime[1];
	$tmpLoc = $photo['tmp_name'];
	$fileSize = $photo ['size'];
	$allowed = array('png','jpg','jpeg','gif');
	$uploadName = md5(microtime()).'.'.$fileExt;
	$uploadPath =$_SERVER['DOCUMENT_ROOT'].'/images/gallery'.$uploadName;
	$dbpath = 'images/gallery/'.$uploadName;
	if($mimeType != 'image'){
		echo "The file must be an image."; 
		
	}
	if(!in_array($fileExt, $allowed)){
		echo "The file extension must be a png, jpg, jpeg or gif."; 
	}
	if($fileSize > 15000000){
		echo "The files size must be under 15MB."; 
	}
	move_uploaded_file($tmpLoc, $uploadPath);
	$insertsql = "INSERT INTO gallery (`image`) VALUES ('$dbpath')";
	$db->query($insertsql);
	header('Location:gallery_admin.php');
}




?>

<?php
	include 'header.php';
	include 'nav.php';
?>

<body>
<a href="mods.php"><h4>Back.</h4></a>

<center>
<div style="margin-top: 150px;" class="text-center ">
<h1>Insert New Photo</h1>
	<form class="form-inline" action="gallery_admin.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	<input type="file" name="photo" class="form-control input-faq">
	<p><input type="submit" name="submit" class="btn"/></p>
	</div>
	</form>
</div>
</center>



<h4>Images must be somewhere between w:800px and h:800px</h4>
	<table style="margin-top: 150px;" class="table table-bordered table-striped table_details_admin">
		<thead>
			<th>IMAGE</th><th>REMOVE</th>
		</thead>
		<tbody>
			<?php
		   		$sql = "SELECT * FROM gallery";
				$gquery = $db->query($sql);
				while($gallery = mysqli_fetch_assoc($gquery)): ?>
			<tr>
			<td><img style="width: 250px !important;" class="img-responsive img" src="<?php echo $gallery['image']; ?>"></td>
			<td><a href="gallery_admin.php?remove=<?=$gallery['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table> 

	<?php include 'footer.php';?>
	
</body>
</html>