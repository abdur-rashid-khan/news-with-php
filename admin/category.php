<?php session_start(); ?>
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
	<title>All Categories</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="admin-content">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
					<h1 class="admin-heading">All Categories</h1>
			</div>
			<div class="col-md-2">
					<a class="add-new" href="add-category.php">add category</a>
			</div>
			<div class="col-md-12">
					<table class="content-table">
						<thead>
							<th>S.No.</th>
							<th>Category Name</th>
							<th>No. of Posts</th>
							<th colspan="2">Option</th> 
						</thead>
						<!-- data fetch cetagory -->
						<?php 
								$limit=8;
								if(isset($_GET['page'])){
									$page_num=$_GET['page'];
								}else{
									$page_num=1;
								}
								$offset=($page_num -1) * $limit;
								$select="SELECT * FROM `category` LIMIT $offset,$limit";
								$query=mysqli_query($con,$select);
								$numrows=mysqli_num_rows($query);
								if($numrows){
									$serial=$offset + 1;
									while($datafetch=mysqli_fetch_assoc($query)){
										$id=$datafetch['id'];
										$category_name=$datafetch['category_name'];
										$post=$datafetch['post'];
							?>
						<tbody>
							<tr>
								<td><?php echo $serial ?></td>
								<td><?php echo $category_name ?></td>
								<td><?php echo $post ?></td>
								<td><a href="update-category.php?id=<?php echo $id ?>"><i class="fas fa-edit"></i></a></td>
								<td><a href="delete-category.php?id=<?php echo $id ?>"><i class="fas fa-trash"></i></a></td>
							</tr>
						</tbody>
						<?php  
								$serial ++;
									}
								}
							?>
					</table>
					<?php 
						$select="SELECT * FROM `category`";
						$query1=mysqli_query($con,$select);
						if(mysqli_num_rows($query1)){
							$totalrecoud=mysqli_num_rows($query1);
							$totalpage=ceil($totalrecoud/$limit);
							echo "<ul class='pagination admin-pagination'>";
							if($page_num > 1){
								echo '<li style="cursor: pointer;"><a href="category.php?page='.($page_num-1).'">prev</a></li>';
							}
							for($i=1; $i <= $totalpage; $i++){
								if($i==$page_num){
									$active='active';
								}else{
									$active='';
								}
								echo '<li class='.$active.'><a href="category.php?page='.$i.'">'.$i.'</a></li>';
							}
							if($totalpage > $page_num){
								echo '<li><a href="category.php?page='.($page_num+1).'">Next</a></li>';
							}
						}
					?>
					<!-- <ul class='pagination admin-pagination'>
						<li class="active"><a>1</a></li>
						<li><a>2</a></li>
						<li><a>3</a></li>
					</ul> -->
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php include "footer.php"; ?>
