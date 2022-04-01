<?php 
   session_start();
   session_destroy();
   echo '<script>alert("You have been Log out!");
      window.location = "login.php";</script>';
      exit;
   ?>