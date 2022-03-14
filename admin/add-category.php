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
	<title>Add New Category</title>
</head>
<body>
<div id="admin-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<h1 class="admin-heading">Add New Category</h1>
			</div>
			<div class="col-md-offset-3 col-md-6">
					<!-- Form Start -->
					<form action="" method="POST" autocomplete="on">
						<div class="form-group">
							<label>Category Name</label>
							<input type="text" name="cat" class="form-control" placeholder="Category Name" required>
						</div>
						<input type="submit" name="addcategory" class="btn btn-primary" value="Add category" required />
					</form>
					<!-- /Form End -->
					<!-- add category -->
					<?php 
					if(isset($_POST['addcategory'])){
						$cat=mysqli_real_escape_string($con,$_POST['cat']);
						$insert="INSERT INTO `category`(`category_name`) VALUES ('$cat')";
						$query=mysqli_query($con,$insert);
						if($query){
							?>
								<script>
									alert('category added successfully');
									location.replace('category.php');
								</script>
							<?php 
						}else{
							?>
								<script>
									alert('category added faile');
									location.replace('category.php');
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
