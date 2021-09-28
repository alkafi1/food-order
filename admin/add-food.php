<?php include('partials/menu.php');?>
   <div class="main-content">
       <div class="container">
           <h1>Add Food</h1>
           <br><br>
           
         
               <form action="" method="post" enctype="multipart/form-data">
               <table class=tbl_30>
                    <tr>
                        <td>Tittle:</td>
                        <td>
                            <input type="text" name="tittle" id="" placeholder="Tittle">
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <input type="text" name="description" id="" col="5" row="5" placeholder="Description Of Food">
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image:</td>
                        <td>
                            <input type="file" name="image_name" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category" id="">
                                <?php
                            //create sql for show caterory from category tbl
                                  $sql="SELECT * FROM tbl_category WHERE active='Yes' ";
                                  $res=mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
                                  $count=mysqli_num_rows($res);
                                  if($count>0)
                                  {
                                        while($rows=mysqli_fetch_assoc($res))
                                        {
                                            $id=$rows['id'];
                                            $tittle=$rows['tittle'];
                                            ?>
                                                <option value="<?php echo $id;?>"><?php echo $tittle;?></option>
                                            <?php
                                        }
                                  }
                                  else
                                  {
                                     ?>
                                     <option value="0">NO category Found.</option>
                                     <?php
                                  }
                                  
                                    ?>
</select>
                        </td>
                    </tr>
                    <tr>
                        <td>Featured:</td>
                        <td>
                        Yes <input type="radio" name="featured" id="" value="Yes">
                        No <input type="radio" name="featured" id="" value="No">
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            Yes <input type="radio" name="active" value="Yes" id="">
                            No <input type="radio" name="active" value="No" id="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                        </td>
                        
                    </tr>
                    
               </table>

               </form>
<?php
                //check whether submit button clicked is or not
                if(isset($_POST['submit']))
                {
                    //add the food data base
                    //echo" submit clicked";
                    //1. Get the data from form
                    $tittle=$_POST['tittle'];
                    $description=$_POST['description'];
                    $price=$_POST['price'];
                    $category=$_POST['category'];
                    if(isset($_POST['featured']))
                    {
                        $featured=$_POST['featured'];

                    }
                    else
                    {
                        $featured="No";
                    }
                    
                    if(isset($_POST['active']))
                    {
                        $active=$_POST['active'];
                    }
                    else
                    {
                        $active="No";
                    }


                    //2.upload the image
                    //check image is celect or not
                    if(isset($_FILES['image_name']['name']))
                    {
                        //  
                        $image_name=$_FILES['image_name']['name'];
                        if($image_name!="")
                        {
                            //renaiming the image nam,e
                            $ext=end(explode('.',$image_name));
                             $image_name="Food_name_".rand(000,999).'.'.$ext; 

                            //source
                            $src=$_FILES['image_name']['tmp_name'];
                            $dst="../images/food-images/".$image_name; 
                            $upload= move_uploaded_file($src,$dst);
                            if($upload==false)
                            {
                                $_SESSION['food-img-fail']="<div class='error'>Failed to Upload image</div>";
                                header('location:'.SITEURL.'admin/add-food.php');
                                die();
                            }
                        }
                        

                    }
                    else
                    {
                        $image_name="";
                    }

                    //3.sql insert to into database
                    $sql2="INSERT INTO tbl_food (tittle,description,price,image_name,category_id,featured,active) VALUES(
                        '$tittle',
                        '$description',
                        '$price',
                        '$image_name',
                        '$category',
                        '$featured',
                        '$active')";
                    $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                    //excute the query
                    if($res2==true)
                    {
                        
                        $_SESSION['add-food']="<div class='succes text-center'> Add Food Succesfully.</div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                    }
                    else
                    {
                        $_SESSION['add-food']="<div class='error text-center'> Add Food Failed.</div>";
                        header("location:".SITEURL.'admin/add-food.php');
                    }
                   //4. Redirect manage food page
                } 
?> 
       </div>
   </div>
<?php include('partials/footer.php');?>