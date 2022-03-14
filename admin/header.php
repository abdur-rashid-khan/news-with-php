<!-- <?php session_start() ?> -->
<!-- logout styme -->
<?php 
	if(!isset($_SESSION['username'])){
		?>
			<script>
				location.replace('index.php');
			</script>
		<?php 
	}
?>
<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>ADMIN Panel</title>
		<link rel="shortcut icon" href="logo/news-report.png" type="image/x-icon">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../css/font-awesome.css">
		<!-- Custom stlylesheet -->
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<!-- HEADER -->
		<div id="header-admin">
			<!-- container -->
			<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-2">
							<!-- logo facth  -->
							<?php 
								include "config.php";
								$selected="SELECT * FROM `settings`";
								$query=mysqli_query($con,$selected);
								if(mysqli_num_rows($query)){
									while($datafetch=mysqli_fetch_assoc($query)){
										$logo=$datafetch['logo'];
										echo '<a href="post.php"><img class="logo" src="logo/'.$logo.'"></a>';
									}
								}
							?>
						</div>
						<!-- /LOGO -->
							<!-- LOGO-Out -->
						<div class="col-md-offset-8  col-md-2">
							<a href="logout.php" style="text-decoration: none;font-size: 15px;cursor: pointer;text-transform: uppercase;" class="admin-logout" ><p>
								<?php if($_SESSION['username']){
									echo $_SESSION['username'];
								}else{
									echo '<h3 class ="alert alert-danger"></h3>';
								} ?>
							</p>   </a>
							<p style="margin-top: -19px;padding-left:32px;font-size: 10px;">logout</p>
						</div>
						<!-- /LOGO-Out -->
					</div>
			</div>
		</div>
		<!-- /HEADER -->
		<!-- Menu Bar -->
		<div id="admin-menubar">
			<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul class="admin-menu">
									<li>
										<a href="post.php">Post</a>
									</li>
									<!-- just use admin this option -->
									<?php 
										if($_SESSION['role']=='Admin'){
									?>
									<li>
										<a href="category.php">Category</a>
									</li>
									<li>
										<a href="users.php">Users</a>
									</li>
									<li>
										<a href="settings.php">Settings</a>
									</li>
									<?php
								}
								?>
							</ul>
						</div>
					</div>
			</div>
		</div>
		<!-- /Menu Bar -->
		<script>
			$(function () {
			$('[data-toggle="tooltip"]').tooltip()
			})
		</script>
</body>
</html>
