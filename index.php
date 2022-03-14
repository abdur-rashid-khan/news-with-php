<?php include 'header.php'; ?>
	<div id="main-content">
		<div class="container">
			<div class="row">
					<div class="col-md-8">
						<!-- post-container -->
						<!-- data show -->
						<div class="post-container">
						<?php 
							include "config.php";
							$limit=3;
								if(isset($_GET['page'])){
									$page_num=$_GET['page'];
								}else{
									$page_num=1;
								}
								$offset=($page_num -1) * $limit;
								$seleted="SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT $offset,$limit";
								$query=mysqli_query($con,$seleted);
								if($numrows=mysqli_num_rows($query)){
									while($datafecth=mysqli_fetch_assoc($query)){
										$post_id =$datafecth['post_id'];
										$title=$datafecth['title'];
										$description=$datafecth['description'];
										$category=$datafecth['category'];
										$post_date=$datafecth['post_date'];
										$author=$datafecth['author'];
										$post_img=$datafecth['post_img'];
							?>
							<div class="post-content">
									<div class="row"> 
										<div class="col-md-4">
											<a class="post-img" href="single.php?id=<?php echo $post_id ?>"><img src="admin/upload/<?php echo $post_img ?>" alt=""/></a>
										</div>
										<div class="col-md-8">
											<div class="inner-content clearfix">
													<h3><a href='single.php?id=<?php echo $post_id ?>'><?php echo $title ?></a></h3>
													<div class="post-information">
														<span>
															<i class="fa fa-tags" aria-hidden="true"></i>
															<a href='category.php?category=<?php echo $category ?>'><?php echo $category ?></a>
														</span>
														<span>
															<i class="fa fa-user" aria-hidden="true"></i>
															<a href='author.php?author=<?php echo $author ?>'><?php echo $author ?></a>
														</span>
														<span>
															<i class="fa fa-calendar" aria-hidden="true"></i>
															<?php echo $post_date ?>
														</span>
													</div>
													<p class="description">
														<?php echo substr($description,0,120) .'....' ?>
													</p>
													<a class='read-more pull-right' href='single.php?id=<?php echo $post_id ?>'>read more</a>
											</div> 
										</div>
									</div>
							</div>  
						
						<?php 
								}
							}
						?>
						<?php 
						$select="SELECT * FROM `post`";
						$query1=mysqli_query($con,$select);
						if(mysqli_num_rows($query1)){
							$totalrecoud=mysqli_num_rows($query1);
							$totalpage=ceil($totalrecoud/$limit);
							echo "<ul class='pagination admin-pagination'>";
							if($page_num > 1){
								echo '<li style="cursor: pointer;"><a href="index.php?page='.($page_num-1).'">prev</a></li>';
							}
							for($i=1; $i <= $totalpage; $i++){
								if($i==$page_num){
									$active='active';
								}else{
									$active='';
								}
								echo '<li class='.$active.'><a href="index.php?page='.$i.'">'.$i.'</a></li>';
							}
							if($totalpage > $page_num){
								echo '<li><a href="index.php?page='.($page_num+1).'">Next</a></li>';
							}
						}
					?>
						<!-- <ul class='pagination'>
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
						</ul> -->
					</div><!-- /post-container -->
					</div>
					<?php include 'sidebar.php'; ?>
			</div>
		</div>
	</div>
<?php include 'footer.php'; ?>
