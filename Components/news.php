

<?php
 require_once "core/init.php";		
  


 $sql = "SELECT * FROM news";
$nquery = $db->query($sql);
 ?>
<head>
  <?php include "header.php"; ?>
  <title>Blog</title>

</head>

<body class="news-back">
<?php include "nav.php";?>

<p class="page-header">News.</p>

<div class="container news-post">

<?php while($news = mysqli_fetch_assoc($nquery)): ?>
          <?php $news_id = $news['id']; ?>
<div class="news-item">
<div class="row">
  <div class="col-xs-12 col-news pull-left">
  	<div class="col-md-3 pull-left">
  		<a href="blog_item.php?id=<?php echo $news_id; ?>"><img class="img img-responsive news-image " src="<?php echo $news['image']; ?>" alt="blog item, chess blog"></a>
  	</div>
  	<div class="col-md-7 pull-left">
  			<p class="news-title"><?php echo $news['title']; ?></p>
  			<p class="news-description"><?php echo $news['description']; ?></p>
  			<div class="row">
  			<a class="read-more col-xs-2" href="blog_item.php?id=<?php echo $news_id; ?>">Read More</a>
  			<p class="news-date col-xs-3 pull-right"><?php echo $news['date']; ?></p>
  			</div>
  	</div>
  </div>
</div>

</div>
<hr>
<?php endwhile; ?>
</div>

<!--
<div class="row">
<img style="height: 550px; width: 100%" class="img-responsive img "src="images/news700px.png">
</div> -->

<?php include "footer.php"; ?>
</body>
</html>