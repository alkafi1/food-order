<?php include('partials-front/menu.php')?>
    <?php
        if(isset($_GET['food_id']))
        {
            //get all the valuew from data
            $food_id=$_GET['food_id'];
            //get the details
            $sql="SELECT * FROM tbl_food WHERE id=$food_id";
            $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $count=mysqli_num_rows($res);
            //check whether data is available or not
            if($count==1)
            {
                //data avilable
                //get the value
                $rows=mysqli_fetch_assoc($res);
                $tittle=$rows['tittle'];
                $price=$rows['price'];
                $image_name=$rows['image_name'];
            }
            else
            {
                //data not available
                //redirect to home page
                header('location:'.SITEURL);
            }

        }
        else
        {
            //redirect home page
            header('location:'.SITEURL);
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                            if($image_name=="")
                            {
                                //image not avail;able
                                echo "<div>Image Not available.</div>";
                            }
                            else
                            {
                                //image vailable
                                ?>
                                    <img src="<?php echo SITEURL;?>images/food-images/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php

                            }
                        ?>
                        
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $tittle;?></h3>
                        <input type="hidden" name="food" value="<?php echo $tittle;?>">
                        <p class="food-price"><?php echo $price?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="text" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    //get all value from the form
                    $food=$_POST['food'];
                    $price=$_POST['price'];
                    $qty=$_POST['qty'];
                    $total= $price * $qty;
                    $order_date= date("Y-m-d h:i:sa");
                    $status='orderd';
                    $customer_name=$_POST['full-name'];
                    $customer_contact=$_POST['contact'];
                    $customer_email=$_POST['email'];
                    $customer_address=$_POST['address'];

                    //the valuenow insert into tbl_order
                    $sql2="INSERT INTO tbl_order (food,price,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address)
                    VALUE(
                        '$food',
                        '$price',
                        '$qty',
                        '$total',
                        '$order_date',
                        '$status',
                        '$customer_name',
                        '$customer_contact',
                        '$customer_email',
                        '$customer_address'
                        )";
                    
                    $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                    //echo $res2;
                    if($res2==true)
                    {
                        //query added
                        $_SESSION['order']="<div class='succes text-center'>Food order Succesfully Placed.</div>";
                        header('location:'.SITEURL);

                    }
                    else
                    {
                        $_SESSION['order']="<div class='error text-center'>Food order Failed to Placed.</div>";
                        header('location:'.SITEURL);
                    }


                }
            ?>



        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php')?>