<?php
   include('../config/constant.php');
    //getting id form table to delete admin
   $id=$_GET['id'];

   //create sql query

   $sql= "DELETE FROM tbl_admin where id=$id";

   //excute the query
   $res=mysqli_query($conn,$sql);
   
    if($res==TRUE)
    {
        //echo "admin delete";
        $_SESSION['delete']="<div class='succes'>Admin Delete Successfully.</div>";// creat session variable to delete admin msss
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else
    {
        $_SESSION['delete']="<div class='error'>Fail to Delete Admin.</div>";// creat session variable to delete admin msss
        header("location:".SITEURL.'admin/manage-admin.php');

    }




?>