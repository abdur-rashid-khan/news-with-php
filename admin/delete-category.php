<!-- delete category  -->
<?php 
include "config.php";
if(isset($_GET['id'])){
   $id=$_GET['id'];
   echo $delete="DELETE FROM `category` WHERE `id`='$id'";
   $query=mysqli_query($con,$delete);
   if($query){
      ?>
         <script>
            alert('Deleted successfully');
            location.replace('category.php');
         </script>
      <?php 
   }else{
      ?>
         <script>
            alert('Deleted faile');
            location.replace('category.php');
         </script>
      <?php 
   }
}
?>