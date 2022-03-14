<!-- Settings -->
<?php include "header.php"; ?>
<div id="admin-content">
   <div class="container">
      <div class="row">
            <div class="col-md-12">
               <h1 class="admin-heading">Website Settings</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
               <!-- data fetch  -->
               <?php 
                  include "config.php";
                  $selected="SELECT * FROM `settings`";
                  $query=mysqli_query($con,$selected);
                  if(mysqli_num_rows($query)){
                        while($datafetch=mysqli_fetch_assoc($query)){
                           $website_name=$datafetch['website_name']; 
                           $logo=$datafetch['logo'];  
                           $footer_dis=$datafetch['footer_dis']; 
                           $contacts_link=$datafetch['contacts_link']; 
                           $contacts_link_name=$datafetch['contacts_link_name'];  
               ?>
               <!-- Form -->
               <form  action="save-settings.php" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" name="website_name" placeholder="website  name" value="<?php echo $website_name ?>" class="form-control" autocomplete="on" required>
                     </div>
                     <div class="form-group">
                        <label for="logo">Website Logo</label>
                        <input  class="form-control" type="file" name="logo">
                        <label style="padding-top:12px;" for="logo">Preview Logo</label><br>
                        <img src="logo/<?php echo $logo ?>">
                        <input class="form-control" type="hidden" name="old_logo" value="<?php echo $logo ?>">
                     </div> 
                     <div class="form-group">
                        <label for="footer_desc">Footer Description</label>
                        <textarea placeholder="Footer Description" name="footer_desc" class="form-control" rows="5" value="" required><?php echo $footer_dis ?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="website_name">Footer Contacts link </label>
                        <input type="text" name="contacts_link" placeholder="Footer Contacts link" value="<?php echo $contacts_link ?>" class="form-control" autocomplete="on" required>
                     </div>
                     <div class="form-group">
                        <label for="website_name">Footer Contacts link Name </label>
                        <input type="text" name="link_name" placeholder="Footer Contacts link Name" value="<?php echo $contacts_link_name ?>" class="form-control" autocomplete="on" required>
                     </div>
                     <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
               </form>
               <!--/Form -->
               <?php 
                        }
                     }
               ?>
            </div>
         </div>
   </div>
</div>
<?php include "footer.php"; ?>
