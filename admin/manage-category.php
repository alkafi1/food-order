<?php include('partials/menu.php'); ?>

 <div class="container">
     <h1>Manage Category</h1>
     <br>
     <br>
     <a href="<?php echo SITEURL;   ?>admin/add-category.php" class="btn-primary">Add Categories</a>
     <br>
     <br>
     <?php 
      if(isset($_SESSION['add-category']))
      {
          echo $_SESSION['add-category'];
          unset($_SESSION['add-category']);
      }
      if(isset($_SESSION['delete-category']))
      {
          echo $_SESSION['delete-category'];
          unset($_SESSION['delete-category']);
      }
      if(isset($_SESSION['remove']))
      {
          echo $_SESSION['remove'];
          unset($_SESSION['remove']);
      }
      if(isset($_SESSION['no-category-found']))
      {
          echo $_SESSION['no-category-found'];
          unset($_SESSION['no-category-found']);
      }
     
     
     ?>
     <br>
     <table class="table-full">
         <tr>
             <th>S.N</th>
             <th>Tittle</th>
             <th>Image</th>
             <th>Fetured</th>
             <th>Active</th>
             <th>Action</th>
         </tr>
         
        <?php
         //query for display data from daatabase
         $sql= "SELECT * FROM tbl_category";

         //excute query
         $res= mysqli_query($conn, $sql);

         //check query is work or not
         if($res==true){

            $sn=1;
             $count=mysqli_num_rows($res);
             if($count>0)
             {
                 while($rows=mysqli_fetch_assoc($res))
                 {
                    $id=$rows['id'];
                    $tittle=$rows['tittle'];
                    $image_name=$rows['image_name'];
                    $featured=$rows['featured'];
                    $active=$rows['active'];

                    ?>
                    <tr>
                        <td><?php echo $sn++?></td>
                        <td><?php echo $tittle?></td>
                        <td><?php 
                            //check image name is or null
                            if($image_name!="")
                            {
                                //diplay image
                                ?>
                                
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px">
                                <?php
                            }
                            else{
                                echo "<div class='error text-center'>Image not Added.</div>";
                            }
                            ?>
                        </td>
                        <td><?php echo $featured?></td>
                        <td><?php echo $active?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/update-category.php? id=<?php echo $id;?>&image_name= <?php echo $image_name;?>" class="btn-secondary">Update Categories</a>
                            <a href="<?php echo SITEURL;?>admin/delete-category.php? id=<?php echo $id;?>&image_name= <?php echo $image_name;?>" class="btn-danger">Delete Categories </a>
                            </td>
                    </tr>
                    <?php
                 }
             }
             else
             {
                 ?>
                 <tr>
                 <td colspan="6"><div class='error '>"No CAtegory"</div></td>
                 </tr>
                 <?php
             }
         }
        
        ?>
        

     </table>

     
 </div>

<?php include('partials/footer.php'); ?>