<?php
     //echo "Delete food";
     include('../config/constant.php');
     if(isset($_GET['id']) AND isset($_GET['image_name']))
     {
         //get data from database table tbl food
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            //echo "image heare";
            //delete physical file of image
            $path="../images/food-images/".$image_name;
            //echo $path;
            //delete file
            $remove= unlink($path);
            if($remove==false)
            {
                $_SESSION['remove-food-image']="<div class='error text-center'> Failed To Image.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }
        //query for delte food
        $sql="DELETE FROM tbl_food WHERE id=$id";
        $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($res==true)
        {
            //echo "succes";
            $_SESSION['succes-delete-food']="<div class='succes text-center'>Succes To Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['succes-delete-food']="<div class='error text-center'>Failed To delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

     }
     else
     {
         //echo "redirect";
         header('location:'.SITEURL.'admin/manage-food.php');
     }

?>