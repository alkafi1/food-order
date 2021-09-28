<?php include('partials/menu.php')?>

<!--getting all data from tbl-food-->
<?php 
 if(isset($_GET['id']))
 {
     
    
    $id= $_GET['id'];
     //echo $id;
                $sql= "SELECT * FROM tbl_food WHERE id = $id ";
                //echo $sql;
                 $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                 //print_r ($res);
            
                $rows=mysqli_fetch_assoc($res);
                //get the individual data\
                $tittle=$rows['tittle'];
                $description=$rows['description'];
                $price=$rows['price'];
                $old_image=$rows['image_name'];
                //echo $old_image;
                $current_category=$rows['category_id'];
                $featured=$rows['featured'];
                //echo $featured;
                $active=$rows['active'];
 }
 else
     {
         //redirect
         header('location:'.SITEURL.'admin/manage-food.php');
     }

?>



<div class="main-content">
    <div class="container">
        <h1>Update Food</h1>
        <br>
        <br>
        

        <form action="" method="post" enctype="multipart/form-data">
            <table class='tbl_30'>
                <tr>
                    <td>Tittle:</td>
                    <td>
                        <input type="text" name="tittle" id="" value="<?php echo $tittle;?>">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <input type="text" name="description" id="" col="10" row="5"value="<?php echo $description;?>">
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" id="" value="<?php echo $price;?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php 
                         if($old_image=="")
                         {
                                echo "<div class='error'> Image not vailable.</div>";
                         }
                         else
                         {
                            ?>
                            <img src="<?php echo SITEURL;?>images/food-images/<?php echo $old_image;?>" width="100px" alt="<?php echo $tittle?>">
                            <?php

                         }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="new_image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" >
                            <?php
                              $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                              $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                              $count=mysqli_num_rows($res);
                              
                                  if($count>0)
                                  {
                                      while($rows=mysqli_fetch_assoc($res))
                                      {
                                          $tittle=$rows['tittle'];
                                          $category_id=$rows['id'];
                                          ?>
                                          <option <?php if($current_category==$category_id){ echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $tittle;?></option>
                                          <?php
                                          
                                      }
                                  }
                                  else
                                  {
                                      echo "NO category";
                                  }

                              
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes"){ echo "checked";}?> type="radio" name="featured" id="" value="Yes"> Yes
                        <input <?php if($featured=="No"){ echo "checked";}?> type="radio" name="featured" id="" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes"){ echo "checked";}?> type="radio" name="active" id="" value="Yes"> Yes
                        <input <?php if($active=="No"){ echo "checked";}?> type="radio" name="active" id="" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="old_image" value="<?php echo $old_image;?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-primary">
                    </td>
                </tr>
            </table>
    
        </form>

        <?php
        if(isset($_POST['submit']))
        {
            //echo "Button clicked";
            //1.geet all the data from form
            $id=$_POST['id'];
            $tittle=$_POST['tittle'];
           
            $description=$_POST['description'];
            $price=$_POST['price'];
            $old_image=$_POST['image_name'];
            $category= $_POST['category'];

            $featured=$_POST['featured'];
            $active=$_POST['active'];

            //check upload button 
            if(isset($_FILES['new_image']['name']))
            {
                $image_name=$_FILES['new_image']['name'];
               //echo $image_name;
                //check this image available or not
                if($image_name!="")
                {
                    
                    $ext=end(explode('.',$image_name));
                    $image_name="Food_name_".rand(000,999).'.'.$ext;
                    $src=$_FILES['new_image']['tmp_name'];
                    
                    $dst="../images/food-images/".$image_name;
                    $upload= move_uploaded_file($src,$dst);
                    if($upload==false)
                    {
                        $_SESSION['upload']="<div class='error text-center'>Failed to upload new image.</div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                        die();
                    }
                    if($old_image!="")
                    {
                        $remove_path="../images/food-images/".$old_image; 
                        $remove= unlink($remove_path) ;
                        if($remove==false){
                            $_SESSION['removed-failed']="<div  class='error'> failed to remove images.</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_name=$old_image;
                }

            }
            else
            {
                $image_name=$old_image;
            }
            //upload to food in data base
            $sql3="UPDATE tbl_food SET
            tittle='$tittle',
            description='$description',
            price=$price,
            image_name='$image_name',
            category_id=$category_id,
            featured='$featured',
            active='$active'
            WHERE id=$id
            ";
            $res3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            if($res3==true)
            {
                //query excecuted to food upload
                $_SESSION['food-update']="<div class='succes text-center'> Succesfully Update food Details.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
            else
            {
                //failed 
                $_SESSION['food-update']="<div class='error text-center'> Failed Update food Details.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            };
           

        }
        ?>
    </div>
</div>
<?php include('partials/footer.php')?>