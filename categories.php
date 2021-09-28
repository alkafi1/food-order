
<?php include('partials-front/menu.php')?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
              //get the category from table
              $sql="SELECT * FROM tbl_category WHERE active='Yes'";
              $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
              $count=mysqli_num_rows($res);
              if($count>0)
              {
                  while($rows=mysqli_fetch_assoc($res))
                  {
                      //get the values
                      $id=$rows['id'];
                      $tittle=$rows['tittle'];
                      $image_name=$rows['image_name'];
                      ?>
                        <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                if($image_name=='')
                                {
                                    //image not availabe
                                    echo "<div>Image Not Found</div>";
                                }
                                else
                                {
                                    //image availabe
                                    ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $tittle;?></h3>
                            </div>
                        </a>
                      <?php
                  }
              }
              else
              {
                  //category not available
                  echo "<div class='error'>Category Not Found</div>";
              }
            ?>

            

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php')?>