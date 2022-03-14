<?php include "header.php";
if($_SESSION['role']=='Normal User'){
	header('location:post.php');
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add user </title>
</head>
<body>
<div id="admin-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<h1 class="admin-heading">Add User</h1>
			</div>
			<div class="col-md-offset-3 col-md-6">
					<!-- Form Start -->
					<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method ="POST" autocomplete="on">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="fname" class="form-control" placeholder="First Name" required>
						</div>
							<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lname" class="form-control" placeholder="Last Name" required>
						</div>
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="username" class="form-control" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label>E-mail</label>
							<input type="email" name="useremail" class="form-control" placeholder="E-mail" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label>User Role</label>
							<select class="form-control" name="role" >
									<option value="Normal User">Normal User</option>
									<option value="Admin">Admin</option>
							</select>
						</div>
						<input type="submit"  name="adduser" class="btn btn-primary" value="Save" required />
					</form>
					<!-- Form End-->
					<!-- add user code stard  -->
					<?php 
					include "config.php";
					if(isset($_POST['adduser'])){
						$fname=mysqli_real_escape_string($con,$_POST['fname']);
						$lname=mysqli_real_escape_string($con,$_POST['lname']);
						$username=mysqli_real_escape_string($con,$_POST['username']);
						$useremail=mysqli_real_escape_string($con,$_POST['useremail']);
						$password=mysqli_real_escape_string($con,$_POST['password']);
						$passwordhass=sha1(md5(($password)));
						$role=mysqli_real_escape_string($con,$_POST['role']);
						$serchemail="SELECT * FROM `newwebsite` WHERE `usermail`='$useremail'";
						$query=mysqli_query($con,$serchemail);
						$numrows=mysqli_num_rows($query);
						if($numrows > 0 ){
							?>
								<script>
									alert('allready saved E-mail');
									location.replace('add-user.php')
								</script>
							<?php 
						}else{
							$insertdata="INSERT INTO `newwebsite`(`fastname`, `lastname`, `username`, `usermail`, `password`, `role`) VALUES ('$fname','$lname','$username','$useremail','$passwordhass','$role')";
							$query=mysqli_query($con,$insertdata);
							if($query){
								?>
									<script>
										alert('User added');
										location.replace('users.php');
									</script>
								<?php 
							}else
							?>
								<script>
									alert('query faile');
									location.replace('add-user.php');
								</script>
								<?php
						}
					}
					?>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>