<?php session_start() ?>
<?php include "header.php"; ?>
<?php include "config.php"; ?>
<?php include "save-post.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add New Post</title>
</head>
<body>
<div id="admin-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<h1 class="admin-heading">Add New Post</h1>
			</div>
			<div class="col-md-offset-3 col-md-6">
					<!-- Form -->
					<form  action="save-post.php" method="POST" autocomplete="on" enctype="multipart/form-data">
						<div class="form-group">
							<label for="post_title">Title</label>
							<input type="text" name="post_title" placeholder="Title" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1"> Description</label>
							<textarea name="postdesc" placeholder="Description" class="form-control" rows="5"  required></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Category</label>
							<select name="category" class="form-control">
									<?php 
										$select="SELECT * FROM `category`";
										$query=mysqli_query($con,$select);
										if(mysqli_num_rows($query)){
											while($datafetch=mysqli_fetch_assoc($query)){
											$id=$datafetch['id'];
											$category_name=$datafetch['category_name'];
											$post=$datafetch['post'];
										
									?>
								<option value="<?php echo $category_name ?>"><?php echo $category_name ?></option>
								<?php 
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Post image</label>
							<input class="form-control" type="file" name="fileToUpload" required>
						</div>
						<input type="submit" name="post" class="btn btn-primary form-control" value="POST NOW" required />
						
					</form>
					<!--/Form -->
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php include "footer.php"; ?>
