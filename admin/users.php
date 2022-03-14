<?php include "header.php"; 
if($_SESSION['role']=='Normal User'){
	header('location:post.php');
}
?>
<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>all users</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="admin-content">
	<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h1 class="admin-heading">All Users</h1>
				</div>
				<div class="col-md-2">
					<a class="add-new" href="add-user.php">add user</a>
				</div>
				<div class="col-md-12">
					<table class="content-table">
							<thead>
								<th>S.No.</th>
								<th>User Name</th>
								<th>E-mail</th>
								<th>Roll</th>
								<th>Update</th>
								<th>Delete</th>
							</thead>
							<tbody>
							<!-- all user data fatch -->
							<?php 
								$limit=8;
								if(isset($_GET['page'])){
									$page_num=$_GET['page'];
								}else{
									$page_num=1;
								}
								$offset=($page_num -1) * $limit;
								$select="SELECT * FROM `newwebsite` ORDER BY `id` DESC LIMIT $offset,$limit";
								$query=mysqli_query($con,$select);
								$numrows=mysqli_num_rows($query);
								if($numrows){
									$serial=$offset + 1;
									while($datafatch=mysqli_fetch_assoc($query)){
										$fatchid=$datafatch['id'];
										$fatchname=$datafatch['username'];
										$fatchemail=$datafatch['usermail'];
										$fatchrole=$datafatch['role'];
										?>
											<tr>
												<td><?php echo $serial ?></td>
												<td><?php echo $fatchname ?></td>
												<td><?php echo $fatchemail ?></td>
												<td><?php echo $fatchrole ?></td>
												<td><a href="update-user.php?id=<?php echo $fatchid ?>"><i class="fas fa-edit"></i></a></td>
												<td><a href="deleteuserdata.php?id=<?php echo $fatchid ?>"><i class="fas fa-trash"></i></a></td>
											</tr>
										<?php 
										$serial ++;
									}
								}
							?>
							</tbody>
					</table>
					<?php 
						$select="SELECT * FROM `newwebsite`";
						$query=mysqli_query($con,$select);
						if(mysqli_num_rows($query)){
							$totalrecoud=mysqli_num_rows($query);
							$totalpage=ceil($totalrecoud/$limit);
							echo "<ul class='pagination admin-pagination'>";
							if($page_num > 1){
								echo '<li style="cursor: pointer;"><a href="users.php?page='.($page_num-1).'">prev</a></li>';
							}
							for($i=1; $i <= $totalpage; $i++){
								if($i==$page_num){
									$active='active';
								}else{
									$active='';
								}
								echo '<li class='.$active.'><a href="users.php?page='.$i.'">'.$i.'</a></li>';
							}
							if($totalpage > $page_num){
								echo '<li><a href="users.php?page='.($page_num+1).'">Next</a></li>';
							}
						}
					?>
					</ul>
				</div>
			</div>
	</div>
</div>
<?php include "header.php"; ?>
</body>
</html>
