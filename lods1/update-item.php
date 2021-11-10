
<?php include ('partials/menu.php')?>

<link rel="stylesheet" type="text/css" href="style.css">

        <?php 
           if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql2="SELECT * from item WHERE id=$id";

                            $res=mysqli_query($conn, $sql2);
                            $row2=mysqli_fetch_assoc($res);
                            $title = $row2['title'];
                            $description = $row2['description'];
                            $price = $row2['price'];
                            $current_brand=$row2['brand_id'];
                            $featured=$row2['featured'];
                            $active=$row2['active'];
                        }
                        
                        else{
                            header("location:".SITEURL.'/manage-item.php');
                        }
        
                    
                
           
        ?>

<div class="container">

        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>

            <tr>
                    <th>Title: </th>
                    <td>
                        <input type="text" name="title" value="<?php echo $title?>">
                    </td>
            </tr>    
            <tr>
					<th>Image: </th>
					<td>
                        <input type="file" name="photo" required>
                    </td>
				</tr>
            
                <tr>
                    <th>Description: </th>
                    <td>
                        <input type="text" name="description" value="<?php echo $description?>"required>
                    </td>
                </tr>
                <tr>
                    <th>Price: </th>
                    <td>
                        <input type="number" name="price" value="<?php echo $price?>"required>
                    </td>
                </tr>
               
                
                 <tr>
                    <th>Category: </th>
                    <td>
                        <select name="brand">
                            <?php 
                                $sql = "SELECT * FROM brand where active='Yes'";
                                $res = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($res);

                                if ($count>0) {
                                    while($row=mysqli_fetch_assoc($res)){
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                      
                                        ?>
                                        <option <?php if($current_brand==$category_id){echo "selected";}?>value="<?php echo $category_id?>"><?php echo $category_title;?></option>
                                        <?php
                                    }
                                }
                                else{
                                    echo "<option value='0'>Brand not available</option>";
                                }
                            ?>

                        </select>
                    </td>
                </tr>
              
                <tr>
                    <th>Featured: </th>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <th>Live: </th>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No</td>
                </tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
               
                        <input type="submit" name="submit" value="Update" class="btn-primary">
                    </td>
                </tr>
                
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                $id =$_POST['id'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                $brand=$_POST['brand'];
                $price=$_POST['price'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];

                $fileinfo=PATHINFO($_FILES["photo"]["name"]);

 if(empty($fileinfo['filename'])){
 $location="";
 }
 else{
 $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
 move_uploaded_file($_FILES["photo"]["tmp_name"],"images/" . $newFilename);
 $location="images/" . $newFilename;
 }

                    $sql3 = "UPDATE item set
            
                    title='$title',
                    images_name='$location',
                    description='$description',
                    price='$price',
                    brand_id='$brand',
                    featured='$featured',
                    active='$active'
                    where id=$id";

                    $res3=mysqli_query($conn,$sql3);

                    if($res3==TRUE){
                    $_SESSION['update-success']="<div class='error'> Update Successfully</div>";
                    header("location:".SITEURL.'/manage-item.php');
                    }
                    else{
                     $_SESSION['update-failed']="<div class='error'> failed to replace current image</div>";
                    header("location:".SITEURL.'/manage-item.php');
                    }


        }
        ?>

  
</div>
<?php include ('partials/footer.php')?>



