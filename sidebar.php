<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
</head>
<body>
<div id="sidebar" class="col-md-4">
	<!-- search box -->
	<div class="search-box-container">
		<h4>Search</h4>
		<form class="search-post" action="search.php" method ="GET">
			<div class="input-group">
					<input type="text" name="search" value="" class="form-control" placeholder="Search .....">
					<span class="input-group-btn">
						<input style="color: #fff;" type="submit" class="btn btn-danger" value="Search">
					</span>
			</div>
		</form>
	</div>
	<!-- /search box -->
	<!-- recent posts box -->
	<div class="recent-post-container">
		<h4>Recent Posts</h4>
		<!-- datafetch -->
		<?php 
		$limit=4;
			$select="SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT $limit";
			$query=mysqli_query($con,$select);
			if(mysqli_num_rows($query)){
				while($datafecth=mysqli_fetch_assoc($query)){
					$post_id=$datafecth['post_id'];
					$title=$datafecth['title'];
					$description=$datafecth['description'];
					$category=$datafecth['category'];
					$post_date=$datafecth['post_date'];
					// $author=$datafecth['author'];
					$post_img=$datafecth['post_img']; 
		?>
		<div class="recent-post">
			<a class="post-img" href="single.php?id=<?php echo $post_id ?>">
					<img src="admin/upload/<?php echo $post_img ?>" alt=""/>
			</a>
			<div class="post-content">
					<h5><a href='single.php?id=<?php echo $post_id ?>'><?php echo $title ?></a></h5>
					<span>
						<i class="fa fa-tags" aria-hidden="true"></i>
						<a href='category.php?category=<?php echo $category ?>'><?php echo $category ?></a>
					</span>
					<span>
						<i class="fa fa-calendar" aria-hidden="true"></i>
						<?php echo $post_date ?>
					</span>
					<a class="read-more" href='single.php?id=<?php echo $post_id ?>'>read more</a>
			</div>
		</div>
		<?php 
				}
			}
		?>
	</div>
	<!-- /recent posts box -->
</div>
</body>
</html>