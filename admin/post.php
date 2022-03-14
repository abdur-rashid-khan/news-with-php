<?php include "header.php"; ?>
<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Posts</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="admin-content">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
						<h1 class="admin-heading">All Posts</h1>
				</div>
				<div class="col-md-2">
						<a class="add-new" href="add-post.php">add post</a>
				</div>
				<div class="col-md-12">
						<table class="content-table">
							<thead>
								<th>S.No.</th>
								<th>Title</th>
								<th>Category</th>
								<th>Date</th>
								<th>Author</th>
								<th colspan="2">Option</th> 
							</thead>
							<!-- datafetch in database of post -->
							<?php 
							$limit=10;
							if(isset($_GET['page'])){
								$page_num=$_GET['page'];
							}else{
								$page_num=1;
							}
							$offset=($page_num -1) * $limit;
							if($_SESSION['role']=='Admin'){
								$selected="SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT $offset,$limit";
							}elseif($_SESSION['role']=='Normal User'){
								$selected="SELECT * FROM `post` WHERE `author`='{$_SESSION['username']}' ORDER BY `post_id` DESC LIMIT $offset,$limit";
							}
							$query=mysqli_query($con,$selected);
							$numrows=mysqli_num_rows($query);
							if($numrows > 0){
								$serial = $offset + 1;
								while($datafetch=mysqli_fetch_assoc($query)){
									$d_id=$datafetch['post_id'];
									$d_title=$datafetch['title'];
									$d_description=$datafetch['description'];
									$d_category=$datafetch['category'];
									$post_date=$datafetch['post_date'];
									$author=$datafetch['author'];
							?>
							<tbody>
								<tr>
									<td><?php echo $serial ?></td>
									<td><?php echo $d_title ?></td>
									<!-- <td><?php echo $d_description ?></td> -->
									<td><?php echo $d_category ?></td>
									<td><?php echo $post_date ?></td>
									<td><?php echo $author ?></td>
									<td><a href="update-post.php?id=<?php echo $d_id ?>"><i class="fas fa-edit"></i></a></td>
									<td><a href="delete-post.php?id=<?php echo $d_id ?>"><i class="fas fa-trash"></i></a></td>
								</tr>
							</tbody>
							<?php 
							$serial++;
								}
							}
							?>
						</table>
						<!-- pageition -->
						<?php 
							$p_select="SELECT * FROM `post`";
							$p_query=mysqli_query($con,$p_select);
							$total_recoud=mysqli_num_rows($p_query);
							$total_page=ceil($total_recoud/$limit);
							echo "<ul class='pagination admin-pagination'>";
							if($page_num > 1){
								echo '<li style="cursor: pointer;"><a href="post.php?page='.($page_num-1).'">prev</a></li>';
							}
								for($i=1; $i <= $total_page; $i++ ){
									echo '<li class=""><a href=post.php?page='.$i.'>'.$i.'</a></li>';
								}
								if($total_page > $page_num){
									echo '<li><a href="post.php?page='.($page_num+1).'">Next</a></li>';
								}
							echo "</ul> ";
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
