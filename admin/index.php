<?php session_start() ?>
<?php include "config.php" ?>
<!doctype html>
<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>ADMIN | Login</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<div id="wrapper-admin" class="body-content">
			<div class="container">
					<div class="row">
						<div class="col-md-offset-4 col-md-4">
							<img class="logo" src="images/news.jpg">
							<h3 class="heading">Admin</h3>
							<!-- Form Start -->
							<form  action="" method ="POST" autocomplete="on">
									<div class="form-group">
										<label>user eamil</label>
										<input type="eamil" name="usereamil" class="form-control" placeholder="user eamil" required>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" placeholder="password" required>
									</div>
									<input type="submit" name="login" class="btn btn-primary" value="login" />
							</form>
							<!-- /Form  End -->
							<!-- login -->
							<?php 
							
								if(isset($_POST['login'])){
									$usereamil=$_POST['usereamil'];
									$userpassword=$_POST['password'];
									$select="SELECT `id` ,`usermail` , `password`, `role` ,`username` FROM `newwebsite` WHERE `usermail`='$usereamil'";
									$query=mysqli_query($con,$select);
									if(mysqli_num_rows($query)>0){
										$datafatch=mysqli_fetch_assoc($query);
										$_SESSION['username']=$datafatch['username'];
										$db_pass=$datafatch['password'];
										$_SESSION['id']=$datafatch['id'];
										$_SESSION['role']=$datafatch['role'];
										$passhasing=sha1(md5(($userpassword)));
										if($passhasing===$db_pass){
											?>
												<script>
													alert('login successfully');
													location.replace('post.php');
												</script>
											<?php 
										}else{
											?>
												<script>
													alert('password increact');
													location.replace('index.php');
												</script>
											<?php
										}
									}else{
										?>
											<script>
												alert("E-mail and password not macing");
												location.replace('index.php');
											</script>
										<?php 
									}
								}
							?>
						</div>
					</div>
			</div>
		</div>
	</body>
</html>