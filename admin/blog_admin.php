<?php include '../core/init.php'; 


//delete
if(isset($_GET['remove']) && !empty($_GET['remove'])){
	$remove_id = $_GET['remove'];
	$sql4 = "DELETE FROM news WHERE id = '$remove_id'";
	$db->query($sql4);
	header('Location:blog_admin.php');
}



//image insert
if(!empty($_FILES)){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$date = $_POST['date'];
	$author = $_POST['author'];
	$content = $_POST['content'];
	$photo = $_FILES['image'];
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
	$uploadPath =$_SERVER['DOCUMENT_ROOT'].'/images'.$uploadName;
	$dbpath = 'images/'.$uploadName;
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
	$insertsql = "INSERT INTO news (`title`,`image`,`description`,`author`,`date`,`content`) VALUES ('$title', '$dbpath', '$description', '$author', '$date', '$content')";
	$db->query($insertsql);
	header('Location:blog_admin.php');
}



?>
<?php
	include 'header.php';
	include 'nav.php';
?>

<body>
<a href="mods.php"><h4>Back.</h4></a>
<center><h1>Blog Posts</h1></center>
	<table style="margin-top: 150px;" class="table table-bordered table-striped table_details_admin">
		<thead>
			<th>Title</th><th>Date</th><th>REMOVE</th>
		</thead>
		<tbody>
			<?php
		   		$sql = "SELECT * FROM news";
				$nquery = $db->query($sql);
				while($news = mysqli_fetch_assoc($nquery)): ?>
			<tr>
			<td><?php echo $news['title']; ?></td>
			<td><?php echo $news['date']; ?></td>
			<td><a href="blog_admin.php?remove=<?=$news['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endwhile; ?>	
		</tbody>
	</table> 

<center>
<div style="margin-top: 150px;" class="text-center ">
<h1>Insert New Post</h1>
	<form class="form-inline" action="blog_admin.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	<h3>Add Title:</h3><input type="text" name="title"  class="form-control input-faq"/>
	<h3>Add Image:</h3><input type="file" name="image"  class="form-control input-faq"/>
	<h3>Add Description(text before image):</h3><textarea rows="15" cols="80" type="text" name="description"  class="form-control input-faq"/></textarea>
	<h3>Add Content(text after image):</h3><textarea rows="15" cols="80" type="text" name="content"  class="form-control input-faq"/></textarea>
	<h3>Add Author:</h3><input type="text" name="author"  class="form-control input-faq"/>
	<h3>Add Date:</h3><input type="date" name="date"  class="form-control input-faq"/>

	<p><input type="submit" name="submit" class="btn"/></p>
	</div>
	</form>
</div>
</center>

	<?php
	
	 include 'footer.php'; ?>

</body>
</html>