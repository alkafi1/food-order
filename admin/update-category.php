<?php include('partials/menu.php');?>



  <?php
   if(isset($_GET['id']))
   {
        $id=$_GET['id'];

            //query
        $sql="SELECT * FROM tbl_category WHERE id=$id ";
        //excute the quer
        $res=mysqli_query($conn,$sql);
        
        //check the query
        if($res==true)
        {
            
                $rows=mysqli_fetch_assoc($res);
                $tittle=$rows['tittle'];
                $current_image=$rows['image_name'];
                //$image_name=$rows['image_name'];
                $featured=$rows['featured'];
                $active=$rows['active'];

        
           // else
           //{
               // $_SESSION['no-category-found']="<div class='eerror text-center'> Category Not Found.</div>";
               // header('location'.SITEURL.'admin/manage-category.php');
           //}
        }
   }
   else
    {
        header('location'.SITEURL.'admin/manage-category.php');
    }
  ?>
    <div class="container">
        <div class="main-content">
            <h1>Update Category</h1>
            <br><br>
        
        <!--Start update form-->
        <form action="" method="post" enctype="multipart/form-data">
            <table class='tbl-30 '>
            
                <tr>
                    <td>Tittle:</td>
                    <td>
                        <input type="text" name="tittle" id="" placeholder="<?php  echo $tittle;?>">
                    </td>
                </tr>
            
                <tr>
                    <td>Current image:</td>
                    <td>
                        <?php
                          if($current_image!="")
                          {
                              //display image
                              ?>
                              <img src="<?php echo SITEURL;?>images/category/<?php  echo $current_image;?>" width="150px">
                              <?php
                            
                          }
                          else
                          {
                              echo "<div class='error'>Image not added.</div>";
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="new_image" id="">
                    </td>
                </tr>
                
               
                <tr>
                    <td>Featured:</td>
                    <td>
                    Yes <input <?php if($featured=="Yes"){ echo "checked";}?> type="radio" name="featured" id="" value="Yes">
                    No <input <?php if($featured=="No"){ echo "checked";}?> type="radio" name="featured" id="" value="No">
                    </td>
                </tr>
                
                <tr>
                    <td>Active:</td>
                    <td>
                        Yes <input <?php if($active=="Yes"){ echo "checked";}?> type="radio" name="active" value="Yes" id="">
                        No <input <?php if($active=="No"){ echo "checked";}?> type="radio" name="active" value="No" id="">
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        </div> <!--End update form-->
    </div>

    <?php
         if(isset($_POST['submit']))
         {
            $id=$_POST['id'];

            $tittle=$_POST['tittle'];

            
            
            //get data from featured radio button
            if(isset($_POST['featured']))
            {
                //get data
                $featured=$_POST['featured'];
            }
            else
            {
                $featured="No";
            };
            //get data from actvie radio 
            if(isset($_POST['active']))
            {
                //get data
                $active=$_POST['active'];
            }
            else
            {
                $active="No";
            };
            //check imgae upload or not
            //print_r($_FILES['image']);
            if(isset($_FILES['new_image']['name']))
            {
                //upload image
                $image_name=$_FILES['new_image']['name'];
                if($image_name!="")
                {
                        // auto renaiming image
                    //need get the extension of our image lik jpg jpeg etc
                    $ext =end(explode('.',$image_name));
                    //rename image now
                    $image_name="Food-category".rand(000,999).'.'.$ext;
                    $source_path=$_FILES['new_image']['tmp_name'];
                    $destination_path="../images/category/".$image_name;
                    

                    //finally Upload the image 
                    $upload=move_uploaded_file($source_path,$destination_path);
                    //check wheter image upload or not
                    if($upload==false)
                    {
                        //set upload masage
                        $_SESSION['upload-image']="<div class='error text center'>Failed to upload image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }
                    if($current_image!="")
                    {
                        $remove_path="../images/category.".$current_image;
                        $remove= unlink($remove_path) ;
                        if($remove==false){
                            $_SESSION['removed-failed']="<div  class='error'> failed to remove images.</div>";
                            header('location:'.SITEURL.'admin/manage-category.php');
                            die();
                        }
                    }
                }
            }
            else{
                $image_name=$current_image;
            }

            //query for update category
            $sql="UPDATE tbl_category SET
            tittle=$tittle,
            image_name=$image_name,
            featured=$featured,
            active=$active
            ";
            //excute the query
            $res=mysqli_query($conn,$sql);

            if($res==true)
            {
                //update succes message
                $_SESSION['update-category']="<div class='succes text-center'>Update Category Succesfullly.</div>";
                //redircet
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                $_SESSION['update-category']="<div class='error text-center'>Failed to Upadte Category.</div>";
                //redircet
                header('location:'.SITEURL.'admin/manage-category.php');
            }
         }
         
    
    ?>




<?php include('partials/footer.php');?>