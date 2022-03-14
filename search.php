<?php include 'header.php'; ?>
<?php include 'config.php'; ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Search</title>
	</head>
	<body>
	<div id="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
					<!-- post-container -->
					<!-- data fecth -->
					<?php 
						if(isset($_GET['search'])){
							$search=mysqli_real_escape_string($con,$_GET['search']);
							$_SESSION['search']=$search;
						
					?>
					<h2 class="page-heading">Search : <?php echo $search ?></h2>
					<?php 
							$limit=3;
								if(isset($_GET['page'])){
									$page_num=$_GET['page'];
								}else{
									$page_num=1;
								}
								$offset=($page_num -1) * $limit;
							$select="SELECT * FROM `post` WHERE `post_id` LIKE '%{$search}%' OR `title` LIKE '%{$search}%' OR `description` LIKE '%{$search}%' OR `category` LIKE '%{$search}%' OR `author` LIKE '%{$search}%' ORDER BY `post_id` DESC LIMIT $offset,$limit ";
							$query=mysqli_query($con,$select)or die("Query Failed."); 
							if(mysqli_num_rows($query)){
								while($datafecth=mysqli_fetch_assoc($query)){
									$post_id=$datafecth['post_id'];
									$title=$datafecth['title'];
									$description=$datafecth['description'];
									$category=$datafecth['category'];
									$post_date=$datafecth['post_date'];
									$author=$datafecth['author'];
									$post_img=$datafecth['post_img'];
						?>
						<div class="post-content">
							<div class="row">
									<div class="col-md-4">
										<a class="post-img" href="single.php"><img src="admin/upload/<?php echo $post_img ?>" alt=""/></a>
									</div>
									<div class="col-md-8">
										<div class="inner-content clearfix">
											<h3><a href='single.php'><?php echo $title ?></a></h3>
											<div class="post-information">
													<span>
														<i class="fa fa-tags" aria-hidden="true"></i>
														<a href='category.php?category=<?php echo $category ?>'><?php echo $category ?></a>
													</span>
													<span>
														<i class="fa fa-user" aria-hidden="true"></i>
														<a href='author.php?author=<?php echo $author ?>'><?php echo $author ?></a>
													</span>
													<span>
														<i class="fa fa-calendar" aria-hidden="true"></i>
														<?php echo $post_date ?>
													</span>
											</div>
											<p class="description">
											<?php echo substr($description,0,120).'....' ?>
											</p>
											<a class='read-more pull-right' href='single.php?id=<?php echo $post_id ?>'>read more</a>
										</div>
									</div>
							</div>
						</div>
						<?php 
								}
							}else{
								echo '<h2 class=""> Not Found Data </h2>';
							}
						?>
						<?php 
						$select="SELECT * FROM `post` WHERE `post_id` LIKE '%{$search}%' OR `title` LIKE '%{$search}%' OR `description` LIKE '%{$search}%' OR `category` LIKE '%{$search}%' OR `author` LIKE '%{$search}%' ";
						$query1=mysqli_query($con,$select);
						if(mysqli_num_rows($query1)){
							$totalrecoud=mysqli_num_rows($query1);
							$totalpage=ceil($totalrecoud/$limit);
							echo "<ul class='pagination admin-pagination'>";
							if($page_num > 1){
								echo '<li style="cursor: pointer;"><a href="search.php?search='.$search.'&page='.($page_num-1).'">prev</a></li>';
							}
							for($i=1; $i <= $totalpage; $i++){
								if($i==$page_num){
									$active='active';
								}else{
									$active='';
								}
								echo '<li class='.$active.'><a href="search.php?search='.$search.'&page='.$i.'">'.$i.'</a></li>';
							}
							if($totalpage > $page_num){
								echo '<li><a href="search.php?search='.$search.'&page='.($page_num+1).'">Next</a></li>';
							}
						} 
					}
					?>
						<!-- <ul class='pagination'>
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
						</ul> -->
			</div>
			<?php include 'sidebar.php'; ?>
		</div>
	</div>
	</div>
	</body>
	</html>
<?php include 'footer.php'; ?>
