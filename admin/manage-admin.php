<?php include('partials/menu.php'); ?>

 <div class="container">
     <h1>Manage Admin</h1>
     <br>
     <?php
        if(isset($_SESSION['add']))
        {
            echo  $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset ($_SESSION['delete']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
        }
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset ($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['password-not-match']))
        {
            echo $_SESSION['password-not-match'];
            unset ($_SESSION['password-not-match']);
        }
        if(isset($_SESSION['password-not-change']))
        {
            echo $_SESSION['password-not-change'];
            unset ($_SESSION['password-not-change']);
        }
     ?>

     <br><br><br>
     <a href="add-admin.php" class="btn-primary">Add Admin</a>
     <br><br>
     <table class="table-full">
         <tr>
             <th>S.N</th>
             <th>Full Name</th>
             <th>User Name</th>
             <th>Action</th>
         </tr>

         <?php
            $sql= "SELECT * FROM tbl_admin"; //queary for gett all data
            $res=mysqli_query($conn,$sql);//excute the query

            //check condition
            if($res==TRUE){
                $count=mysqli_num_rows($res);//count row in database tbl
                if($count>0){
                    while($rows=mysqli_fetch_assoc($res)){
                        //Get Induvidual Data
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];

                        //displaing the value in our table
                        ?>
                         <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $full_name?></td>
                            <td><?php echo $username?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-password.php? id=<?php echo $id;?>" class="btn-primary">Change Password</a> 
                                <a href="<?php echo SITEURL;?>admin/update-admin.php? id=<?php echo $id;?>" class="btn-secondary">Update Admin</a> 
                                <a  href="<?php echo SITEURL;?>admin/delete-admin.php? id=<?php echo $id;?>" class="btn-danger">Delete Admin </a></td>
                         </tr>

                        <?php
                    }
                }
            }

         ?>
     </table>
 </div>

<?php include('partials/footer.php'); ?>