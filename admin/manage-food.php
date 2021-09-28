<?php include('partials/menu.php'); ?>

 <div class="main-content">
     <div class="container">
     <h1>Manage Food</h1>
     <br>
     <br>
     <a href="add-food.php" class="btn-primary">Add Food</a>
     <br><br>
     <br>
     <?php
     if(isset($_SESSION['food-img-fail']))
     {
         echo $_SESSION['food-img-fail'];
         unset($_SESSION['food-img-fail']);
     }
      if(isset($_SESSION['add-food']))
      {
          echo $_SESSION['add-food'];
          unset($_SESSION['add-food']);
      }
      if(isset($_SESSION['remove-food-image']))
      {
          echo $_SESSION['remove-food-image'];
          unset($_SESSION['remove-food-image']);
      }
      if(isset($_SESSION['succes-delete-food']))
      {
          echo $_SESSION['succes-delete-food'];
          unset($_SESSION['succes-delete-food']);
      }
      if(isset( $_SESSION['upload']))
     {
         echo  $_SESSION['upload'];
         unset( $_SESSION['upload']);
     }
     if(isset($_SESSION['removed-failed']))
     {
         echo $_SESSION['removed-failed'];
         unset($_SESSION['removed-failed']);
     }
     if(isset($_SESSION['food-update']))
     {
         echo $_SESSION['food-update'];
         unset($_SESSION['food-update']);
     }
     ?>
     <br>
     <table class="table-full">
         <tr>
             <th>S.N</th>
             <th>Tittle</th>
             <th>Price</th>
             <th>Image</th>
             <th>Featured</th>
             <th>Active</th>
             <th>Action</th>
         </tr>
         <?php
         $sn=1;
         $sql="SELECT * FROM tbl_food";
         $res=mysqli_query($conn,$sql);
         $count=mysqli_num_rows($res);
         if($count>0)
         {
             while($rows=mysqli_fetch_assoc($res))
             {   
                $id=$rows['id'];
                $tittle=$rows['tittle'];
                $price=$rows['price'];
                $image_name=$rows['image_name'];
                $featured=$rows['featured'];
                $active=$rows['active'];
                ?>
                
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $tittle ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image Not added.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL;?>images/food-images/<?php echo $image_name?>" width="100px">
                                <?php
                            }
                        ?>
                    </td>
                    <td><?php echo $featured ?></td>
                    <td><?php echo $active ?></td>
                    <td>
                        <a href="<?php SITEURL;?>update-food.php? id=<?php echo $id?>" class="btn-secondary">Update Food</a>
                        
                        <a href="<?php SITEURL;?>delete-food.php? id=<?php echo $id;?>& image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
                    </td>
                </tr>
                
                <?php
             }
         }
         else
         {
             echo "<tr><td colspan='7' class='error'>Food Not Added Yet. </td></tr>";
         }
         ?>
     </table>
     </div>
 </div>

<?php include('partials/footer.php'); ?>