<?php include('partials/menu.php'); ?>

 <div class="main-content">
     <div class="container">
       <h1>Manage Order</h1>
       <br><br>

       <?php
         if(isset($_SESSION['update-order']))
         {
             echo $_SESSION['update-order'];
             unset($_SESSION['update-order']);
         }
       ?>
       <br><br>
       <table class="tbl_full">
           <tr>
                <th>S>N</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
           </tr>
           <?php
           $sn=1;
               //get all the order from database
               $sql="SELECT * FROM tbl_order ORDER BY id DESC";
               $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
               $count=mysqli_num_rows($res);
               if($count>0)
               {
                   //get order
                   while($rows=mysqli_fetch_assoc($res))
                   {
                       $id=$rows['id'];
                       $food=$rows['food'];
                       $price=$rows['price'];
                       $qty=$rows['qty'];
                       $total=$rows['total'];
                       $order_date=$rows['order_date'];
                       $status=$rows['status'];
                       $customer_name=$rows['customer_name'];
                       $customer_contact=$rows['customer_contact'];
                       $customer_email=$rows['customer_email'];
                       $customer_address=$rows['customer_address'];
                       ?>
                            <tr>
                                    <td><?php echo $sn++;?></td>
                                    
                                    <td><?php echo $food;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $order_date;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $customer_contact;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $customer_address;?></td>
                                    <td><a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-primary">Update Order</a></td>
                            </tr>
                       <?php
                   }
               }
               else
               {
                   //getn not order
                   echo "<div class='error text-center'>Order Not Available.</div>";
               }
           ?>
       </table>
     </div>
 </div>

<?php include('partials/footer.php'); ?>