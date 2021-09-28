<?php include('partials-front/menu.php')?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                //here we get search keyword 
                $search=$_POST['search'];
            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
                
                //get data by saerch value

                $sql="SELECT * FROM tbl_food WHERE tittle LIKE '%$search%' or description LIKE '%$search%'" ;
                $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    //data avaoilable
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //get the details
                        $id=$rows['id'];
                        $tittle=$rows['tittle'];
                        $description=$rows['description'];
                        $price=$rows['price'];
                        $image_name=$rows['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                    if($image_name=="")
                                    {
                                        //image not availabe
                                        echo "<div>Image Not Available.</div>";
                                    }
                                    else
                                    {
                                        //image availabe
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
                    echo "<div>Food Is Not Available.</div>";
                }

            ?>
            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php')?>