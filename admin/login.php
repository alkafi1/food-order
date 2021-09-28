<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login</title>
</head>
<body>
<?php include('../config/constant.php');?>  

        <div class='login'>
                <div>
                    <h1 class='text-center'>Admin LogIn</h1>

                    
                    <br>
                    
                    <?php
                       if(isset($_SESSION['login']))
                       {
                           echo $_SESSION['login'];
                           unset($_SESSION['login']);
                       }
                       if(isset($_SESSION['no-login-message']))
                       {
                          echo $_SESSION['no-login-message'];
                          unset($_SESSION['no-login-message']);
                       }
                    ?>
                    <br>
                   
                    
                    

                    <!-- Start login form -->
                            <form action="" method="post" class='text-center'>
                                Username 
                                <br><input type="text" name="username" id="" placeholder="Enter Username"> <br>
                                <br> Password
                                <br><input type="text" name="password" id="" placeholder="Enter Password">
                                <br>
                                <br>
                                <input type="submit" name="submit" value="Login" class='btn-primary'>
                            </form>
                    <!-- Start login form -->
                    <br><p class='text-center'>Food House Resturand@</p>
                </div>   
            </div>
            <?php include('partials/footer.php');?>
</body>
</html>

<?php
       
    if(isset($_POST['submit']))
    {
        //1.Get data from login form
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //2. sql query for check username and password in tbl_admin
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        //3. Excute the query
        $res=mysqli_query($conn,$sql);
         
        //count the rows
        $count=mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login']="<div class='succes text-center'>Login Succesfully</div>";
            $_SESSION['user']=$username;// user login or not and logout unseet
            //redirect home page
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user not available
            $_SESSION['login']="<div class='error text-center'>Login Failed</div>";
            //redirect home page
            header('location:'.SITEURL.'admin/login.php');
        }

    }

?>
    
    

