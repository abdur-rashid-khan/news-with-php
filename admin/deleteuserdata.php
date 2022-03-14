<?php include "header.php"; 
if($_SESSION['role']=='Normal User'){
	header('location:post.php');
}?>
<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete User Details</title>
</head>
<body>
<div id="admin-content">
	<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="admin-heading">Delete User Details</h1>
				</div>
				<div class="col-md-offset-4 col-md-4">
					<!-- Form Start -->
					<?php 
					if(isset($_GET['id'])){
						$id=$_GET['id'];
						$select="SELECT * FROM `newwebsite` WHERE `id`='$id'";
						$query=mysqli_query($con,$select);
						$numrows=mysqli_num_rows($query);
						if($numrows){
							while($datafatch=mysqli_fetch_assoc($query)){
								$fatchid=$datafatch['id'];
								$fastname=$datafatch['fastname'];
								$lastname=$datafatch['lastname'];
								$fatchname=$datafatch['username'];
								$fatchemail=$datafatch['usermail'];
								$fatchrole=$datafatch['role'];
								?>
								<form  action="" method ="POST">
										<div class="form-group">
											<input disabled type="text" name="user_id"  class="form-control" value="<?php  echo $fatchid ?>" placeholder="" >
										</div>
											<div class="form-group">
											<label>First Name</label>
											<input type="text" name="f_name" class="form-control" value="<?php  echo $fastname ?>" placeholder="" required>
										</div>
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" name="l_name" class="form-control" value="<?php  echo $lastname ?>" placeholder="" required>
										</div>
										<div class="form-group">
											<label>User Name</label>
											<input type="text" name="username" class="form-control" value="<?php  echo $fatchname ?>" placeholder="" required>
										</div>
										<!-- <div class="form-group">
											<label>E-mail</label>
											<input type="email" name="useremail" class="form-control" placeholder="E-mail" value="<?php  echo $fatchemail ?>" required>
										</div> -->
										<div class="form-group">
											<label>User Role</label>
											<select class="form-control" name="role" value="<?php $fatchrole ?>">
												<option value="<?php echo $fatchrole ?>" selected ><?php echo $fatchrole ?></option>
												<option value="normal User">normal User</option>
												<option value="Admin">Admin</option>
											</select>
										</div>
										<input type="submit" name="delete" class="btn btn-primary form-control" value="Delete User Details " required />
								</form>
								<?php 
								}
							}
						
						?>
					<!-- /Form -->
					<?php 
					if(isset($_POST['delete'])){
						$delete="DELETE FROM `newwebsite` WHERE `id`='$id'";
						$query=mysqli_query($con,$delete);
						if($query){
							?>
								<script>
									alert('Deleted successfully');
									location.replace('users.php');
								</script>
							<?php 
						}else{
							?>
								<script>
									alert('Deleted faile');
									location.replace('users.php');
								</script>
							<?php
						}
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
