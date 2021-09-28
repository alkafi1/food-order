<?php include('../config/constant.php'); ?>

<?php
    //get id from database table
    
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];
        //remove physical file of  img
        if($image_name != "")
        {
            //image file remove
            $path= "..images/category/".$image_name;
            
            $remove =unlink($path);
            
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove']="<div class='error text-center'> Failed to remove image</div>";
                //redirect page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop process
                //die();
            }
        }
            //query for delete
        $sql= "DELETE FROM tbl_category WHERE id=$id";

        //excute the query
        $res= mysqli_query($conn,$sql);

        //check wheter query is work or not
        if($res==true)
        {
            //succes delete message
            $_SESSION['delete-category']="<div class='succes text-center'> Succes To Delete Category.</div>";
            //redirect
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //failed message
            $_SESSION['delete-category']="<div class='error text-center'> Failed To Delete Category.</div>";
            //redirect
            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    
?>