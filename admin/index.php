<?php include('partials/menu.php'); ?>

    <!-- Main section Start-->
      <div class="container">
          <h1><strong>DashBoard</strong></h1>
          <?php
                       if(isset($_SESSION['login']))
                       {
                           echo $_SESSION['login'];
                           unset($_SESSION['login']);
                       }
                    ?>
                    <br><br>
                    <div class="col-4 text-center">
                        <?php
                         $sql="SELECT * FROM tbl_category ";
                         $res=mysqli_query($conn,$sql);
                         $count=mysqli_num_rows($res);
                        ?>
                        <h1><?php echo $count;?></h1>
                        <br>
                        Categories
                    </div>
                    <br>
                    <div class="col-4 text-center">
                    <?php
                         $sql2="SELECT * FROM tbl_food ";
                         $res2=mysqli_query($conn,$sql2);
                         $count=mysqli_num_rows($res2);
                        ?>
                        <h1><?php echo $count;?></h1>
                        <br>
                        Food
                    </div>
                    <br>
                    <div class="col-4 text-center">
                    <?php
                         $sql3="SELECT * FROM tbl_order ";
                         $res3=mysqli_query($conn,$sql3);
                         $count=mysqli_num_rows($res3);
                        ?>
                        <h1><?php echo $count?></h1>
                        <br>
                        Toral Order
                    </div>
                    <br>
                    <div class="col-4 text-center">
                    <?php
                         $sql4="SELECT SUM(Total) AS Total FROM tbl_order WHERE status='delivered' ";
                         $res4=mysqli_query($conn,$sql4);
                         //$count=mysqli_num_rows($res4);
                         $rows=mysqli_fetch_assoc($res4);
                         //get total revenue
                         $total_revenue=$rows['Total'];
                        ?>
                        <h1><?php echo $total_revenue;?></h1>
                        <br>
                        Revenue
                    </div>

                    <div class="clearfix"></div>
      </div>
    <!-- Main section End-->

<?php include('partials/footer.php');  ?>


</body>
</html>