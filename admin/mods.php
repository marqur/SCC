
<?php

session_start();

require_once '../core/init.php';

 include 'header.php';?>
 
<?php include 'nav.php'; ?>
<body>
<center class='title_stats'><h1>Website Editing</h1></center>
<div class="container mods-admin">
	<div cass="row">
		<a href="faq_edit.php"><div class="col-md-3 mod1">
			<center><h1>FAQ Editing</h1></center>
		</div></a>
		<a href="details_admin.php"><div class="col-md-3 mod2">
			<center><h1>Camp Details</h1></center>
		</div></a>
		<a href="blog_admin.php"><div class="col-md-3 mod3">
			<center><h1>Blog Editing</h1></center>
		</div></a>
		<a href="gallery_admin.php"><div class="col-md-3 mod4">
			<center><h1>Gallery Editing</h1></center>
		</div>	</a>
	</div>
</div>