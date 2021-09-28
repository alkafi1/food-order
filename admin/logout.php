<?php
 //seesion destroy logout
  include('../config/constant.php');
  session_destroy();//useset $_SESSION['user']

 //2.redirect login page
 header('location:'.SITEURL.'admin/login.php');



?>