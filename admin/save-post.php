<!-- save post -->
<?php 
// connaction start
include "config.php";
// coding start
if(isset($_FILES['fileToUpload'])){
$error=array();
$file_name=$_FILES['fileToUpload']['name'];
$file_size=$_FILES['fileToUpload']['size'];
$file_tmp = $_FILES['fileToUpload']['tmp_name'];
$file_type=$_FILES['fileToUpload']['type'];
$file_ext=explode('.',$file_name);
$check_ext=strtolower(end($file_ext));
$ext=array('jpeg','jpg','png');
if(in_array($check_ext,$ext)){
   // > 2097152
   if($file_size ){
      $new_name=time().'-'.basename($file_name);
      $uploade = "upload/".$new_name;
      move_uploaded_file($file_tmp,$uploade);
      $img_name=$new_name;
   }else{
      ?>
         <script>
            alert('This file size is small');
         </script>
      <?php 
   }
}else{
   ?>
   <script>
      alert('This file is not allow ');
   </script>
   <?php 
}
   if(isset($_POST['post'])){
   $post_title=mysqli_real_escape_string($con,$_POST['post_title']);
   $postdesc=mysqli_real_escape_string($con,$_POST['postdesc']);
   $category=mysqli_real_escape_string($con,$_POST['category']);
   // $post_title=mysqli_real_escape_string($con,$_POST['post_title']); 
   $date=date("d,M,Y");
   session_start();
   if($_SESSION['role']=='Normal User'){
      $author=$_SESSION['username'];
   }else{
      $author=$_SESSION['role'];
   }
   // data insert 
   $sql="INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('$post_title','$postdesc','$category','$date','$author','$img_name');";
   // category post count
   $sql .= "UPDATE `category` SET `post`=post + 1 WHERE `category_name`='$category'";
   $query=mysqli_multi_query($con,$sql);
      if($query){
         ?>
            <script>
               alert('post uploade sucessfully');
               location.replace('post.php');
            </script>
         <?php 
      }else{
         ?>
            <script>
               alert('post uploade faile');
               location.replace('post.php');
            </script>
         <?php 
      }
   }
}
?>