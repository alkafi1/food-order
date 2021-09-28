<?php include('partials/menu.php'); ?>

  <div class="container">
      <div class="main-content">
          <h1>Add Admin</h1>
          <br>
          <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
          ?>

          <form action="" method="POST" >
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder=" Enter Your Full Name"></td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="user_name" placeholder=" Enter Your UserName"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2" ><input type="submit" name="submit" value="Add Admin"class="btn-primary"></td>
                </tr>
            </table>


          </form>
      </div>
  </div>



<?php include('partials/footer.php')?>


<?php

            if(isset($_POST['submit']))
            {
                //Button Clicked
                //echo"Button Is Clicked";
                //1.Get data from form
                $full_name= $_POST['full_name'];
                $username= $_POST['user_name'];
                $password= md5($_POST['password']);  // password encrypted with md5

                //2. SQl Query to save data in database

                $sql= "INSERT INTO tbl_admin SET
                  full_name= '$full_name',
                  username='$username',
                  password='$password'
                ";

                
                //3.Excute Queary And save data in data base
                $res=mysqli_query($conn, $sql) or die(mysqli_error());

                //4.Check Insert data in table or npot excuted and display will be massaged

                if($res==True)
                {
                    //Data Inserted
                    //echo "Data Inserted
                    $_SESSION['add']="<div class='succes'>Admin added Succesfully.</div>";
                    //redirect page 
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
                else
                {
                    $_SESSION['add']="<div class='error'>Failed to add admin</div>";
                    //redirect page 
                    header("location:".SITEURL.'admin/add-admin.php');
                }


            }

            

?>