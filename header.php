
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php 
	include 'config.php';
	$page=basename($_SERVER['PHP_SELF']);
	switch($page){
		case "single.php":
			if(isset($_GET['id'])){
				$post_id=$_GET['id'];
				$sql_title = "SELECT * FROM `post` WHERE `post_id` ='$post_id'";
				$result_title = mysqli_query($con,$sql_title) or die("Tile Query Failed");
				$row_title = mysqli_fetch_assoc($result_title);
				$page_title = $row_title['title'];
			}else{
				$page_title = "No Post Found";
			}
			echo '<title>'.$page_title.'</title>';
		break;
		case "author.php";
			if(isset($_GET['author'])){
				$author=$_GET['author'];
				$sql_title = "SELECT * FROM `post` WHERE `author` ='$author'";
				$result_title = mysqli_query($con,$sql_title) or die("Tile Query Failed");
				$row_title = mysqli_fetch_assoc($result_title);
				$page_title = $row_title['author'];
			}else{
				$page_title = "No Post Found";
			}
			echo '<title>'.$page_title.'</title>';
			break;
		case "category.php";
		if(isset($_GET['category'])){
			$author=$_GET['category'];
			$sql_title = "SELECT * FROM `post` WHERE `category` ='$author'";
			$result_title = mysqli_query($con,$sql_title) or die("Tile Query Failed");
			$row_title = mysqli_fetch_assoc($result_title);
			$page_title = $row_title['category'];
		}else{
			$page_title = "No Post Found";
		}
		echo '<title>'.$page_title.'</title>';
		break;
	}
?> 
	<link rel="shortcut icon" href="admin/logo/news-report.png" type="image/x-icon"
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Custom stlylesheet -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- LOGO -->
			<div class=" col-md-offset-4 col-md-4">
					<a href="index.php" id="logo"><img src="images/news.jpg"></a>
			</div>
			<!-- /LOGO -->
		</div>
	</div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
	<div class="container">
		<div class="row">
			<div style="display: flex; text-align: center;" class="col-md-12">
				<ul class='menu'>
					<li><a href="index.php">Home</a></li>
				</ul>
					<!-- datafech  -->
					<?php  
						include "config.php";
						$selceted="SELECT * FROM `category` WHERE `post` > 0";
						$query=mysqli_query($con,$selceted);
						$numrows=mysqli_num_rows($query);
						if($numrows){
							while($datafatch=mysqli_fetch_assoc($query)){
								$id=$datafatch['id'];
								$category_name=$datafatch['category_name'];
								$post=$datafatch['post']; 
								?> 
					<ul class='menu'>
						<li><a class="" href='category.php?category=<?php echo $category_name ?>  '><?php echo $category_name ?></a></li> 
					</ul>
					<?php 
				}
			}
		?>
			</div>
		</div>
	</div>
</div>
<!-- /Menu Bar -->
