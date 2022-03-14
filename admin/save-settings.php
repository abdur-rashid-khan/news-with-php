<!-- save-settings -->
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
$website_name=mysqli_real_escape_string($con,$_POST['website_name']); 
$footer_desc=mysqli_real_escape_string($con,$_POST['footer_desc']);
$contacts_link=mysqli_real_escape_string($con,$_POST['contacts_link']);
$link_name=mysqli_real_escape_string($con,$_POST['link_name']);
// updaing command sqli
$update="UPDATE `settings` SET `website_name`='$website_name',`logo`='$$img_name',`footer_dis`='$footer_desc',`contacts_link`='$contacts_link',`contacts_link_name`='$link_name'";
if(mysqli_query($con,$update)){
   ?>
      <script>
         alert('updaing successfully');
         location.replace('settings.php');
      </script>
   <?php 
}else{
   ?>
      <script>
         alert('updaing faile');
         location.replace('settings.php');
      </script>
   <?php
}
?>