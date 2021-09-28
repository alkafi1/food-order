<?php include('partials/menu.php'); ?>
        <div class="container">
            <div>
                <h1>Update Admin </h1>
                <br>
                <br>
                <?php
                     $id=$_GET['id'];//Get Id from Selected admin

                     $sql= "SELECT * FROM tbl_admin WHERE id=$id"; //create sql query

                     $res=mysqli_query($conn,$sql);//excute the query
                     //check query excute or not
                     if($res==true)
                     {
                         $count=mysqli_num_rows($res);
                         if($count==1)
                         {
                            //echo "<div class='succes'>Admin available</div> ";
                            $row=mysqli_fetch_assoc($res);

                            $full_name=$row['full_name'];
                            $username=$row['username'];
                         }else
                         {
                             //redirect admin manage page
                             header('location'.SITEURL.'admin/manage-admin.php');
    
                         }
                    }
                     
                ?>
                <br><br>
                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name:</td>
                            <td>
                                <input type="text" class="text" name="full_name" value="<?php echo $full_name?>">
                            </td>
                        </tr>
                        <tr>
                            <td>User Name:</td>
                            <td>
                                <input type="text" class="text" name="username"value="<?php echo $username?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id?>">
                                <input type="submit" name="submit" value="Update" class="btn-secondary">
                            </td>
                        </tr>
                    </table>

                </form>

                
            </div>
        </div>

        <?php
           if(isset($_POST['submit']))
           {
              //echo "update admin";
              //get all the value from update form
              $id=$_POST['id'];
              $full_name=$_POST['full_name'];
              $username=$_POST['username'];

              //sql query for upadte 
              $sql="UPDATE  tbl_admin SET
               full_name='$full_name',
               username='$username'
               WHERE id='$id'
              ";
              //excute the quer
              $res=mysqli_query($conn,$sql);

              //check whether query work or not

              if($res==true)
              {
                  //query updated
                  $_SESSION['update']="<div class='succes'> Admin Information Update</div>";//massege for display
                  header('location:'.SITEURL.'admin/manage-admin.php');
              }
              else
              {
                  //failed to update
                  $_SESSION['update']="Failed to Update Admin Information";
                  header('location:'.SITEURL.'admin/manage-admin.php');
              }
           }
        
        ?>


<?php include('partials/footer.php')?>