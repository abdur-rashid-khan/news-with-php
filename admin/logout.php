<!-- logout -->
<?php
session_start();
session_unset();
session_destroy();
include "config.php";
?>
<script>
   alert('logout sucessfully');
   location.replace('index.php');
</script>
