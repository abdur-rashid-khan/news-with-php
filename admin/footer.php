<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- footer fetch  -->
                    <?php 
                        include "config.php";
                        $selected="SELECT * FROM `settings`";
                        $query=mysqli_query($con,$selected);
                        if(mysqli_num_rows($query)){
                            while($datafetch=mysqli_fetch_assoc($query)){
                                $footer_dis=$datafetch['footer_dis']; 
                                $contacts_link=$datafetch['contacts_link']; 
                                $contacts_link_name=$datafetch['contacts_link_name'];  
                    ?>
                <span>&copy; <?php echo  $footer_dis ?><a target="_blank" href="<?php echo  $contacts_link ?>"> <?php echo  $contacts_link_name ?></a></span>
                <?php 
                            }
                        }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
