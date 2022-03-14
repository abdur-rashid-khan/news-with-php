<!-- update -->
<?php  
include 'config.php';
if(empty($_FILES['logo']['name'])){
   $file_name=$_POST['old_logo'];
}else{
   $error=array();
   $file_name=$_FILES['logo']['name'];
   $file_size=$_FILES['logo']['size'];
   $file_tmp = $_FILES['logo']['tmp_name'];
   $file_type=$_FILES['logo']['type'];
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
}
   $sql = "UPDATE `post` SET `title`='{$_POST["post_title"]}',`description`='{$_POST["postdesc"]}',`category`='{$_POST["category"]}',`post_img`='$img_name' WHERE `post_id`={$_POST["post_id"]};";
   if($_POST['old_category'] != $_POST['category']){
      $sql .="UPDATE `category` SET `post`=post -1  WHERE `category_name`='{$_POST["old_category"]}';";
      $sql .="UPDATE `category` SET `post`=post +1  WHERE `category_name`='{$_POST["category"]}';"; 
      
   };
   $query=mysqli_multi_query($con,$sql);
   if($query){
      ?>
         <script>
            alert('updating successfully');
            location.replace('post.php');
         </script>
      <?php 
   }else{
      echo$sql = "UPDATE `post` SET `title`='{$_POST["post_title"]}',`description`='{$_POST["postdesc"]}',`category`={$_POST["category"]},`post_img`='{$file_name}'
      WHERE `post_id`={$_POST["post_id"]};";
   $query=mysqli_query($con,$sql);
   }
?>