<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="container">
        <h1>Add Category</h1>

        <br><br>
        <?php 
      if(isset($_SESSION['add-category']))
      {
          echo $_SESSION['add-category'];
          unset($_SESSION['add-category']);
      }
      if(isset($_SESSION['upload-image']))
      {
          echo $_SESSION['upload-image'];
          unset($_SESSION['upload-image']);
      }
     
     ?>
        <!-- add category form start-->
        <form action="" method="post" enctype="multipart/form-data">
            <table class='tbl-30 '>
                <tr>
                    <td>Tittle:</td>
                    <td>
                        <input type="text" name="tittle" id="" placeholder="Category Tittle">
                    </td>
                </tr>
                <tr>
                    <td>Choose image:</td>
                    <td><input type="file" name="image_name" id=""></td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                    Yes <input type="radio" name="featured" id="" value="Yes">
                    No <input type="radio" name="featured" id="" value="No">
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        Yes <input type="radio" name="active" value="Yes" id="">
                        No <input type="radio" name="active" value="No" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>

        




        <!-- add category form End-->
    </div>
</div>

<?php
  
        if(isset($_POST['submit']))
        {
            //echo "Clicked";
            //.1get data form cateroy form
            $tittle=$_POST['tittle'];

            
            
            //get data from featured radio button
            if(isset($_POST['featured']))
            {
                //get data
                $featured=$_POST['featured'];
            }
            else
            {
                $featured="No";
            };
            //get data from actvie radio 
            if(isset($_POST['active']))
            {
                //get data
                $active=$_POST['active'];
            }
            else
            {
                $active="No";
            };
            //check imgae upload or not
            //print_r($_FILES['image']);
            if(isset($_FILES['image_name']['name']))
            {
                $image_name=$_FILES['image_name']['name'];
                if($image_name != "")
                {
                    
                    // auto renaiming image
                    //need get the extension of our image lik jpg jpeg etc
                    $ext =end(explode('.',$image_name));
                    //rename image now
                    $image_name="Food_category_".rand(000,999).'.'.$ext;
                    $source_path=$_FILES['image_name']['tmp_name'];
                    $destination_path="../images/category/".$image_name;

                    //finally Upload the image 
                    $upload=move_uploaded_file($source_path,$destination_path);
                    //check wheter image upload or not
                    if($upload==false)
                    {
                        //set upload masage
                        $_SESSION['upload-image']="<div class='error text center'>Failed to upload image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }
                }
            }
            else
            {
                $image_name="";
            }
            
        

            //2. sql query code
            $sql= "INSERT INTO tbl_category SET
                    tittle='$tittle',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    ";
            

            //excute the query 
            $res=mysqli_query($conn, $sql);

            //check the query wheather work or not
            if($res==true)
            {
                    //query Excute and add category
                    $_SESSION['add-category']="<div class='succes text-center'> Succes to add category</div>";
                    //redirect to add category p[age]
                    header('location:'.SITEURL.'admin/manage-category.php');

            }
            else
            {
                //query not working
                $_SESSION['add-category']="<div class='error text-center'> Failed to add category</div>";
                //redirect to add category p[age]
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            
        }
        
        
        
        ?>


<?php include('partials/footer.php')?>