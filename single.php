<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<div id="main-content">
		<div class="container">
			<div class="row">
				<!-- data show -->
				<?php 
					include "config.php";
					$id=$_GET['id'];
						$seleted="SELECT * FROM `post` WHERE `post_id`='$id'";
						$query=mysqli_query($con,$seleted);
						if($numrows=mysqli_num_rows($query)){
							while($datafecth=mysqli_fetch_assoc($query)){
								$post_id =$datafecth['post_id'];
								$title=$datafecth['title'];
								$description=$datafecth['description'];
								$category=$datafecth['category'];
								$post_date=$datafecth['post_date'];
								$author=$datafecth['author'];
								$post_img=$datafecth['post_img'];
					?>
					<div class="col-md-8">
					<!-- post-container -->
						<div class="post-container">
							<div class="post-content single-post">
									<h3 style="text-align: center;"><?php echo $title ?></h3>
									<div style="text-align: center;" class="post-information">
										<span>
											<i class="fa fa-tags" aria-hidden="true"></i>
											<?php echo $category ?>
										</span>
										<span>
											<i  class="fa fa-user" aria-hidden="true"></i>
											<a  href='author.php?author=<?php echo $author ?>'><?php echo $author ?></a>
										</span>
										<span>
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<?php echo $post_date ?>
										</span>
									</div>
									<img class="single-feature-image" src="admin/upload/<?php echo $post_img ?>" alt=""/>
									<p  class="description">
									<?php echo $description ?>
									</p>
							</div>
						</div>
						<!-- /post-container -->
					</div>
					<?php 
							}
						}
					?>
					<?php include 'sidebar.php'; ?>
			</div>
		</div>
	</div>
</body>
</html>
<?php include 'footer.php'; ?>
