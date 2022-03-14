<?php include "header.php"; 
if($_SESSION['role']=='Normal User'){
header('location:post.php');
}
?>
<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Category</title>
</head>
<body>
<div id="admin-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<h1 class="adin-heading"> Update Category</h1>
			</div>
			<div class="col-md-offset-3 col-md-6">
					<form action="" method ="POST">
						<!-- data fecth  -->
						<?php 
							$id=$_GET['id'];
							$db_select="SELECT * FROM `category` WHERE `id`='$id'";
							$db_query=mysqli_query($con,$db_select);
							$numrows=mysqli_num_rows($db_query);
							if($numrows){
								while($datafetch=mysqli_fetch_assoc($db_query)){
									$catname=$datafetch['category_name'];
								
						?>
						<div class="form-group">
							<input type="hidden" name="cat_id"  class="form-control" value="1" placeholder="">
						</div>
						<div class="form-group">
							<label>Category Name</label>
							<input type="text" name="cat_name" class="form-control" value="<?php echo $catname ?>"  placeholder="" required>
						</div>
						<input type="submit" name="catupdate" class="btn btn-primary" value="Update" required />
						<?php 
								}
							}
						?>
					</form>
					<!-- updatng  Category Name -->
					<?php 
						if(isset($_POST['catupdate'])){
							$id=$_GET['id'];
							$cat_name=$_POST['cat_name'];
							$update="UPDATE `category` SET `category_name`='$cat_name' WHERE `id`='$id'";
							$query=mysqli_query($con,$update);
							if($query){
								?>
									<script>
										alert('category name updating successfully');
										location.replace('category.php')
									</script>
								<?php
							}else{
								?>
									<script>
										alert('category name updating faile');
										location.replace('category.php')
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
<?php include "footer.php"; ?>
