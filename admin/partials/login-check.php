<?php
    //check whether the user is logge
    if(!isset($_SESSION['user']))//if user sesson is not set
    {
        //if user is not logged in
        //redirect to login page
        $_SESSION['no-login-message']="<div class='error text-center'> Please log in to access panel</div>";
        header('location:'.SITEURL.'admin/login.php');
    }


?>