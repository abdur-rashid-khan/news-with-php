<?php include "header.php";
include "config.php";
if($_SESSION['role'] != 'Admin'){
		$id=$_GET['id'];
		$selecte1="SELECT * FROM `post` WHERE `post_id`='$id'";
		$query1=mysqli_query($con,$selecte1);
		$numrows1=mysqli_num_rows($query1);
		if($numrows1){
			while($datafetch1=mysqli_fetch_assoc($query1)){
				$author=$datafetch1['author'];
	if($author != $_SESSION['username']){
		header('location:post.php');
			} 
		}
	}
}
?>
<?php include "config.php"; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Post</title>
</head>
<body>
<div id="admin-content">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h1 class="admin-heading">Update Post</h1>
	</div>
	<div class="col-md-offset-3 col-md-6">
		<!-- Form for show edit-->
		<!-- datafatech from databash -->
		<?php 
		$id=$_GET['id'];
		$selecte="SELECT * FROM `post` WHERE `post_id`='$id'";
		$query=mysqli_query($con,$selecte);
		$numrows=mysqli_num_rows($query);
		if($numrows > 0){
			while($datafetch1=mysqli_fetch_assoc($query)){
				$post_id=$datafetch1['post_id'];
				$title=$datafetch1['title'];
				$description=$datafetch1['description'];
				$category=$datafetch1['category'];
				$post_img=$datafetch1['post_img'];
		?>
		<form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="on">
			<div class="form-group">
					<label for="exampleInputid">ID</label>
					<input  type="hidden" name="post_id"  class="form-control" value="<?php echo $post_id ?>" placeholder="">
					<input disabled  type="number" name=""  class="form-control" value="<?php echo $post_id ?>" placeholder="">
			</div>
			<div class="form-group">
					<label for="exampleInputTile">Title</label>
					<input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $title ?>">
			</div>
			<div class="form-group">
					<label for="exampleInputPassword1"> Description</label>
					<textarea name="postdesc" class="form-control text-left"  required rows="5"><?php echo $description ?>
					</textarea>
			</div>
			<div class="form-group">
					<label for="exampleInputCategory">Category</label>
					<select  class="form-control" name="category">
						<!-- select option fetch data -->
						<?php 
							$select="SELECT * FROM `category`";
							$query=mysqli_query($con,$select);
							if(mysqli_num_rows($query)){
								while($datafetch=mysqli_fetch_assoc($query)){
								$_SESSION['c_id']=$datafetch['id'];
								$category_name=$datafetch['category_name'];
								$post=$datafetch['post'];
								if($category==$category_name){
									$selected='selected';
								}else{
									$selected='';
								}
						?> 
					<option <?php echo $selected ?> value="<?php echo $category_name ?>"><?php echo $category_name ?></option>
					<?php 
							}
						}
					?>
					</select>
					<input type="hidden" name="old_category" value="<?php echo $category ?>">
			</div>
			<div class="form-group">
			<label for="logo">Post Image</label>
				<input  class="form-control" type="file" name="logo">
				<label style="padding-top:12px;" for="logo">Preview Logo</label><br>
				<img style="width: 100%; height: auto;" src="upload/<?php echo $post_img ?>" alt="">
				<input class="form-control" type="hidden" name="old_logo" value="<?php echo $post_img ?>">
			</div>
			<input type="submit" name="update" class="btn btn-primary" value="Update" />
			
		</form>
		<?php
			}
		} 
			?>
		<!-- Form End -->
	</div>
	</div>
</div>
</div>
</body>
</html>
<?php include "footer.php"; ?>
