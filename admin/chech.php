<?php if(!empty($first)){?>
<tr>
<td width="82" valign="top"><div align="left">FirstName:</div></td>
<td width="165" valign="top"><?php echo $first ?></td>
 </tr>
<?php } if(!empty($last)){?>
 <tr>
<td valign="top"><div align="left">LastName:</div></td>
<td valign="top"><?php echo $last ?></td>
 </tr>
<?php } if(!empty($city)){?>
<tr>
<td valign="top"><div align="left">City:</div></td>
<td valign="top"><?php echo $city ?></td>
</tr>
<?php } if(!empty($country)){?>
<tr>
<td valign="top"><div align="left">Country:</div></td>
<td valign="top"><?php echo $country ?></td>
</tr>
<?php } ?>



<?php if($tittle!=""){?>
                <tr>
                    <td>Tittle:</td>
                    <td>
                        <input type="text" name="tittle" id="" value="<?php echo $tittle;?>">
                    </td>
                </tr>
            <?php } if($current_image!=""){?>
                <tr>
                    <td>Current image:</td>
                    <td>
                        <?php
                          if($current_image!="")
                          {
                              //display image
                              ?>
                              <img src="<?php echo SITEURL;?>images/category <?php echo $current_image;?>">
                              <?php
                            
                          }
                          else
                          {
                              echo "<div class='error'>Image not added.</div>";
                          }
                        ?>
                    </td>
                </tr>
                <?php } if($featured!=""){?>
               
                <tr>
                    <td>Featured:</td>
                    <td>
                    Yes <input type="radio" name="featured" id="" value="Yes">
                    No <input type="radio" name="featured" id="" value="No">
                    </td>
                </tr>
                <?php } if($active!=""){?>
                <tr>
                    <td>Active:</td>
                    <td>
                        Yes <input type="radio" name="active" value="Yes" id="">
                        No <input type="radio" name="active" value="No" id="">
                    </td>
                </tr>
                <?php } <?
                



                <tr>
                <td>New Image:</td>
                <td><input type="file" name="new_image" id=""></td>
            </tr>



            <form action="" method="post" enctype="multipart/form-data">
            <table class='tbl-30 '>
            <?php if($tittle!=""){?>
                <tr>
                    <td>Tittle:</td>
                    <td>
                        <input type="text" name="tittle" id="" value="<?php echo $tittle;?>">
                    </td>
                </tr>
            <?php } if()
                <tr>
                    <td>Current image:</td>
                    <td>
                        <?php
                          if($current_image!="")
                          {
                              //display image
                              ?>
                              <img src="<?php echo SITEURL;?>images/category <?php echo $current_image;?>">
                              <?php
                            
                          }
                          else
                          {
                              echo "<div class='error'>Image not added.</div>";
                          }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td><input type="file" name="new_image" id=""></td>
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
                        
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>