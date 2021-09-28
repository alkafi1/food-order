<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="container">
        <h1>Update Order</h1>
        <br> <br>

        <?php
          if(isset($_GET['id']))
          {
              //get the value
              //get value by sql
              $id=$_GET['id'];
              $sql="SELECT * FROM tbl_order WHERE id=$id";
              $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
              $count=mysqli_num_rows($res);
              if($count==1)
              {
                $rows=mysqli_fetch_assoc($res);
                $id=$rows['id'];
                $food=$rows['food'];
                $price=$rows['price'];
                $qty=$rows['qty'];
                $status=$rows['status'];
                $customer_name=$rows['customer_name'];
                $customer_email=$rows['customer_email'];
                $customer_contact=$rows['customer_contact'];
                $customer_address=$rows['customer_address'];
              }
              else
              {
                  //redirect manage order page
                  header('location:'.SITEURL.'admin/manage-order.php');
              }
          }
          else
          {
              //redirect manage order page
              header('location:'.SITEURL.'admin/manage-order.php');
          }
        ?>
        <form action="" method="post">
            <table class="tbl_30">
                <tr>
                    <td>Food Name:</td>
                    <td><?php echo $food;?></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" id="" value="<?php echo $price;?>">
                    </td>
                </tr>
                <tr>
                    <td>Quantity:</td>
                    <td>
                        <input type="number" name="qty" id="" value="<?php echo $qty;?>">
                    </td>
                </tr>
                <tr>
                    <td>Orderd:</td>
                    <td>
                    <select name="status">
                        <option <?php if($status=="ordered"){echo "selected";}?> value="ordered">Orderd</option>
                        <option <?php if($status=="on delivery"){echo "selected";}?> value="on delivery">On Delivery</option>
                        <option <?php if($status=="delivered"){echo "selected";}?> value="delivered">Delivered</option>
                        <option <?php if($status=="cancelled"){echo "selected";}?> value="cancelled">Cancelled</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                    <td>
                        <input type="text" name="customer_name" id="" value="<?php echo $customer_name;?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Contact:</td>
                    <td>
                        <input type="tel" name="customer_contact" id="" value="<?php echo $customer_contact;?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Email:</td>
                    <td>
                        <input type="email" name="customer_email" id="" value="<?php echo $customer_email;?>">
                    </td>
                </tr>
                <tr>
                    <td>Customer Address:</td>
                    <td>
                        <input type="text" name="customer_address" id="" value="<?php echo $customer_address;?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id"value="<?php echo $id;?>">
                        <input type="submit" value="Update Oreder" name="submit" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
          if(isset($_POST['submit']))
          {
              //update data in databse
              $id=$_POST['id'];
              $price=$_POST['price'];
              $status=$_POST['status'];
              $customer_name=$_POST['customer_name'];
              $customer_contact=$_POST['customer_contact'];
              $customer_email=$_POST['customer_email'];
              $customer_address=$_POST['customer_address'];

              //query for update database
              $sql2="UPDATE  tbl_order SET
              id='$id',
              price='$price',
              qty='$qty',
              status='$status',
              customer_name='$customer_name',
              customer_contact='$customer_contact',
              customer_email='$customer_email',
              customer_address='$customer_address'
              WHERE id=$id
              ";
              $res2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
              if($res2==true)
              {
                  //success
                  $_SESSION['update-order']="<div class='succes text-center'>Update oreder Succesfully DONE.</div>";
                 //redirect update page
                 header('location:'.SITEURL.'admin/manage-order.php');
              }
              else
              {
                  //failed
                  $_SESSION['update-order']="<div class='error text-center'>Update oreder Failed.</div>";
                 //redirect update page
                 header('location:'.SITEURL.'admin/manage-order.php');
            }
          }
        ?>
    </div>
</div>

<?php include('partials/footer.php')?>