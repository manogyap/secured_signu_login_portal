<?php  


session_start();

session_destroy();

echo '<script type="text/javascript">alert("successfully logged out !!!");</script>';
   

   echo '<script type="text/javascript">window.location="home.php";</script>';
?>