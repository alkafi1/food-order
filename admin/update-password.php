<?php include('partials/menu.php'); ?>
      <div class="container">
          <h1>Change Password</h1>
          <br><br>
            
            <?php
               if(isset($_GET['id'])){
                   $id=$_GET['id'];
               }
            ?>

          <form action="" method="post">
                <table class='tbl-30'>
                    <tr>
                        <td>
                            Current Password:
                        </td>
                        <td>
                            <input type="text" name="current_password" id="" placeholder="Current Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            New Passsword:
                        </td>
                        <td>
                            <input type="text" name="new_password" id=""placeholder="New Password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Confirm Password:
                        </td>
                        <td>
                            <input type="text" name="confirm_password" id="" placeholder="Confirm Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="submit" value="Change Password" name="submit" class='btn-primary'> 
                        </td>
                    </tr>
                    

                </table>

          </form>
      </div>
     <?php
        if(isset($_POST['submit'])){
            //echo "clicked"; 

            //1. Get the Data from form
            $id=$_POST['id'];
            $currentpassword=md5($_POST['current_password']);
            $newpassword=md5($_POST['new_password']);
            $confirmpassword=md5($_POST['confirm_password']);

            //2.check password in database
            $sql= " SELECT * FROM tbl_admin WHERE id=$id AND password ='$currentpassword'";

            //excute the query

            $res=mysqli_query($conn,$sql);

            if($res==true)
            {
                $count=mysqli_num_rows($res);

                if($count==1){
                    //user exist and password can be change
                    //echo "user can be found";
                    //redirect manage page
                    if($newpassword==$confirmpassword)
                    {
                        //update password
                        $sql2="UPDATE tbl_admin SET
                        password='$newpassword'
                        WHERE id=$id";

                        $res2=mysqli_query($conn,$sql2);

                        if($res2==true){
                            //display change massage
                            $_SESSION['password-not-change']="<div class='succes'>Password  Changed</div>";
                            //redirect manage page
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                        else{
                            //display not change massage
                            $_SESSION['password-not-change']="<div class='error'>Password Not Change</div>";
                            //redirect manage page
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else{
                        $_SESSION['password-not-match']="<div class='error'>Password Not Match</div>";
                    //redirect manage page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    
                }
                else
                {
                    //user not found
                    $_SESSION['user-not-found']="<div class='error'>User Not Found</div>";
                    //redirect manage page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            
        }
     
     ?>




<?php include('partials/footer.php'); ?>