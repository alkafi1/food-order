<?php include('partials-front/menu.php')?>

<?php
  if(isset($_GET['category_id']))
  {
      $category_id=$_GET['category_id'];
      //get category tittle based on category id
      $sql="SELECT tittle FROM tbl_category WHERE id=$category_id";
      $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
      //get the value from database
      $rows=mysqli_fetch_assoc($res);
      $catgory_tittle= $rows['tittle'];

  }
  else
  {
      //redirect homepage
      header('location:'.SITEURL);
  }

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="<?php echo SITEURL;?>food-search.php" class="text-white">"<?php echo $catgory_tittle;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
             $sql2="SELECT * FROM tbl_food WHERE category_id='$category_id'";
             $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
             $count=mysqli_num_rows($res2);
             if($count>0)
             {
                 //food available
                 while($rows2=mysqli_fetch_assoc($res2))
                 {
                     //get the data
                     $id=$rows2['id'];
                     $tittle=$rows2['tittle'];
                     $price=$rows2['price'];
                     $description=$rows2['description'];
                     $image_name=$rows2['image_name'];
                     ?>
                     <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                 if($image_name=="")
                                 {
                                     //imag not available
                                     echo "<div>Image not available.</div>";
                                 }
                                 else
                                 {
                                     ?>
                                        <img src="<?php echo SITEURL;?>images/food-images/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                     <?php
                                 }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $tittle;?></h4>
                                <p class="food-price"><?php echo $price;?></p>
                                <p class="food-detail">
                                        <?php echo $description;?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                    </div>
                     <?php

                 }

             }
             else
             {
                 //food is not avilable
                 echo "<div>Food Not Available.</div>";
             }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php')?>